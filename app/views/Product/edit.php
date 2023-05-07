<?php $this->view('shared/header', "Edit " . $data['0']->name); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class='common-container' align='center'>
	<p class="sign" align="center"><?=_('Edit')?> <?= $data['0']->name ?></p>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="input-inv" type="text" align="center" placeholder="<?= _('Name') ?>" name="name" value="<?= $data['0']->name ?>">

		<select name="category" id="status" class="dropdown-inv">
			<option selected disabled><?= _('--Select a Category--') ?></option>
			<?php
			foreach ($data['1'] as $category) { ?>
			 	<option value="<?=$category->category_id ?>"
			 		<?php if($category->category_id == $data[0]->category){ ?>
			 			selected="<?= $data[0]->category ?>"
			 		<?php } ?>>
			 		<?= $category->category_name ?>
			 	</option>
			<?php  } ?>
		</select>


		<textarea placeholder="<?= _('Description...') ?>" name="description" class="input-inv"><?= $data['0']->description ?></textarea>

		<div class="grid-50" style="margin-right: 0px;" align="center">
			<label><?= _('Description') ?></label>
			<!-- Place holder for input type file might be useless -->
			<label class="file-label" >
				<input class="file-input" type="file" name="productPicture" value="<?= $data['0']->picture ?>" placeholder="<?=_('Picture')?>" >
			</label>
				

			<input class="submit-inv" type="submit" align="" value="<?=_('Edit Product')?>" name="action"> 

			<a class="btn-general" href="/Product/productDetails/<?=$data['0']->product_id?>" role="button"><?= _('Back') ?></a>
		</div>
	 
	</form>

</div>

<?php $this->view('shared/footer'); ?>