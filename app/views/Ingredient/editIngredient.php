<?php $this->view('shared/header', "Edit " . $data['0']->name); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='createProfile' align='center'>
	<p class="sign" align="center"><?=_('Edit')?> <?= $data['0']->name ?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="center" placeholder="<?= _('Name') ?>" name="name" value="<?= $data['0']->name ?>">

		<select name="category" id="status" class="dropdownUserType" selected="<?=$data['0']->category_id ?>">
			<option selected disabled><?= _('--Select a Category--') ?></option>
			<?php
			foreach ($data['1'] as $category) { ?>
			 	<option value="<?=$category->category_id ?>"
			 		<?php if($category->category_id == $data[0]->category){ ?>
			 			selected="<?= $data[0]->category ?>"
			 		<?php } ?>>
			 		<?= $category->category_name ?>
			 	</option>
			<?php  } ?>
		</select>


		<textarea placeholder="<?= _('Description...') ?>" name="description" class="createInput"><?= $data['0']->description ?></textarea><br>

		<label><?= _('Description') ?></label><br>
		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="ingredientPicture" value="<?= $data['0']->picture ?>"><br>

		<input class="submitIngredient" type="submit" align="" placeholder="<?=_('Add Ingredient')?>" name="action"> <br><br>

		<a class="btn" href="/Ingredient/ingredientDetails/<?=$data['0']->ingredient_id?>" role="button" style="background-color: #e8c8e7;"><?= _('Back') ?></a>
		
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>