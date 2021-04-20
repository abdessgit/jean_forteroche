<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Blog Jean Forteroche</title>
</head>

<body>
    <div class="alert-heading">
        <?php
        if (isset($_SESSION['admin_connexion'])) {
            echo "<span>" . $_SESSION['admin_connexion'] . "</span>";
            unset($_SESSION['admin_connexion']);
        } ?>
    </div>
    <header role="banner" class="top_page">
        <!-- inclusion du menu -->
        <div class="row justify-content-center" role="navigation">
            <nav class="navbar navbar-expand-lg navbar-dark col-sm fixed-top">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../public/index.php">Jean Forteroche<br><small>Auteur et écrivain</small></a>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=about">Qui suis-je ?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="../public/index.php?route=logout" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Deconnexion</a>
                            <!--<a class="nav-link" href="/contact">Contact</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"> <?php echo $_SESSION['user']; ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div> <!-- Photo pleine page -->
    </header>
    <div class="col-sm-10">
    </div class="col-sm-10">
    <p class="boutton_admin"><a href="../public/index.php?route=add_Article" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Ajouter un article</a></button></p>
    <p class="boutton_admin"><a href="../public/index.php?route=register" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Inscription</a></p>
    </div>
    </div>
    <div class="col-sm-12">
        <div id="bloc_page">
            <div class=" ">
                <header class="breadcrumb">
                    <h3>Affichage tous les articles</h3>
                </header>
                <div class=" ">
                    <div class="section_article">
                        <table class="table table-bordered">
                        <?php
                            if (isset($_SESSION['delet_article'])) {
                                echo "<span>" . $_SESSION['delet_article'] . "</span>";
                                unset($_SESSION['delet_article']);
                            }
                            ?>
                            <tbody>
                                <!--on recupére tous nos article-->
                                <?php foreach ($articles as $article) { ?>
                                    <!--Lorsqu'on click sur le titre de l'article ca nous affiche l'article complet sur une page-->

                                    <tr>
                                        <td>
                                            <h4><a><?= htmlspecialchars($article['id']); ?></a></h4>
                                        </td>
                                        <td>
                                            <h4><a href="../public/index.php?route=single&articleId=<?= htmlspecialchars($article['id']); ?>"><?= htmlspecialchars($article['title']); ?></a></h4>
                                        </td>

                                        <td><a href="../public/index.php?route=edit_Article&articleId=<?= htmlspecialchars($article['id']); ?>" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Modifier l'article</a></td>

                                        <td><a href="../public/index.php?route=deletarticle&articleId=<?= htmlspecialchars($article['id']); ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Supprimer l'article</a></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="col-sm-12" id="section_comment">
            <header class="breadcrumb">
                <h3> Affichage tous les Commentaires </h3>
            </header>
            <table class="table table-bordered">
                <?php
                if (isset($_SESSION['delet_comment'])) {
                    echo "<span>" . $_SESSION['delet_comment'] . "</span>";
                    unset($_SESSION['delet_comment']);
                }
                ?>
                <?php
                foreach ($comments as $comment) { ?>
                    <tbody>
                        <tr>
                            <td>
                                <p><strong><?= htmlspecialchars($comment['id']); ?></strong></p>
                            </td>
                            <td>
                                <p><strong><?= htmlspecialchars($comment['pseudo']); ?></strong></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($comment['content']); ?></p>
                            </td>
                            <td><a href="../public/index.php?route=deletcomment&id=<?php echo $comment['id'] ?>&articleId=<?= htmlspecialchars($article['id']); ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Supprimer le commentaire</button></a></td>
                        </tr>
                    </tbody>
                <?php }  ?>
            </table>
        </div>
        <div class="col-sm-12">
            <header class="breadcrumb">
                <h3> Commentaires à signalés par les membres </h3>
            </header>
            <table class="table table-bordered">
                <?php
                if (isset($_SESSION['signal_comment'])) {
                    echo "<span>" . $_SESSION['signal_comment'] . "</span>";
                    unset($_SESSION['signal_comment']);
                }
                ?>
                <?php
                if (isset($_SESSION['flag_comment'])) {
                    echo "<span>" . $_SESSION['flag_comment'] . "</span>";
                    unset($_SESSION['flag_comment']);
                }
                ?>
                <?php foreach ($commentflag as $comment) { ?>

                    <tbody>
                        <tr>
                            <td>
                                <p><?= htmlspecialchars($comment['id']); ?></p>
                            </td>
                            <td>
                                <p><strong><?= htmlspecialchars($comment['pseudo']); ?></strong></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($comment['content']); ?></p>
                            </td>
                            <td>
                                <p>Posté le <?= htmlspecialchars($comment['createdAt']); ?></p>
                            </td>
                            <td>
                                <p>Flag[ <?= htmlspecialchars($comment['flag']); ?> ]</p>
                            </td>
                            <td><a href="../public/index.php?route=flagcomment&id=<?php echo $comment['id'] ?>&articleId=<?= htmlspecialchars($article['id']); ?>" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Flager</a></button></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <div id="contact" class="col-sm-12">
            <table class="table table-bordered">
                <header class="breadcrumb">
                    <h3>Contact</h3>
                </header>
                <?php
                if (isset($_SESSION['delet_message'])) {
                    echo "<span>" . $_SESSION['delet_message'] . "</span>";
                    unset($_SESSION['delet_message']);
                }
                ?>
                <tbody>
                    <?php foreach ($contacts as $contact) {  ?>

                        <tr>
                            <td>
                                <p><strong><?= htmlspecialchars($contact['id']); ?></strong></p>
                            </td>
                            <td>
                                <p><strong><?= htmlspecialchars($contact['name']); ?></strong></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($contact['message']); ?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($contact['email']); ?></p>
                            </td>
                            <td>
                                <p>Posté le <?= htmlspecialchars($contact['createdAt']); ?></p>
                            </td>
                            <td><a href="../public/index.php?route=deletmessage&contactid=<?= htmlspecialchars($contact['id']); ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Supprimer le message</a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- inclusion du footer -->
        <footer role="contentinfo">
            <!-- Liens du site -->
            <div class="row" id="footer_links">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 d-flex justify-content-center mt-5 pt-4">
                    <ul>
                        <li><a href="../public/index.php">Accueil</a></li>
                        <li><a href="../public/index.php?route=about">Qui suis-je ?</a></li>
                        <li><a href="../public/index.php?route=blog">Blog</a></li>
                        <li><a href="../public/index.php?route=contact">Contact</a></li>
                        <li><a href="#">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
            <!-- Réseau sociaux -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 d-flex flex-column align-items-center mb-5">
                    <h3 class="pl-5 h6">Suivez moi sur:</h3>
                    <ul>
                        <li><a href="#"><img src="../public/images/facebook-icon.png" alt="icone facebook"></a></li>
                        <li class="pl-3"><a href="#"><img src="../public/images/instagram-icon.png" alt="icone instagram"></a></li>
                        <li class="pl-3"><a href="#"><img src="../public/images/Twitter-icon.png" alt="icone twitter"></a></li>
                    </ul>
                </div>
            </div>
            <!-- Copyright -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 d-flex justify-content-center mt-4">
                    <p><small>&copy; 2020 - Tout droits réservés / Site réalisé par Abdesslam Bouzaroura </small></p>
                </div>
            </div>
        </footer>
</body>

</html>