<form action='/Category/edit' method='post' enctype="">
	<div class="col-category" style="">
		<h3 ><?=_('Edit a Category')?>:</h3>
		<select class="" style="" name="editCategory_id" id="selectBox" onchange="getValueUsingID()">
			<option selected disabled><?= _('-ID-') ?></option>
			<?php
			foreach ($data as $category) { ?>
			 	<option value="<?=$category->category_id ?>">
			 		<?= $category->category_id ?>
			 	</option>
			<?php  } ?>
		</select>

		<input style="" class="" id="editing" type="text" placeholder="<?= _('Category Name')?>" name="editCategory_name">

		<input class="btn-general" style="background-color: #c98bc8;" type="submit" name="edit" value="<?=_('Edit')?>">
	</div>
</form>