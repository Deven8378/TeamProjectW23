<?php $this->view('shared/header', _("View Categories")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="" align="center" style="
	
	border: solid;
	background-color: #F3EBF6;
  width: 70%;
/*  height: 610px;*/
  padding: 20px;
  margin: 3em auto;
  border-radius: 1.5em;
  
  ">

	<p class="sign" align="center"><?=_('Categories')?></p>
	<div style=" " class="">
		
		<div style=" " class="row">
			<div style="" class="col">
				<?php $this->view('Category/create',$data);?>
			</div>
			<div style="" class="col">
				<?php $this->view('Category/edit',$data) ?>
			</div>
		</div>

		<div class="">
			<table class="table" style="">
			<tr style="; ">
				<th style=";"><?=_('ID')?></th>
				<th style=";"><?=_('Category')?></th>
				<th style=";"><?=_('Actions')?></th>
			</tr>

		<?php foreach ($data as $category) { ?>
			<tr>
				<td><?= $category->category_id ?></td>
				<td id="<?= $category->category_id ?>"><?= $category->category_name ?></td>
				<td><a href='/Category/delete/<?= $category->category_id ?>'><?=_('Delete')?></a></td>

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
