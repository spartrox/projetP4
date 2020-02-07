
<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
	  <h2>À propos</h2>
	  
	  <div class="container">
		  <h3>Billet simple pour l'Alaska :</h3>
		  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
	  </div><br><br>
	  
	  <div class="container">
		  <h3>Jean Forteroche :</h3>
		  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
	</div>

	  <h2>Nous contacter</h2>

	  <div id="contact">
	  	<div>
		  <p>
		  		<span class="contact1">Contact :</span> <br>
		  	Agence Jean Forteroche<br>
		  	10 rue du port<br>
		  	17000 La Rochelle<br>
		  	France<br>
		  </p>
		</div>

		<div>
		  <p>
		  		<span class="contact1">Adresse :</span> <br>
		  	<span class="contact2">Tel :</span> 05 46 10 12 14<br>
		  	<span class="contact2">Portable :</span> 06 50 60 70 80<br>
		  	<span class="contact2">Email :</span> jean.forteroche@gmail.com
		  </p>
		</div>
	  </div>
	  <?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>