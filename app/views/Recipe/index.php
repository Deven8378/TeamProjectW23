<?php $this->view('shared/header', "Recipes"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="container" style="padding-top: 50px;">
	<a class="btn" href="/Recipe/create/" role="button" style="background-color: #e8c8e7;"><?= _('Add Recipe') ?></a>

</div>



<?php $this->view('shared/footer'); ?>
