<?php

require 'connec.php';
$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM article WHERE id=:id";
$prep = $pdo->prepare($query);

$prep->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$prep->execute();

$article = $prep->fetch();

?>

<h1><?= $article['title'] ?></h1>
<p><?= $article['message'] ?></p>
