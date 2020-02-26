
<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

      <!-- Accueil -->
      <section>
          <img src="public/image/alaska-principale" alt="image-principale-montrant-une-montagne-de-l'Alaska" id="image-principale">
          <div class="container-fluid" id="container-1">
            <h1>Billet simple pour l'Alaska</h1>
            <p><em>Bienvenue sur le blog de Jean Forteroche</em></p>
            <div class="boutonAccueil"><a id="renseignement" href="index.php?action=pageRenseignements">Cliquez ici pour en savoir plus</a></div>
          </div>
      </section>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>