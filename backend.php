<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['image']) || $_FILES['image']['error'] != UPLOAD_ERR_OK) {
        echo json_encode(["error" => "Invalid image upload"]);
        exit;
    }

    // Read image binary data
    $imageData = file_get_contents($_FILES['image']['tmp_name']);

    // Replace with your Azure Computer Vision Subscription Key and Endpoint
    $subscriptionKey = 'FBlYmm2RHqnOiBufE2huXpAWPZPlDAshl0S0roySDYhGcAKcvTNAJQQJ99AJAC5T7U2XJ3w3AAAEACOGQeZw';
    $endpoint = 'https://projetjyia.cognitiveservices.azure.com/vision/v3.2/detect';

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/octet-stream",
        "Ocp-Apim-Subscription-Key: $subscriptionKey"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $imageData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP status code
    if (curl_errno($ch)) {
        echo json_encode(["error" => "cURL Error: " . curl_error($ch)]);
        curl_close($ch);
        exit;
    }
    curl_close($ch);

    // Check if response is not OK
    if ($httpCode !== 200) {
        echo json_encode(["error" => "HTTP Error Code: $httpCode", "response" => $response]);
        exit;
    }

    // Parse and format response
    $data = json_decode($response, true);
    if (isset($data['objects'])) {
        $resultDescription = "Detected objects:\n";
        foreach ($data['objects'] as $object) {
            $objectName = $object['object'];
            $confidence = round($object['confidence'] * 100, 2);
            $resultDescription .= "- $objectName (Confidence: $confidence%)\n";
        }
        echo json_encode(["result" => $resultDescription]);
    } else {
        echo json_encode(["error" => "No objects detected"]);
    }
}
?>
