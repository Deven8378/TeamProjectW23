<?php $this->view('shared/header', "Recipes"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="container" style="padding-top: 50px;">
	<a class="btn" href="/Inventory/createIngredient" role="button" style="background-color: #e8c8e7;"><?= _('Add Ingredient') ?></a>

</div>



<?php $this->view('shared/footer'); ?>
