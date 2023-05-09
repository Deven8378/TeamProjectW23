<?php $this->view('shared/header', _("View Categories")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="categoryContainer">
	<div class="back-category">
		<a class="btn-general" style="margin-bottom: 0px;" id="backLink" href="/Ingredient/index" >
			<i class="bi bi-arrow-left"></i><?= _('Back') ?>
		</a>
	</div>
	<div >
		<div>
			<p class="sign" align="center"><?=_('Categories')?></p>
		</div>  
	</div>
	<div>
		<div class="row-category">
			<div class="col-inner-category">
				<?php $this->view('Category/create',$data);?>
			</div>

			<div class="col-divider" align="center"><hr class="divider"></div>

			<div class="col-inner-category">
				<?php $this->view('Category/edit',$data) ?>
			</div>
		</div>

		<div>
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
