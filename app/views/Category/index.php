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
	<?php
		foreach ($data as $category) { ?>
			<!-- nl2br(string) == make a new line with br -->
			<!-- echo $logEntry; -->
			<!-- <tr><td><?php	echo nl2br($logEntry); ?></td></tr> -->
		<tr>
			<td><?= $category->treshold_category ?></td> 
			<td><?= $category->treshold ?></td>
			<td><a href='/Category/edit/<?= $category->treshold_id ?>'>Edit</a>
				<a href='/Category/delete/<?= $category->treshold_id ?>'>Delete</a></td>

		</tr>
			
	<?php
	}	
	?>	
		<form action='' method='post' enctype="multipart/form-data">
			<tr>
				<td><input type="text" placeholder="<?= _('Category Name')?>" name="treshold_category"></td> 
				<td><input type="number" name="" min="1" max="100" name="treshold"></td>
				<td><input type="submit" name="action" placeholder="Create"></	td>
			</tr>
		</form>
	</table>
</div>

<?php $this->view('shared/footer'); ?>
