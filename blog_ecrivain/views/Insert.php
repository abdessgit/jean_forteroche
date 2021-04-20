
<?php
	
	require '../src/DAO/DAO.php';

	require '../src/DAO/ArticleDAO.php';

	$articleDAO = new ArticleDAO();

	$articleDAO->add_article();

?>
