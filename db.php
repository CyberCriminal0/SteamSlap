<?php
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
    $updateUser = $db->prepare("UPDATE users SET name = :name, avatar = :avatar WHERE sid = :sid");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
