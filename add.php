<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 23/03/18
 * Time: 15:55
 */
    include 'header.php';

    require 'connec.php';
    $pdo = new PDO(DSN, USER, PASS);


    if (!empty($_POST)) {
        // verification d'erreur coté serveur
        if (empty($_POST['title'])) {
            $errors[] = 'Le champ title ne doit pas etre vide';
        }

        if (empty($_POST['message'])) {
            $errors[] = 'Le champ message ne doit pas etre vide';
        }

        if (empty($_POST['author'])) {
            $errors[] = 'Le champ author ne doit pas etre vide';
        }

        if (!empty($errors)) {
            var_dump($errors);
        } else {
            // si pas d'erreur, insert en bdd

            $query = "INSERT INTO article (title, message, author) 
                              VALUES (:title, :message, :author)";
            $prep = $pdo->prepare($query);

            $prep->bindValue(':title', trim($_POST['title']), PDO::PARAM_STR);
            $prep->bindValue(':message', trim(htmlentities($_POST['message'])), PDO::PARAM_STR);
            $prep->bindValue(':author', trim($_POST['author']), PDO::PARAM_STR);
            $prep->execute();

            header('Location: index.php');
            exit();

        }
    }
?>

<h1>Add an article</h1>

    <form action="" method="post" role="form">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title...">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Author...">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<?php
    include 'footer.php';
?>