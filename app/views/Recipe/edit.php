<?php $this->view('shared/header', _("Edit Recipe")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="common-container" align="center">
	<p class="sign" align="center"><?=_('Edit this Recipe')?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="createInput" name="title" type="text" align="" placeholder="<?=_('Title')?>" value="<?= $data->title ?>">

		<textarea class="createInput"name="description" placeholder="<?=_('Description')?>" rows="10" cols="50"><?= $data->description ?></textarea>


		<div class="grid-50" style="margin-right: 0px;" align="center">

			<label><?=_('Picture')?></label>
			<!-- Place holder for input type file might be useless -->
			<label class="file-label" >
				<input class="file-input" type="file" placeholder="<?=_('Picture')?>" name="recipePicture">
			</label>
			<input class="submit-inv" type="submit" value="<?=_('Add Recipe')?>" name="action"> 

			<a class="btn-general" href="/Recipe/details/<?=$data->recipe_id?>" role="button" ><?= _('Back') ?></a>
		</div>
	 
	</form>

</div>
<?php $this->view('shared/footer'); ?>