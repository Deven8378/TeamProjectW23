
<form method="post" action="" class="form1" style="" >
  <h2>Modify Profile</h2>
  <dt class="dt-label"> <?= _('First Name')?> </dt>
  <input class="dd-left" type="" name="first_name" value="<?= $data->first_name ?>">

  <dt class="dt-label"><?=_('Middle Name')?></dt>
  <input class="dd-left" type="" name="middle_name" value="<?= $data->middle_name ?>">

  <dt class="dt-label"><?=_('Last Name')?></dt>
  <input class="dd-left" type="" name="last_name" value="<?= $data->last_name ?>">

  <dt class="dt-label"><?=_('Email')?></dt>
  <input class="dd-left" type="" name="email" value="<?= $data->email ?>">

  <dt class="dt-label"><?=_('Phone Number')?></dt>
  <input class="dd-left" type="" name="phone_number" value="<?= $data->phone_number ?>">

  <dt class="dt-label"><?=_('Status')?></dt>
  <input class="dd-left" type="" name="status" value="<?= $data->status ?>">
  <br>
  <input class="" type="submit" name="editProfile" value="Upload Profile Change">
  
</form>