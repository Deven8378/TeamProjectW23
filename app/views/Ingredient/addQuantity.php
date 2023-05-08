<?php $this->view('shared/header', "Add New Quantity to Ingredient"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='common-container' align='center'>
	<p class="sign" align="center"><?=_('Add a New Ingredient Quantity')?></p>
	<form action='' method='post' enctype="multipart/form-data">
		
		<div class="grid-50">
			<label><?= _('Arrival Date')?></label>
			<input class="input-qty" type="date" required="" autocomplete="off" name="arrival_date">
			
			<label><?= _('Expired Date')?></label>
			<input class="input-qty" type="date" required="" autocomplete="off" name="expired_date">
			
			<label><?= _('Quantity')?></label>
			<input class="input-qty" type="number" min="0" step="1" id="totalAmt" name="quantity">

		
			<label><?= _('Price')?></label>
			<input class="input-qty" type="number" min="0" step="0.01" id="totalAmt" name="price">

			<input class="submit-inv" type="submit" align="" value="<?=_('Add Quantity')?>" name="action">

			<a class="btn-general" href="/Ingredient/ingredientDetails/<?=$data->ingredient_id?>" role="button" ><?= _('Back') ?></a>
		</div>
	</form>

</div>

<?php $this->view('shared/footer'); ?>