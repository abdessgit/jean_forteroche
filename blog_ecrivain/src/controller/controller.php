<?php
//On inclut le fichier dont on a besoin (ici à la racine de notre site)
require '../src/DAO/DAO.php';
//On ajouter le fichier de model Article.php
require '../src/DAO/articleDAO.php';
//On ajouter le fichier de model Comment.php
require '../src/DAO/commentDAO.php';
//On ajouter le fichier de model user.php
require '../src/DAO/userDAO.php';
//On ajouter le fichier de model contact.php
require '../src/DAO/contactDAO.php';

function displayHome()
{
	//on recupére tous nos article
	$article = new ArticleDAO();
	$articles = $article->getArticles();
	require '../views/home.php';
}
function getAllArticle()
{
	$article = new ArticleDAO();
	$articles = $article->get_All_Article();
}

function displaySingle()
{
	//On recupere l'articles qu'on veut afficher grace l'attribut (GET)
	$article = new ArticleDAO();
	$articles = $article->getArticle($_GET['articleId']);
	// On récupérer tous les commentaires associés à l'article
	$comment = new CommentDAO();
	$comments = $comment->getCommentsFromArticle($_GET['articleId']);
	require '../views/single.php';
}
function blog_file()
{
	$article = new ArticleDAO();
	$articles = $article->blog();
	require '../views/blog.php';
}
function writer_file()
{
	$article = new ArticleDAO();
	$articles = $article->about();
	require '../views/writer_file.php';
}

function  displaycomment()
{

	$CommentDAO = new CommentDAO();
	$CommentDAO->add_comment();
	header('Location: index.php?route=single&articleId=' . $_GET['articleId']);
}
function displayarticle()
{

	$articleDAO = new ArticleDAO();
	$articleDAO->add_article();
	require '../views/add_Article.php';
}
function afficher_form_modif()
{

	//On recupere l'articles qu'on veut modifier grace l'attribut (GET)
	$articleDAO = new ArticleDAO();
	$article = $articleDAO->getArticle($_GET['articleId']);
	// on recupere le formulaire qui qui permet de modifier 
	//les information de l'article 
	require '../views/edit_Article.php';
}

function modifier_article()
{
	if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["author"])) {
		if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["author"])) {
			$articleDAO = new ArticleDAO();
			$article = $articleDAO->edit_Article($_POST, $_GET['articleId']);
			$_SESSION['modif_article_erreur'] = 'Votre article à été modifier';
			afficher_form_modif();
		} else {
			$_SESSION['modif_article_erreur'] = 'tous les chemps doivent être remplies';
			afficher_form_modif();
		}
	}
}
function delet_article()
{
	if (isset($_GET['articleId']) && intval($_GET['articleId']) > 0) {
		//On recupere l'articles qu'on veut supprimer 
		$articleDAO = new ArticleDAO();
		$article = $articleDAO->deletarticle($_GET['articleId']);
		$_SESSION['delet_article'] = 'Votre article à été supprimer';
		page_admin();
	} else {
		echo $erreur = "la page demander elle n'existe pas ";
	}
}

function delet_message()
{
	if (isset($_GET['contactid']) && intval($_GET['contactid']) > 0) {
		//On recupere le message qu'on veut supprimer
		$contact = new ContactDAO();
		$contacts = $contact->deletmessage($_GET['contactid']);
		$_SESSION['delet_message'] = 'Le message à été supprimer';
		page_admin();
	} else {
		echo $erreur = "la page demander elle n'existe pas ";
	}
}
function signale_comment()
{
	// On récupérer tous les commentaires associés à l'article pour les signaler.
	$commentDAO = new CommentDAO();
	$comments = $commentDAO->signalcomment();
	$_SESSION['signal_comment'] = 'Le commentaire a été signalé!';
	displaySingle();
}
function flag_comment()
{
	if (isset($_GET['id'])  && intval($_GET['id']) > 0) {
		$comment = new CommentDAO();
		$comments = $comment->flagcomment();
		$_SESSION['flag_comment'] = 'Le commentaire a été signalé!';
		page_admin();
	} else {
		echo $erreur = "la page demander elle n'existe pas ";
	}
}
function delet_comment()
{
	//On recupere le commentaire qu'on veut supprimer
	if (isset($_GET['id']) && intval($_GET['id']) > 0) {
		$comment = new CommentDAO();
		$comments = $comment->deletcomment($_GET['id']);
		$_SESSION['delet_comment'] = 'Le commentaire à été supprimer';
		page_admin();
	} else {
		echo $erreur = "la page demander elle n'existe pas ";
	}
}
function Inscription_login()
{
	$userDAO = new UserDAO();
	$userDAO->register();
	require '../views/register.php';
}

function connexion_login()
{
	$userDAO = new UserDAO();
	$userDAO->login();
	require '../views/login.php';
	$_SESSION['admin_connexion'] = "<span >Bienvenue dans votre compte.</span>";
}
function get_comment()
{
	if (isset($_GET['id'])  && intval($_GET['id']) > 0) {
		$comment = new commentDAO();
		$comments = $comment->get_comment();
		require '../views/admin.php';
	} else {
		echo $erreur = "la page demander elle n'existe pas ";
	}
}

function contact_file()
{
	$contact = new ContactDAO();
	$contacts = $contact->contact();
	require '../views/contact.php';
}
function inser_contact()
{
	$contactDAO = new ContactDAO();
	$contactDAO->insercontact();

	require '../views/contact.php';
}
function page_admin()
{
	$articleDAO = new ArticleDAO();
	$articles = $articleDAO->get_All_Article();
	// On récupérer tous les commentaires associés à l'article
	$commentDAO = new CommentDAO();
	$comments = $commentDAO->get_comment();
	// On récupérer tous les commentaires associés à l'article pour les flager
	$comment = new commentDAO();
	$commentflag = $comment->comment_for_flaged();
	// On récupérer tous les messages de nos visiteurs
	$contactDAO = new ContactDAO();
	$contacts = $contactDAO->contact();

	$articleDAO->administration();
	require '../views/admin.php';
}
