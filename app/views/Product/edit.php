<?php $this->view('shared/header', "Edit " . $data->name); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Edit')?> <?= $data->name ?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name" value="<?= $data->name ?>">

		<textarea placeholder="<?= _('Description...') ?>" name="description" class="createInput"><?= $data->description ?></textarea><br>
		
		<label><?= _('Price') ?></label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="price" value="<?= $data->price ?>">
		<br> <br>

		<label><?= _('Description') ?></label><br>
		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="productPicture" value="<?= $data->picture ?>"><br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Product')?>" name="action"> <br><br>

		<a class="btn" href="/Product/index" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
		
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>