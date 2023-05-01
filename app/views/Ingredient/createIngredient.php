<?php $this->view('shared/header', "Add Ingredient"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Add a New Ingredient')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name">

		<select name="category" id="status" class="dropdownUserType">
			<option selected disabled><?= _('--Select a Category--') ?></option>
			<option value="fruit" name="fruit"><?= _('Fruit') ?></option>
			<option value="dairy" name="dairy"><?= _('Dairy') ?></option>
			<option value="sweets" name="sweets"><?= _('Sweets') ?></option>
			<option value="fat" name="fat"><?= _('Fat and Oils') ?></option>
			<option value="baking" name="baking"><?= _('Baking Products') ?></option>
			<option value="other" name="other"><?= _('Others') ?></option>
		</select>

		<textarea placeholder="<?= _('Description...') ?>" name="description" class="createInput"></textarea><br>

		<label>Picture</label><br>
		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="ingredientPicture"><br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Ingredient')?>" name="action"> <br><br>

		<a class="btn" href="/Ingredient/index" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
		
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>