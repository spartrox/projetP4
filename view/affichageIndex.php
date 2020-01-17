<!DOCTYPE html>
<html lang="France">
  <head>
      <title>Blog de Jean Forteroche</title>
      <meta charset="utf-8">

      <!-- CSS -->
      <link rel="stylesheet" href="public/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="public/css/style.css">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
  </head>
  <body>
      <!-- Menu -->
   <?php include("affichageMenu.php"); ?> 

      <!-- bloc 1 -->
      <section>
          <img src="image/alaska-principale" alt="image-principale-sable" id="image-principale">
          <div class="container-fluid" id="container-1">
            <h1><em>Billet simple pour l'Alaska </em></h1>
            <p><em>Bienvenue sur le blog de Jean Forteroche</em></p>
            <button id="boutton1"><a href="renseignements.php">Cliquez ici pour en savoir plus</a> </button>
          </div>
      </section>
      
              <!-- Pied de page -->
        <?php include("affichageFooter.php"); ?>
  </body>
</html>