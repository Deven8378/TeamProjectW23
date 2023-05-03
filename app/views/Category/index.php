<?php $this->view('shared/header', _("View Categories")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="" align="center" style="background-color: #F3EBF6;
  width: 900px;
  height: 610px;
  margin: 3em auto;
  border-radius: 1.5em;
 /* box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);*/">
	<p class="sign" align="center"><?=_('Categories')?></p>
	<table>
		<tr><th>Category</th><th>Actions</th></tr>
		<form action='' method='post' enctype="multipart/form-data">
			<tr>
				<td><input type="text" placeholder="<?= _('Category Name')?>" name="category_name"></td> 
				<td><input type="submit" name="create" placeholder="<?=_('Create')?>"></	td>
			</tr>
		</form>
	<?php
		foreach ($data as $category) { 
			?>
		<tr>
			<td><?= $category->category_name ?></td>

			<td>
				<a href='/Category/edit/<?= $category->category_id ?>'>Edit</a>
				<a href='/Category/delete/<?= $category->category_id ?>'>Delete</a></td>

		</tr>
			
	<?php
	}	
	?>	
		
	</table>
</div>

<?php $this->view('shared/footer'); ?>
