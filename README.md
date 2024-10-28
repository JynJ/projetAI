Azure AI Application - Analyse d'Image

Cette application permet de capturer ou de télécharger des images, puis d'utiliser les services Azure AI pour analyser les objets présents dans l'image. L'application comporte une interface utilisateur qui permet de télécharger une image depuis l'ordinateur ou de capturer une image en utilisant la webcam. Une fois l'image fournie, celle-ci est envoyée à Azure pour détection des objets.

Prérequis

Environnement de développement :

Un serveur web local comme XAMPP ou WAMP (l'application utilise du PHP côté serveur).

PHP doit être installé et configuré correctement sur votre serveur.

Clé API Azure :

Une clé d'abonnement Azure Cognitive Services est nécessaire pour utiliser l'API Azure Computer Vision.

Vous pouvez créer un compte sur Azure et obtenir la clé et l'endpoint pour le service Azure Computer Vision.

Accès à la webcam :

Pour la capture d'image via la webcam, l'application a besoin d'accéder à la caméra de l'utilisateur.

Le navigateur demandera la permission d'accéder à la webcam.

Installation

Cloner le dépôt

Clonez ce projet sur votre machine locale :

git clone <URL-DU-DÉPÔT>

Configuration du Serveur Web

Placez les fichiers dans le dossier htdocs de XAMPP ou le dossier www de WAMP.

Assurez-vous que Apache est en cours d'exécution.

Configuration du Backend

Le backend utilise PHP pour gérer la communication avec Azure Computer Vision.

Dans le fichier backend.php, remplacez les valeurs YOUR_COMPUTER_VISION_API_KEY et YOUR_ENDPOINT par votre clé API et votre endpoint Azure.

Lancer l'application

Démarrez Apache depuis le panneau de contrôle XAMPP/WAMP.

Accédez à l'application en ouvrant un navigateur et en tapant :

http://localhost/<nom_du_projet>/index.html

Remplacez <nom_du_projet> par le nom du dossier où se trouvent vos fichiers.

Utilisation

Télécharger une image

Cliquez sur Choisissez une image pour télécharger une image à analyser depuis votre ordinateur.

Cliquez ensuite sur Analyser l'image pour envoyer l'image au backend qui la traitera via Azure AI.

Capturer une image avec la webcam

Cliquez sur Capturer une image pour prendre une photo avec votre webcam.

L'image sera automatiquement envoyée à l'API Azure pour analyse.

Voir les résultats

Les résultats de l'analyse, tels que les objets détectés, seront affichés dans la section "Objets Détectés".

Fichiers Importants

index.html : Fichier principal contenant l'interface utilisateur.

backend.php : Fichier serveur qui reçoit les images et communique avec l'API Azure Computer Vision.

styles.css : Fichier CSS pour styliser l'interface (si utilisé).

Configuration Azure

Obtenez une clé API pour Azure Computer Vision en suivant ce lien.

Remplacez les informations nécessaires dans le script pour que la connexion à Azure fonctionne.

Dans backend.php, mettez à jour la clé et l'URL de l'endpoint :

$subscriptionKey = 'YOUR_COMPUTER_VISION_API_KEY';
$endpoint = 'https://YOUR_RESOURCE_NAME.cognitiveservices.azure.com/vision/v3.2/analyze';

Dépendances

JavaScript : Utilisé pour l'interaction avec l'utilisateur (envoi d'images, utilisation de la webcam).

PHP : Utilisé pour communiquer avec Azure Computer Vision et envoyer les résultats au frontend.

Problèmes Courants

Erreur d'accès à la webcam

Assurez-vous que le navigateur a bien les permissions nécessaires pour accéder à la caméra.

Erreur lors de la requête à Azure

Vérifiez que la clé API est correcte et n'a pas expiré.

Assurez-vous d'avoir une connexion Internet active.

Problèmes de pour upload des fichiers autre que le formatt JPEG.

Créez une branche pour vos modifications : git checkout -b feature/nom_de_votre_fonctionnalité.

Faites vos modifications et validez-les.

Soumettez une pull request.


Contact

Pour toute question ou problème, veuillez contacter :

Email : jeanyannjulians972@gmail.com
