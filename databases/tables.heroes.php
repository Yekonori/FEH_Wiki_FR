<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DBNAME', 'feh_wiki');

$defaults = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // PDO remonte les erreurs SQL, sinon il retourne une bête erreur PHP
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // retournera les données dans un tableau associatifs
];

$pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_DBNAME, DB_USER, DB_PASSWORD, $defaults);

$heroes_games = "CREATE TABLE `heroes_games` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `game` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$heroes_voices_jap = "CREATE TABLE `heroes_voices_jap` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `voice_jap` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$heroes_voices_ang = "CREATE TABLE `heroes_voices_ang` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `voice_ang` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$heroes_illustrators = "CREATE TABLE `heroes_illustrators` (
    `id` SMALLINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    `illustrator` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$heroes = "CREATE TABLE `heroes` (
    `id` SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(15) NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `description` VARCHAR(225) NOT NULL,
    `weapon` ENUM('Épée', 'Lance', 'Hache', 'Tome', 'Souffle', 'Arc', 'Dagues', 'Bâton'),
    `color` ENUM('Rouge', 'Bleu', 'Vert', 'Gris'),
    `movement` ENUM('Fantassin', 'Cuirassé', 'Cavalier', 'Volant'),
    `game_id` SMALLINT(2) UNSIGNED NOT NULL,
    `voice_jap_id` SMALLINT(3) UNSIGNED NOT NULL,
    `voice_ang_id` SMALLINT(3) UNSIGNED NOT NULL,
    `illustrator_id` SMALLINT(2) UNSIGNED NOT NULL,
    `obtention` ENUM('Début du Jeu', 'Tirage', 'Grande Bataille', 'Tourmente'),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`game_id`) REFERENCES `heroes_games` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`voice_jap_id`) REFERENCES `heroes_voices_jap` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`voice_ang_id`) REFERENCES `heroes_voices_ang` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`illustrator_id`) REFERENCES `heroes_illustrators` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

// Destruction des Tables
$pdo->exec("DROP TABLE IF EXISTS heroes");
$pdo->exec("DROP TABLE IF EXISTS heroes_illustrators");
$pdo->exec("DROP TABLE IF EXISTS heroes_voices_ang");
$pdo->exec("DROP TABLE IF EXISTS heroes_voices_jap");
$pdo->exec("DROP TABLE IF EXISTS heroes_games");

// Creation des Tables
$pdo->exec($heroes_games);
$pdo->exec($heroes_voices_jap);
$pdo->exec($heroes_voices_ang);
$pdo->exec($heroes_illustrators);
$pdo->exec($heroes);