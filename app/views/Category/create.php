<form action='/Category/create' method='post' enctype="multipart/form-data">
	<div class="col-category">
			<h3 align="center"><?=_('Add a Category')?>:</h3> 
			<div style="left: 0px;" ><?= _('Category Name')?>:</div>
			
			<input type="text" placeholder="<?= _('Category Name')?>" name="category_name">
			<input class="btn-general"  style="background-color: #c98bc8;" type="submit" name="create" value="<?=_('Add')?>">
		</tr>
	</div>
</form>