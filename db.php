<?php

/*
CREATE TABLE `users` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `sid` BIGINT(20) NULL DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `money` DECIMAL(19,4) NULL DEFAULT NULL,
  `avatar` VARCHAR(2083) NULL DEFAULT NULL,
  `inv` VARCHAR(2083) NULL DEFAULT NULL,
  `trade` VARCHAR(2083) NULL DEFAULT NULL,
  `join` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `sid`)
);
*/

//define("db_url", "localhost");
//define("db_db", "steam");
//define("db_user", "steam");
//define("db_pass", "steam");
$db_host = "localhost";
$db_user = "steam";
$db_pass = "steam";
$db_db = "steam";
$dbdsn = 'mysql:host=localhost;dbname=steam';

try {
    $db = new PDO($dbdsn, $db_user, $db_pass);
    $newUser = $db->prepare("INSERT INTO users (sid, name, avatar) VALUES (:sid, :name, :avatar)");

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
