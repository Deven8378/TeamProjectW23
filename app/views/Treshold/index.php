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
		<tr><th>Category</th><th>Treshold</th><th>Actions</th></tr>
		<form action='' method='post' enctype="multipart/form-data">
			<tr>
				<td><input type="text" placeholder="<?= _('Category Name')?>" name="treshold_category"></td> 
				<td><input type="number" min="0" max="100" name="treshold_days"></td>
				<td><input type="submit" name="create" placeholder="<?=_('Create')?>"></	td>
			</tr>
		</form>
	<?php
		foreach ($data as $category) { ?>
		<tr>
			<td><?= $category->treshold_category ?></td> 
			<td><?= $category->treshold_days ?></td>
			<td><a href='/Treshold/edit/<?= $category->treshold_id ?>'>Edit</a>
				<a href='/Treshold/delete/<?= $category->treshold_id ?>'>Delete</a></td>

		</tr>
			
	<?php
	}	
	?>	
		
	</table>
</div>

<?php $this->view('shared/footer'); ?>
