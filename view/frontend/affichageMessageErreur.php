<?php $title = 'Erreur'; ?>
<?php $script=""; ?>

<?php ob_start(); ?>

<div class="container">
	<p class="alert alert-danger" id="message_erreur"><strong><?= 'Erreur : ' . $e->getMessage() ?></strong></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>