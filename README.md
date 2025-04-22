📑 À propos du projet

DKR BURGER est une application web développée avec Laravel qui permet la gestion complète des commandes 
pour un restaurant de burgers. Le système automatise la gestion des commandes, des paiements et du suivi 
des livraisons tout en offrant une expérience utilisateur intuitive.

✨ Fonctionnalités principales

Gestion des Produits

Ajout, modification, archivage et suppression de burgers
Informations détaillées sur chaque produit (nom, prix, image, description)
Gestion des stocks avec blocage des commandes en cas de rupture

Gestion des Commandes

Interface client pour consulter le catalogue avec filtres (prix, libellé)
Suivi des commandes pour les clients
Interface administrateur pour la gestion complète des commandes
Système de statuts (En attente, En préparation, Prête, Payée)

Paiements :

Enregistrement des paiements en espèces
Sécurisation des transactions (paiement unique par commande)

Authentification et Rôles:

Rôle Gestionnaire avec accès complet
Rôle Client avec accès limité

Statistiques et Rapports:

Tableaux de bord avec indicateurs clés
Visualisations graphiques (Chart.js)
Rapports journaliers et mensuels

Notifications:

Emails automatiques de confirmation de commande
Envoi de factures en PDF
Alertes pour les nouvelles commandes

🛠️ Technologies utilisées :

Framework: Laravel
Base de données: MySQL
Frontend: Blade, JavaScript, Bootstrap, Chart.js
Mail: Laravel Mail avec SMTP
PDF: Laravel-PDF (DomPDF)
Conteneurisation: Docker
CI/CD: GitHub Actions

🚀 Installation
Prérequis

PHP >= 8.1
Composer
MySQL
Node.js et NPM

Installation manuelle

Cloner le dépôt

bashgit clone https://github.com/ibrahimaNdir/dkrburger
cd isi-burger

Installer les dépendances

bashcomposer install
npm install
npm run build

Configurer l'environnement

bashcp .env.example .env
php artisan key:generate

Configurer la base de données dans le fichier .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=isi_burger
DB_USERNAME=root
DB_PASSWORD=

Migrer et alimenter la base de données

bashphp artisan migrate --seed

Lancer le serveur de développement

bashphp artisan serve
Installation avec Docker

Cloner le dépôt

bashgit clone https://github.com/ibrahimaNdir/dkrburger
cd isi-burger

Lancer les conteneurs Docker

bashdocker-compose up -d

Installer les dépendances et configurer l'application

bashdocker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
🔧 Configuration
Configuration des emails
Modifiez votre fichier .env avec vos paramètres SMTP :
MAIL_MAILER=smtp
MAIL_HOST=smtp.votreservice.com
MAIL_PORT=587
MAIL_USERNAME=votre_username
MAIL_PASSWORD=votre_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@isiburger.com
MAIL_FROM_NAME="${APP_NAME}"
Configuration des PDF
Le système utilise DomPDF pour générer les factures.
Aucune configuration supplémentaire n'est nécessaire, mais vous pouvez personnaliser les templates dans resources/views/pdf/.
👥 Rôles utilisateurs
Gestionnaire

Email: admin@isiburger.com
Mot de passe: password

Client (exemple)

Email: client@example.com
Mot de passe: password

📊
🔄 CI/CD
Le projet est configuré avec un pipeline CI/CD via GitHub Actions qui automatise :

Le checkout du code depuis la branche nom_prenom_burger
L'installation des dépendances Laravel
La création d'une image Docker
Le déploiement automatique

📱 Captures d'écran
Interface client
Tableau de bord administrateur
Afficher l'image
Gestion des commandes
Afficher l'image
🧪 Tests
Le projet comprend des tests unitaires et d'intégration pour assurer la stabilité et la qualité du code.
Pour exécuter les tests :
bashphp artisan test
🤝 Contribution
Ce projet a été développé par Ibrahima NDIR(π-dev))

