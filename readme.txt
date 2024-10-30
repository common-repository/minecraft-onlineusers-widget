=== Plugin Name ===
Contributors: pirmax
Donate link: https://www.paypal.me/pirmax/5
Tags: minecraft, online, users, widget, user, player, players, display, affichage, extension, plugin, afficher, gamers, avatar, mojang, notch, replacement, items, recipes, auth, authentication, valid
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 4.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Widget permettant d'afficher les joueurs en ligne d'un serveur Minecraft dans un menu de votre blog Wordpress.

== Description ==

Le plugin **Minecraft Online Players Widget** est un Widget permettant d'afficher les joueurs en ligne d'un serveur
Minecraft dans le menu du blog grâce à la fonction « query » des serveurs Minecraft.

== Installation ==

Cette section décrit comment installer l'extension et la faire fonctionner.

1. Transférez le répertoire téléchargé/dézippé dans le répertoire `/wp-content/plugins/minecraft-onlineusers-widget`, ou installez le plugin à partir de l'interface d'Extensions WordPress de votre blog.
2. Activez l'extension à partir de l'interface d'Extensions WordPress.
3. Rendez-vous dans vos Widgets WordPress et déplacez le Widget installé dans le menu de votre choix.
4. N'oubliez pas de récompenser l'auteur de cette extension pour son travail : [Paypal](https://www.paypal.me/pirmax/5 "Offrez 5€ à l'auteur") ;)

L'installation est simple, mais vous devez cependant pouvoir modifier le contenu du fichier <code>server.properties</code> disponible dans le dossier racine de votre serveur Minecraft. Pour activer le Widget, vous devez activer <code>enable-query</code> (<b>enable-query=true</b>) dans le fichier <code>server.properties</code> de votre serveur puis red&eacute;marrer votre serveur. Rendez-vous ensuite dans le pannel des widgets sur votre blog Wordpress, et ajoutez le widget <code>Minecraft Online Players</code>, configurez ensuite l'IP et le port du serveur Minecraft ainsi que le nombre de slot de votre serveur, puis cliquez sur <code>Enregistrer</code>.

== Screenshots ==

1. Un exemple d'affichage de plusieurs joueurs en ligne
2. Un autre exemple d'affichage de deux joueurs en ligne

== Changelog ==

= 3.1 =

* Nettoyage du code
* Vérification de la compatibilité avec la nouvelle version de WordPress
* Joyeuses fêtes de fin d'année ;)

= 3.0 =

* Optimisation de certaines options
* Mise à jour du Widget pour la version 4.0 de WordPress
* Mise à jour du Widget dans le panel d'administration WordPress
* Nettoyage du code CSS
* Ajout de liens vers mes réseaux sociaux
* Ajout d'un bouton de donation Paypal

= 2.2 =

* Ajout d'une option pour modifier le CSS du Widget
* Ajout d'une option pour modifier le texte écrit si aucun joueur est connecté
* Possibilité de gérer la taille des avatars
* Utilisation des avatars de Minotar.net
* Résolution des erreurs PHP qui empêchaient le bon fonctionnement du plugin

= 1.1 =

* Ajout de l'option <code>Nombre de slot du serveur</code> dans le widget

= 1.0 =

* Première version
