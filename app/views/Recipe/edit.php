<?php $this->view('shared/header', _("Edit Recipe")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="createProfile" align="center">
	<p class="sign" align="center"><?=_('Edit this Recipe')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" name="title" type="text" align="" placeholder="<?=_('Title')?>" value="<?= htmlentities($data->title) ?>">

		<textarea class="createInput"name="description" placeholder="<?=_('Description')?>" rows="10" cols="50"><?= htmlentities($data->description) ?></textarea>


		<input class="createInput" type="file" align="" placeholder="<?=_('Picture')?>" name="recipePicture" value ="<?= htmlentities($data->picture) ?>" >

		<input class="submitUser" type="submit" align="" placeholder="<?=_('Add Recipe')?>" name="action"> <br>

		<a href='/Recipe/details/<?= htmlentities($data->recipe_id) ?>'><?= _("Back") ?></a> 
	 
	</form>

</div>
<?php $this->view('shared/footer'); ?>