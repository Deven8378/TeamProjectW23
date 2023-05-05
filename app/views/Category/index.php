<?php $this->view('shared/header', _("View Categories")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div align="center" style="border: solid; background-color: #F3EBF6; width: 70%; padding: 20px; margin: 3em auto; border-radius: 1.5em;">
	
	<div style="display: grid; grid-template-columns: 100px auto auto; margin: 0px;">
		<a 
		class="btn-it" style="margin-bottom: 0px;" href="/Ingredient/index" id="backLink">
			<i class="bi bi-arrow-left"></i><?= _('Back') ?>
		</a>
	</div>

	<div >
		
		<div class="" style="">
	        
	        <p class="sign" align="center"><?=_('Categories')?></p>
	    </div>  
	</div>
	<div>
		
		<div class="row">
			<div class="col">
				<?php $this->view('Category/create',$data);?>
			</div>

			<div class="col-1">
				<hr class="divider" style="margin-left: 5px; margin-right: 5px; height: 90%; width: 1px; background-color: grey; ">
			</div>
			
			<div class="col">
				<?php $this->view('Category/edit',$data) ?>
			</div>
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
				<td>
						<a class="btn-it" href='/Category/delete/<?= $category->category_id ?>'><?=_('Delete')?></a>
					<!-- <button type="submit" class="btn" onclick="openPopup()">Delete</button> -->
				</td>

			</tr>
				
		<?php }	?>	

			</table>

		</div>

	</div>
	<!-- <div class="popup" id="popup"> -->
			<!-- <button type="submit" class="btn" onclick="closePopup()">Cancel</button> -->

	<!-- </div> -->
	
</div>
<script type="text/javascript">
	// POPPUP for delete


	function getValueUsingID() {
		var selectBox = document.getElementById("selectBox");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		var getID = document.getElementById(selectedValue).innerHTML;

		document.getElementById("editing").setAttribute("value", getID);

	}

</script>


<?php $this->view('shared/footer'); ?>
