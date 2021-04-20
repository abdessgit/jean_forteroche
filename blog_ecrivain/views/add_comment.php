
	<h3>Poster un commentaire</h3>
	<?php
		if(isset($_SESSION['add_comment'])){
				echo "<span>".$_SESSION['add_comment']."</span>";
				unset($_SESSION['add_comment']); 
			}
		?>
	<div class="form-row">	
		<form method="POST" action="../public/index.php?route=add_comment&articleId=<?php echo $_GET['articleId']?>">
			<label for="pseudo">Pseudo</label><br>
			<input class="form-control mx-sm-3" type="text" id="pseudo" name="pseudo"><br>
			<label for="content">Message</label><br>
			<input type="hidden" id="POST" name="article_id" value="<?php echo $_GET['articleId'] ?>"><br>
			<textarea class="form-control mx-sm-3" id="content" name="content"></textarea><br>
			<input   class="btn btn-success" type="submit" value="Ajouter" id="submit" name="submit"></br>
			
		</form>
	</div>
