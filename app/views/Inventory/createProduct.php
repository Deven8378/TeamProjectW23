
<?php $this->view('shared/header', "Add Ingredient"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Add a New Product')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name">

		<textarea placeholder="<?= _('Description...') ?>" name="description" class="createInput"></textarea><br>
		
		<label>Price</label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="price">
		<br> <br>

		<label>Picture</label><br>
		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="productPicture"><br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Product')?>" name="action"> <br><br>

		<a class="btn" href="/Inventory/products" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>