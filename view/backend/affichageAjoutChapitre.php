<?php $title = "Blog de Jean Forteroche"; ?>
		<!-- SCRIPT -->
      <?php ob_start(); ?>	 
      	<script src="public/jquery/jquery-3.4.1.js"></script>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      	<script src="https://cdn.tiny.cloud/1/7m0zznhb6kk4zat2boj6jsfp5od1h88q7ox95195xlzx1t5e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      	<script src="public/tinyMCE/langFR.js"></script>
		<script>
			  tinymce.init({
			    selector: '#myTextarea',
			   	language: "fr_FR",	    
			  });
  		</script>
	<?php $script = ob_get_clean(); ?> 
    
    	<!-- Création d'un nouveau chapitre -->
    <?php ob_start(); ?>
    <h2>Publication d'un chapitre</h2>
	    <div class="container-fluid" id="ajoutChapitre">
	    	<form action="index.php?action=addChapitre"  method="post">
		        <label for="titre">Titre :</label>
		        <input class="titreChapitre" type="text" placeholder="Titre du chapitre" name="titre" />
		        <textarea name="contenu " id="myTextarea" placeholder="Écriver votre chapitre"></textarea>
		        <input class="chapitreSubmit" type="submit" name="publication" value="Publier le chapitre" id="publier" />    	
			</form>    
		</div>

	<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>