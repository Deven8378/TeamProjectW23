<?php $this->view('shared/header', "Add Product"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Add a New Product')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name">

		<select name="category" id="status" class="dropdownUserType">
			<option selected disabled><?= _('--Select a Category--') ?></option>
			<?php
			foreach ($data as $category) { ?>
			 	<option value="<?=$category->category_id ?>">
			 		<?= $category->category_name ?>
			 	</option>
			<?php  } ?>
		</select>
		
		<textarea placeholder="<?= _('Description...') ?>" name="description" class="createInput"></textarea><br>

		<label>Picture</label><br>
		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="productPicture"><br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Product')?>" name="action"> <br><br>

		<a class="btn" href="/Product/index" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>