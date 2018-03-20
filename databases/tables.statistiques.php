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

$base_stats = "CREATE TABLE `base_stats` (
    `heroes_id` SMALLINT(3) UNSIGNED NOT NULL,
    `bs_hp` TINYINT(2) UNSIGNED NOT NULL,
    `bs_atk` TINYINT(2) UNSIGNED NOT NULL,
    `bs_spd` TINYINT(2) UNSIGNED NOT NULL,
    `bs_def` TINYINT(2) UNSIGNED NOT NULL,
    `bs_res` TINYINT(2) UNSIGNED NOT NULL,

    FOREIGN KEY (`heroes_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$growth_points = "CREATE TABLE `growth_points` (
    `heroes_id` SMALLINT(3) UNSIGNED NOT NULL,
    `gp_hp` TINYINT(2) UNSIGNED NOT NULL,
    `gp_atk` TINYINT(2) UNSIGNED NOT NULL,
    `gp_spd` TINYINT(2) UNSIGNED NOT NULL,
    `gp_def` TINYINT(2) UNSIGNED NOT NULL,
    `gp_res` TINYINT(2) UNSIGNED NOT NULL,

    FOREIGN KEY (`heroes_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$growth_points_value = "CREATE TABLE `growth_points_value` (
    
    `growth_point` TINYINT(2),
    `rank` ENUM('1', '2', '3', '4', '5') NOT NULL,
    `value` TINYINT(2) UNSIGNED NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

$rank = "CREATE TABLE `rank` (
    `heroes_id` SMALLINT(3) UNSIGNED NOT NULL,
    `rank_1` BOOL NOT NULL,
    `rank_2` BOOL NOT NULL,
    `rank_3` BOOL NOT NULL,
    `rank_4` BOOL NOT NULL,
    `rank_5` BOOL NOT NULL,

    FOREIGN KEY (`heroes_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin;";

// Destruction des Tables
$pdo->exec("DROP TABLE IF EXISTS base_stats");
$pdo->exec("DROP TABLE IF EXISTS growth_points");
$pdo->exec("DROP TABLE IF EXISTS growth_points_value");
$pdo->exec("DROP TABLE IF EXISTS rank");

// Creation des Tables
$pdo->exec($rank);
$pdo->exec($growth_points_value);
$pdo->exec($growth_points);
$pdo->exec($base_stats);