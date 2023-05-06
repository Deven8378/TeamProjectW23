<?php $this->view('shared/header', "Add Ingredient"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='common-container' 
align='center'>
	<p class="sign" align="center"><?=_('Add a New Ingredient')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="input-inv" type="text" align="center" placeholder="<?= _('Name') ?>" name="name" required>

		<div align="center">
			<select class="dropdown-inv" 
			name="category" id="status" >
				<option selected disabled><?= _('--Select a Category--') ?></option>
				<?php
				foreach ($data as $category) { ?>
				 	<option value="<?=$category->category_id ?>">
				 		<?= $category->category_name ?>
				 	</option>
				<?php  } ?>
			</select>
		</div>
		<textarea class="input-inv" 
		placeholder="<?= _('Description...') ?>" name="description" ></textarea><br>

		<label>Picture</label><br>
		<input class="file-input" 
		type="file" align="" placeholder="<?=_('Picture')?>" name="ingredientPicture"><br>

		<input class="submit-inv" 
		type="submit" align="" placeholder="<?=_('Add Ingredient')?>" name="action"> <br><br>

		<a class="btn-general" href="/Ingredient/index" role="button" ><?= _('Back') ?></a>
		
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>