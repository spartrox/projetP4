<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>  
    
    <h2>Gestion du Profil</h2>
    <div align="center">
        <div>
          <button id="bouttonDeconnexion"><a href="index.php?action=pageDeconnexion">Se deconnecter</a></button>
        </div>

        <?php if(isset($msg)) { echo '<font color="red">' . $msg . '</font>';} ?>
	</div>

    <?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>