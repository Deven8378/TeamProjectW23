<form action='/Category/edit' method='post'>
	<div class="col-category">
		<h3 align="center"><?=_('Edit a Category')?>:</h3>
		<select name="editCategory_id" id="selectBox" onchange="getValueUsingID()">
			<option selected disabled>---<?= _('Select the ID') ?>---</option>
			<?php
			foreach ($data as $category) { ?>
			 	<option value="<?=$category->category_id ?>">
			 		<?= $category->category_id ?>
			 	</option>
			<?php  } ?>
		</select>

		<input id="editing" type="text" placeholder="<?= _('Category Name')?>" name="editCategory_name">

		<input class="btn-general" style="background-color: #c98bc8;" type="submit" name="edit" value="<?=_('Edit')?>">
	</div>
</form>