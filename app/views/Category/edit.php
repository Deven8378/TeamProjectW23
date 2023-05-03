<form action='/Category/edit' method='post' enctype="">
	<div class="" style="

	border: 1px solid black;
/*	width:  70%;*/
height: 200px;
	padding: 20px;
	display: grid;
	row-gap: 5px;

/*	flex-wrap: wrap-reverse;*/

	">
		<h3>Edit a Category:</h3>
		<select class=""  
		style="" 

		name="editCategory_id" id="selectBox" onchange="getValueUsingID()">
			<option selected disabled><?= _('-ID-') ?></option>
			<?php
			foreach ($data as $category) { ?>
			 	<option value="<?=$category->category_id ?>">
			 		<?= $category->category_id ?>
			 	</option>
			<?php  } ?>
		</select>

		<input 
		style="" 
		class="" id="editing" type="text" placeholder="<?= _('Category Name')?>" name="editCategory_name">

		<input 

		class="btn" style="background-color: red;" type="submit" name="edit" value="<?=_('edit')?>">
	</div>
</form>