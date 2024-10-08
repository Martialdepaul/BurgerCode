# 🛒 E-commerce PHP Project

![PHP Badge](https://img.shields.io/badge/PHP-7.4-blue.svg)
![MySQL Badge](https://img.shields.io/badge/MySQL-8.0-orange.svg)
![Bootstrap Badge](https://img.shields.io/badge/Bootstrap-5-blueviolet.svg)
![Hosting Badge](https://img.shields.io/badge/Hosting-Free_Provider-brightgreen.svg)

Ce projet est un site e-commerce basique développé avec **PHP**, **CSS** et **Bootstrap 5**, avec un **système d'administration** qui permet de gérer les articles (ajout, modification, suppression). Il a été conçu dans le cadre d'une formation pour mettre en pratique les bases du développement web backend et frontend. Le projet est hébergé sur un serveur gratuit.

## 📋 Fonctionnalités

- 🛍️ **Catalogue de produits** : Affichage de produits avec détails (nom, description, prix).
- 🎨 **Interface responsive** : Interface utilisateur moderne et responsive grâce à Bootstrap 5.
- 🔧 **Système d'administration** : Gestion des articles (ajout, modification, suppression).

> **Note** : Ce projet ne comporte pas de panier ni de validation de commande. Il est axé sur la gestion de contenu à travers un back-office pour administrer les articles.

## 🚀 Technologies utilisées

- **Backend** : PHP 7.4
- **Base de données** : MySQL 8.0
- **Frontend** : HTML5, CSS3, **Bootstrap 5**
- **Serveur local** : XAMPP
- **Hébergement** : Serveur gratuit (InfinityFree ou autre)

## 🏗️ Installation et Configuration

### Prérequis

- PHP 7.4 ou supérieur
- MySQL 8.0 ou supérieur
- Serveur local (XAMPP, WAMP, etc.)

### Étapes d'installation

1. **Cloner le projet** :
   ```bash
   git clone https://github.com/Martialdepaul/mon-projet-ecommerce.git
   ```

2. **Accéder au répertoire** :
   ```bash
   cd mon-projet-ecommerce
   ```

3. **Configurer la base de données** :
   - Créez une base de données MySQL.
   - Importez le fichier SQL `database.sql` dans cette base de données.

4. **Configurer les paramètres de connexion** :
   - Modifiez le fichier de configuration PHP pour définir les paramètres de la base de données :
     ```php
     $host = 'localhost';
     $dbname = 'nom_de_la_base';
     $user = 'utilisateur';
     $password = 'mot_de_passe';
     ```

5. **Lancer l'application** :
   - Ouvrez le projet dans le navigateur via `http://localhost/mon-projet-ecommerce`.

## 🎯 Objectifs du projet

Ce projet a été réalisé pour :

- Mettre en place un système de gestion d'articles (ajout, modification, suppression).
- Apprendre les bases du développement PHP et MySQL.
- Utiliser **Bootstrap 5** pour créer une interface moderne et responsive.
- Héberger un projet sur un serveur gratuit et comprendre le processus de déploiement web.

## 🛠️ Améliorations possibles

- 📧 Ajouter un système d'authentification pour sécuriser l'accès au panneau d'administration.
- 🛒 Ajouter des fonctionnalités de panier et de validation des commandes.
- 💳 Intégrer des options de paiement en ligne.

## 📜 Licence

Projet libre sous licence [MIT](LICENSE).

---
