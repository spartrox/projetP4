<!DOCTYPE html>
<html lang="FR">
	<head>
	    <!-- COMPATIBILITÉ -->
	    <meta charset="utf-8"/>
	    <meta name="viewport" content="width=device-width" />
	    <meta http-equiv="x-ua-compatible" content="ie=edge" />

		<!-- Récupération du titre de chaque page -->
		<title><?=$title ?></title>

	      <!-- CSS/JQUERY/JAVASCRIPT -->
	      <link rel="stylesheet" href="public/css/bootstrap.min.css">
	      <link rel="stylesheet" type="text/css" href="public/css/style.css">
	      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	      <script src="https://kit.fontawesome.com/ce7aa8f479.js" crossorigin="anonymous"></script>
	      <script src="public/javascrit/javascrit.js"></script>	


	      <!-- Récupération du script pour l'ajout de chapitre -->
		  <?= $script ?>
	</head>
	
	<body>
            <!-- Menu -->
      <?php include("affichageMenu.php"); ?>
        
        <!-- Récupération du contenu de chaque page -->
        <?= $content ?>

            <!-- Pied de page -->
        <?php include("affichageFooter.php"); ?>

    </body>
</html>