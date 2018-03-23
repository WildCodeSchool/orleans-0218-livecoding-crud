<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 23/03/18
 * Time: 16:21
 */
require 'connec.php';
$pdo = new PDO(DSN, USER, PASS);

if (!empty($_POST['id'])) {

    $query = "DELETE FROM article WHERE id=:id";
    $prep = $pdo->prepare($query);

    $prep->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $prep->execute();

    header('Location: index.php');
    exit();

}