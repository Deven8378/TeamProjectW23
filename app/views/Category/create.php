<form action='/Category/create' method='post' enctype="multipart/form-data">
	<div
	style="
/*	border:1px solid black;*/
/*margin-right: 20px;*/

/*	width:  70%;*/
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
			
			<input class="btn"  style="background-color: red;" type="submit" name="create" value="<?=_('Add')?>">
		</tr>
	</div>
</form>