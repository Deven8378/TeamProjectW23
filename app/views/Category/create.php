<form action='/Category/create' method='post' enctype="multipart/form-data">
	<div
	style="
	height: 200px;
	padding: 20px;
	display: grid;
	row-gap: 5px;
	"  
	>
			<h3>Add a Category:</h3> 
			<div style="left: 0px;" >Category Name:</div>
			<!-- <div style="height: 10px;"></div> -->
			<input type="text" placeholder="<?= _('Category Name')?>" name="category_name">
			
			<input class="btn-it"  style="background-color: #c98bc8;" type="submit" name="create" value="<?=_('Add')?>">
		</tr>
	</div>
</form>