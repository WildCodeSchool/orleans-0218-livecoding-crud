<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 23/03/18
 * Time: 16:43
 */

require 'connec.php';
require 'verif.php';
$pdo = new PDO(DSN, USER, PASS);

include 'header.php';

if (!empty($_POST)) {

    $errors = checkError($_POST);

    if (!empty($errors)) {
        var_dump($errors);
    } else {

        $query = "UPDATE article SET title=:title, author=:author, message=:message WHERE id=:id";
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $prep->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $prep->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
        $prep->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

        $prep->execute();
    }
}

if (!empty($_GET['id'])) {

    $query = "SELECT * FROM article WHERE id=:id";
    $prep = $pdo->prepare($query);

    $prep->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $prep->execute();

    $article = $prep->fetch();

    foreach ($article as $key=>$value) {
        $article[$key] = htmlentities($value);
    }

    if (empty($article)) {
        header('Location: index.php');
        exit();
    }
}

?>

<h1>Update article <?=$article['title']?></h1>

    <form action="" method="post" role="form">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="<?= $article['title']?>" class="form-control" name="title" id="title" placeholder="Title...">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text"  value="<?= $article['author']?>" class="form-control" name="author" id="author" placeholder="Author...">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10"><?= $article['message']?></textarea>
        </div>

        <input type="hidden" name="id" value="<?= $article['id'] ?>" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php
   include 'footer.php';

?>