<?php $this->view('shared/header', _("View Categories")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="categoryContainer" align="center" style="">
	<div class="back-category" style="">
		<a class="btn-general" style="margin-bottom: 0px;" id="backLink" href="/Ingredient/index" >
			<i class="bi bi-arrow-left"></i><?= _('Back') ?>
		</a>
	</div>
	<div >
		<div class="" style="" ><p class="sign" align="center"><?=_('Categories')?></p></div>  
	</div>
	<div>
		<div class="row">
			<div class="col"><?php $this->view('Category/create',$data);?></div>
			<div class="col-1"><hr class="divider" style=""></div>
			<div class="col"><?php $this->view('Category/edit',$data) ?></div>
		</div>
		<div >
			<table class="table">
			<tr>
				<th><?=_('ID')?></th>
				<th><?=_('Category')?></th>
				<th><?=_('Actions')?></th>
			</tr>
		<?php foreach ($data as $category) { ?>
			<tr>
				<td><?= $category->category_id ?></td>
				<td id="<?= $category->category_id ?>"><?= $category->category_name ?></td>
				<td><a class="btn-general" href='/Category/delete/<?= $category->category_id ?>'><?=_('Delete')?></a></td>
			</tr>
		<?php }	?>	
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

	function getValueUsingID() {
		var selectBox = document.getElementById("selectBox");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		var getID = document.getElementById(selectedValue).innerHTML;

		document.getElementById("editing").setAttribute("value", getID);

	}

</script>
<?php $this->view('shared/footer'); ?>
