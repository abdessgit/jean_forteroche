<!-- Formulaire de contact -->
<!DOCTYPE html>
<html lang="fr">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/contact.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title>Blog Jean Forteroche</title>
</head>
<body>
	<header role="banner" class="scrolling">

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
							<a href="../public/index.php?route=login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Connexion</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<div class="container" role="main">
		<h1 class="text-xs-center mt-5">Formulaire de contact</h1>
		<form action="../public/index.php?route=insercontact" method="post" class="mt-5 mb-5" role="form">
			<!-- inclusion de formulaire -->
			<div class="form-group" method="post" action="../public/index.php?route=insercontact">
				<label for="name">Votre nom</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="anoir" value="">
				<label for="email">Votre Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" value="">
				<label for="message">Votre message</label>
				<textarea class="form-control" id="message" name="message" rows="3"></textarea>
				<?php
                    if(isset($_SESSION['erreur_contact'])){
                        echo "<span>".$_SESSION['erreur_contact']."</span>";
                        unset($_SESSION['erreur_contact']); 
                    }
                    ?></br>
			<button class="btn btn-primary mt-2" type="submit" value="Envoyer" id="submit" name="submit">Envoyer</button>
		</form>
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
					<li><a href="../public/index.php">Mentions légales</a></li>
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