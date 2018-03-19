<?php

// $app = require_once __DIR__ . '/../app.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DBNAME', 'feh_wiki');

$defaults = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // PDO remonte les erreurs SQL, sinon il retourne une bête erreur PHP
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // retournera les données dans un tableau associatifs
];

$pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_DBNAME, DB_USER, DB_PASSWORD, $defaults);

$heroes_weapons = "CREATE TABLE `heroes_weapons` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `weapon` ENUM('Épée', 'Lance', 'Hache', 'Tome', 'Souffle', 'Arc', 'Dagues', 'Bâton'),
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_colors = "CREATE TABLE `heroes_colors` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `color` ENUM('Rouge', 'Bleu', 'Vert', 'Gris'),
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_movements = "CREATE TABLE `heroes_movements` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `movement` ENUM('Fantassin', 'Cuirassé', 'Cavalier', 'Volant'),
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_games = "CREATE TABLE `heroes_games` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `game` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_voices_jap = "CREATE TABLE `heroes_voices_jap` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `voice_jap` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_voices_ang = "CREATE TABLE `heroes_voices_ang` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `voice_ang` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_illustrators = "CREATE TABLE `heroes_illustrators` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `illustrator` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes_obtentions = "CREATE TABLE `heroes_obtentions` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `obtention` ENUM('Début du Jeu', 'Tirage', 'Grande Bataille', 'Tourmente'),
    PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

$heroes = "CREATE TABLE `heroes` (
    `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(15) NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `description` VARCHAR(225) NOT NULL,
    `weapon` TINYINT(1) UNSIGNED NOT NULL,
    `color` TINYINT(1) UNSIGNED NOT NULL,
    `movement` TINYINT(1) UNSIGNED NOT NULL,
    `game` TINYINT(2) UNSIGNED NOT NULL,
    `voice_jap` TINYINT(3) UNSIGNED NOT NULL,
    `voice_ang` TINYINT(3) UNSIGNED NOT NULL,
    `illustrator` TINYINT(2) UNSIGNED NOT NULL,
    `obtention` TINYINT(1) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),

    -- Foreign Key (Facilite la lecture et création des tables)
    KEY `heroes_weapon_foreign` (`weapon`),
    KEY `heroes_color_foreign` (`color`),
    KEY `heroes_movement_foreign` (`movement`),
    KEY `heroes_game_foreign` (`game`),
    KEY `heroes_voice_jap_foreign` (`voice_jap`),
    KEY `heroes_voice_ang_foreign` (`voice_ang`),
    KEY `heroes_illustrator_foreign` (`illustrator`),
    KEY `heroes_obtention_foreign` (`obtention`),
    CONSTRAINT `heroes_weapon_foreign` FOREIGN KEY (`weapon`) REFERENCES `heroes_weapons` (`weapon`) ON DELETE CASCADE,
    CONSTRAINT `heroes_color_foreign` FOREIGN KEY (`color`) REFERENCES `heroes_colors` (`color`) ON DELETE CASCADE,
    CONSTRAINT `heroes_movement_foreign` FOREIGN KEY (`movement`) REFERENCES `heroes_movements` (`movement`) ON DELETE CASCADE,
    CONSTRAINT `heroes_game_foreign` FOREIGN KEY (`game`) REFERENCES `heroes_games` (`game`) ON DELETE CASCADE,
    CONSTRAINT `heroes_voice_jap_foreign` FOREIGN KEY (`voice_jap`) REFERENCES `heroes_voices_jap` (`voice_jap`) ON DELETE CASCADE,
    CONSTRAINT `heroes_voice_ang_foreign` FOREIGN KEY (`voice_ang`) REFERENCES `heroes_voices_ang` (`voice_ang`) ON DELETE CASCADE,
    CONSTRAINT `heroes_illustrator_foreign` FOREIGN KEY (`illustrator`) REFERENCES `heroes_illustrators` (`illustrator`) ON DELETE CASCADE,
    CONSTRAINT `heroes_obtention_foreign` FOREIGN KEY (`obtention`) REFERENCES `heroes_obtentions` (`obtention`) ON DELETE CASCADE,
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";