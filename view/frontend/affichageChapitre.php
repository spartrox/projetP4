<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>
		<h2>Liste de tous les chapitres publiés</h2>
		<section>
		      <div class="container col-md-8">
		        <div class="row ">
		          		         
		        <?php
					while ($post = $posts->fetch()){
						if (!empty($post)){
				?>

						<div class="col-md-5" id="container-chapitres">
						    <a href="index.php?action=post&amp;id=<?= $post['id']; ?>">
						    	<h3>
						        	<?php echo ($post['titre']); ?>
						    	</h3>
						    </a>
						       <em> Ajouté le <?php echo $post['date_creation_fr']; ?></em>
						       
						    	

						    <!-- // On affiche le contenu des chapitres -->
						    <p>
						    <?php echo nl2br(($post['contenu'])); ?>
						    <br/>
						    <em><a href="index.php?action=post&amp;id=<?= $post['id']; ?>">Écrire un commentaires</a></em>
						    </p>
						</div>

					<!-- // Fin de la boucle des chapitres -->
				<?php
					} else {
						echo "<p>Il n'y a actuellement pas de chapitre publié</p>";
					}

				}
					$posts->closeCursor();
				?>

		        </div>  
		      </div>
		</section>
		
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
