<?php $this->view('shared/header', "Edit Quantity"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<?php 
	$isAdmin = $_SESSION['user_type']=="admin";
	$isEmployee= $_SESSION['user_type']=="employee";
?>

<div class='common-container' align='center'>
	<p class="sign" align="center"><?=_('Edit Ingredient Quantity')?></p>
	
	<?php 
		if ($isAdmin) {
			echo "<form action='/Ingredient/editQuantity/$data->iq_id' method='post' enctype='multipart/form-data'>";
		}
		if ($isEmployee) {
			echo "<form action='/Ingredient/quantityUpdate/$data->iq_id' method='post' enctype='multipart/form-data'>";
		}
	?>	

		<div class="grid-50" align="center">
			<label><?=_('Arrival Date')?></label>
			<input class="input-qty" type="date" required autocomplete="off" name="arrival_date" value="<?= $data->arrival_date ?>" <?php if ($isEmployee) {echo "style='border:3px solid red;' readonly";}?>>

			<label><?=_('Expired Date')?></label>
			<input class="input-qty" type="date" required autocomplete="off" name="expired_date" value="<?= $data->expired_date ?>"<?php if ($isEmployee) {echo "style='border:3px solid red;' readonly";}?>>

			<label><?=_('Quantity')?></label>
			<input class="input-qty" type="number" min="0" step="1" id="totalAmt" name="quantity" value="<?= $data->quantity ?>"<?php if ($isEmployee) {echo "";}?>>

			<label><?=_('Price')?></label>
			<input class="input-qty" type="number" min="0" step="0.01" id="totalAmt" name="price" value="<?= $data->price ?>"<?php if ($isEmployee) {echo "style='border:3px solid red;' readonly";}?>>

			<input class="submit-inv" type="submit" align="" value="<?=_('Edit Quantity')?>" name="action">

			<a class="btn-general" href="/Ingredient/ingredientDetails/<?=$data->ingredient_id?>" role="button"><?= _('Back') ?></a>
		</div>
	</form>

</div>

<?php $this->view('shared/footer'); ?>