<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	
			<div class="center">
				
				<h2>Connexion</h2>	
				<br><br>
				<form action="index.php?action=pageConnexionSubmit" method="post">	
							<div class="emailConnexion">
								<label>Pseudo :</label>
								<input type="text" name="pseudoconnect" placeholder="Pseudo"> <br>
							</div>
							<div id="mdpConnexion">
								<label>Mot de passe :</label>
								<input type="password" name="mdpConnect" placeholder="Mot de passe">
							</div>
							<div class="center">
								<br>
								<input type="submit" name="formconnexion" value="Se connecter" id="connexion">
							</div>
				</form> <br>

				<a href="index.php?action=pageInscription"> Cliquez ici pour créer un compte !</a>
			</div>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>