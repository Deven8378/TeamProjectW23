<?php $this->view('shared/header', "Recipes"); ?>
<?php $this->view('shared/navigation/nav'); ?>


<style type="text/css">
.vl {
  border-left: 1px solid #d9d9d9;
  height: 800px;
}
</style>


<div class="container">
	<div class="row">
		<div class="col-sm-2">
			<a class="btn" href="/Recipe/create" role="button" style="background-color: #e8c8e7;"><?= _('Add Recipe') ?></a>
			<hr style="height:1px; border-width:0 ;color: #d9d9d9; background-color:gray">	
		</div>
		<div class="col-sm-1"> 
			<div class="vl"></div>
		</div>
		<div class="col offset-sm-1">
			<div class="row">
			  <?php $this->view('Recipe/recipeCard', $data); ?>
			</div>
		</div>
	</div>
</div>



<?php $this->view('shared/footer'); ?>
