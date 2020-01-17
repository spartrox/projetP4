
<?php $title = "Blog de Jean Forteroche"; ?>

    <?php ob_start(); ?>  
    
    <h2>Gestion du Profil</h2>
    <div align="center">
        <div align="left">
          <button id="bouttonDeconnexion"><a href="deconnexion.php">Se deconnecter</a></button>
        </div>

        <?php if(isset($msg)) { echo '<font color="red">' . $msg . '</font>';} ?>
</div>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>