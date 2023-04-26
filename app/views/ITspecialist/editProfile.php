
<form method="post" action="" class="form1" style="" >
  <h2>Modify Profile</h2>
  <dt class="dt-label"> <?= _('First Name')?> </dt>
  <input class="dd-left" type="" name="" value="<?= $data->first_name ?>">

  <dt class="dt-label"><?=_('Middle Name')?></dt>
  <input class="dd-left" type="" name="" value="<?= $data->middle_name ?>">
  <!-- <dd class="dd-left"><?= $data->middle_name ?></dd> -->

  <dt class="dt-label"><?=_('Last Name')?></dt>
  <input class="dd-left" type="" name="" value="<?= $data->last_name ?>">
  <!-- <dd class="dd-left"><?= $data->last_name ?></dd> -->

  <dt class="dt-label"><?=_('Email')?></dt>
  <input class="dd-left" type="" name="" value="<?= $data->email ?>">
  <!-- <dd class="dd-left"><?= $data->email?></dd> -->

  <dt class="dt-label"><?=_('Phone Number')?></dt>
  <input class="dd-left" type="" name="" value="<?= $data->phone_number ?>">
  <!-- <dd class="dd-left"><?= $data->phone_number ?></dd> -->

  <dt class="dt-label"><?=_('Status')?></dt>
  <input class="dd-left" type="" name="" value="<?= $data->status ?>">
  <!-- <dd  class="dd-left"><?= $data->status ?></dd>      -->
  <input class="" type="submit" name="" value="Upload Change">
</form>