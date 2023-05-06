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
		<textarea class="input-inv" name="description" placeholder="<?= _('Description...') ?>" ></textarea>

		<div class="grid-50" align="center">

			<label>Picture</label>
			<!-- Place holder for input type file might be useless -->
			<label class="file-label" >
				<input class="file-input" type="file" placeholder="<?=_('Picture')?>" name="ingredientPicture">
			</label>
			<input class="submit-inv" type="submit" value="<?=_('Add Ingredient')?>" name="action"> 

			<a class="btn-general" href="/Ingredient/index" role="button" ><?= _('Back') ?></a>
		</div>
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>