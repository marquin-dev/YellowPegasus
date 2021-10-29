<?php
var_dump($_POST);
$dbh = new PDO('mysql:host=localhost;dbname=yellowpegasus','root', '');

$sql = "SELECT * FROM users";
$result = $dbh->query($sql); // statement
var_dump($result->fetchAll(PDO::FETCH_ASSOC));