<?php $this->view('shared/header', _("Add Recipe")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="createProfile" align="center">
	<p class="sign" align="center"><?=_('Add a New Recipe')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" type="text" align="" placeholder="<?=_('Title')?>" name="title">

		<textarea class="createInput"name="description" placeholder="<?=_('Description')?>" rows="10" cols="50"> </textarea>


		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="recipePicture">

		<input class="submitUser" type="submit" align="" placeholder="<?=_('Add Recipe')?>" name="action"> <br>

		<a href='/Recipe/index'> <?= _("Back") ?> </a>
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>
