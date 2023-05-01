<?php $this->view('shared/header', "Add New Quantity to Product"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<link rel="stylesheet" type="text/css" href="/css/addQuantity.css">

<div class='addQuantity' align='center'>
	<p class="sign" align="center"><?=_('Add a New Product Quantity')?></p>
	<form action='' method='post' enctype="multipart/form-data">
		<label>Produced Date</label><br><br>
		<input type="date" required="" autocomplete="off" name="produced_date"><br><br>
		<label>Expired Date</label><br><br>
		<input type="date" required="" autocomplete="off" name="expired_date"><br>
		<label>Quantity</label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="quantity">
		<br> <br>
		<label>Price</label><br>
		<input type="number" min="0" step="0.01" id="totalAmt" name="price">
		<br> <br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Product')?>" name="action"> <br><br>

		<a class="btn" onClick="history.go(-1)" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
	</form>

</div>

<?php $this->view('shared/footer'); ?>