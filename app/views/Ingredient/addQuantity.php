<?php $this->view('shared/header', "Add Ingredient"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Add a New Ingredient')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name">

		<input type="datetime-local" required="" autocomplete="off" name="arrival_date"><br>
		<input type="datetime-local" required="" autocomplete="off" name="expired_date"><br>
		<label>Quantity</label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="quantity">
		<br> <br>
		<label>Price</label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="price">
		<br> <br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Ingredient')?>" name="action"> <br><br>

		<a class="btn" href="/Ingredient/index" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
	</form>

</div>

<?php $this->view('shared/footer'); ?>