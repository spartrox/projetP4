
<?php $title = "Blog de Jean Forteroche"; ?>

		<?php ob_start(); ?>
		<h2>Liste de tous les chapitres publiés</h2>
		<section>
		      <div class="container col-md-8">
		        <div class="row ">
		          		         
		        	<?php
					while ($donnees = $req->fetch())
					{
					?>
					<div class="col-md-5" id="container-chapitres">
					    <a href="index.php?action=pageCommentaires=<?php echo $donnees['id']; ?>">
					    	<h3>
					        	<?php echo htmlspecialchars($donnees['titre']); ?>
					    	</h3>
					    </a>
					       <em>le <?php echo $donnees['date_creation_fr']; ?></em>
					    <p>
					    	
					    <?php
					    // On affiche le contenu des chapitres
					    echo nl2br(htmlspecialchars($donnees['contenu']));
					    ?>
					    <br/>
					    <em><a href="index.php?action=pageCommentaires=<?php echo $donnees['id']; ?>">Écrire un commentaires</a></em>
					    </p>
					</div>
					
					<?php
					} // Fin de la boucle des chapitres
					$req->closeCursor();
					?>
		        </div>  
		      </div>
		</section>
		
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
