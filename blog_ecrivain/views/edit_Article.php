<!DOCTYPE html>
<html lang="fr">
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../blog_ecrivain/public/css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="../../blog_ecrivain/public/js/mytextarea.js"></script>
        <title>Blog Jean Forteroche</title>
    </head>
    <body>
        <div class="card m-5 p-4 shadow bg-white arrondi d-flex flex-column ">
            <div>
            <?php
                if(isset($_SESSION['modif_article_erreur'])){
                        echo "<span>".$_SESSION['modif_article_erreur']."</span>";
                        unset($_SESSION['modif_article_erreur']); 
                    }
                ?>
                <h1>Modifier mon article</h1>
                <div class="col-sm-10">
                    <form class="" method="post" action="index.php?route=send_article&articleId=<?php echo $_GET['articleId']?>">
                        <label for="title">Titre</label><br>
                        <input class="form-control mx-sm-6" type="text" id="title" name="title" value="<?php echo $article[0]['title'] ?>"><br>

                        <label for="content">Contenu</label><br>
                        <textarea id="basic-conf" class="form-control mx-sm-8" id="content" name="content"> <?php echo $article[0]['content'] ?> </textarea><br>

                        <label for="author">Auteur</label><br>
                        <input class="form-control mx-sm-8" type="text" id="author" name="author" value="<?php echo $article[0]['author'] ?>"><br>

                        <input class="btn btn-success" type="submit" value="Mettre à jour" id="submit" name="submit">
                    </form>
                </div>
                <a  href="../public/index.php?route=administration" class="btn btn-info btn-lg active" role="button" aria-pressed="true">< Retour</a>
            </div>
        </div>
    </body>
</html>