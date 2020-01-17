
<?php $title = "Blog de Jean Forteroche"; ?>

    <?php ob_start(); ?>

      <!-- Accueil -->
      <section>
          <img src="public/image/alaska-principale" alt="image-principale-montrant-une-montagne-de-l'Alaska" id="image-principale">
          <div class="container-fluid" id="container-1">
            <h1><em>Billet simple pour l'Alaska </em></h1>
            <p><em>Bienvenue sur le blog de Jean Forteroche</em></p>
            <button id="boutton1"><a href="index.php?action=affichageRenseignements.php">Cliquez ici pour en savoir plus</a> </button>
          </div>
      </section>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>