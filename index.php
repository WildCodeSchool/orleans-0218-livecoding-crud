<?php
    require 'connec.php';
    $pdo = new PDO(DSN, USER, PASS);

    $query = "SELECT * FROM article";
    $res = $pdo->query($query);
    $articles = $res->fetchAll(PDO::FETCH_ASSOC);

    include 'header.php';
?>


    <section class="">
        <h1>My blog</h1>

        <?php foreach ($articles as $article) : ?>
            <article>
                <h2><a href="show.php?id=<?=$article['id']?>"><?=htmlentities($article['title'])?></a></h2>
                <p><?=htmlentities($article['message'])?></p>
                <p><?=htmlentities($article['author'])?></p>

                <a href="update.php?id=<?=$article['id']?>" class="btn btn-info">Edit</a>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?=$article['id']?>"/>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </article>
        <?php endforeach; ?>

    </section>

<?php
    include 'footer.php';
?>