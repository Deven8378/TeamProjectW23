<?php $this->view('shared/header', "Edit Quantity"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='common-container' align='center'>
	<p class="sign" align="center"><?=_('Edit Ingredient Quantity')?></p>
	
	<?php 

		if ($_SESSION['user_type']=="admin") {
			echo "<form action='/Ingredient/editQuantity/$data->iq_id' method='post' enctype='multipart/form-data'>";
		}
		if ($_SESSION['user_type']=="employee") {
			echo "<form action='/Ingredient/quantityUpdate/$data->iq_id' method='post' enctype='multipart/form-data'>";
		}

	?>	

		<div class="grid-50" align="center">
			<label>Arrival Date</label>
			<input class="input-qty" type="date" required autocomplete="off" name="arrival_date" value="<?= $data->arrival_date ?>" 
			<?php if ($_SESSION['user_type']=="employee") {echo "style='border:3px solid red;' readonly";}?>
			>

			<label>Expired Date</label>
			<input class="input-qty" type="date" required autocomplete="off" name="expired_date" value="<?= $data->expired_date ?>"
			<?php if ($_SESSION['user_type']=="employee") {echo "style='border:3px solid red;' readonly";}?>
			>

			<label>Quantity</label>
			<input class="input-qty" type="number" min="0" step="1" id="totalAmt" name="quantity" value="<?= $data->quantity ?>"
			<?php if ($_SESSION['user_type']=="employee") {echo "";}?>
			>

			<label>Price</label>
			<input class="input-qty" type="number" min="0" step="0.01" id="totalAmt" name="price" value="<?= $data->price ?>"
			<?php if ($_SESSION['user_type']=="employee") {echo "style='border:3px solid red;' readonly";}?>
			>

			<input class="submit-inv" type="submit" align="" value="<?=_('Edit Quantity')?>" name="action">

			<a class="btn-general" href="/Ingredient/ingredientDetails/<?=$data->ingredient_id?>" role="button"><?= _('Back') ?></a>
		</div>
	</form>

</div>

<?php $this->view('shared/footer'); ?>