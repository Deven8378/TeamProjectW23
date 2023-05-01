
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
  <!-- <input class="dd-left" type="" name="status" value="<?= $data->status ?>"> -->
  <!-- <br> -->
    <select name="status" id="status" class="dropdownUserType">
      <!-- <option selected disabled><?= _('--Select a User Status--') ?></option> -->
      <?php
        if($data->status == "active"){
          echo "
            <option selected value='active' name='active'>" . _('Active') . "</option>
            <option value='inactive' name='inactive'>" . _('Inactive') .  "</option>
          ";
        }else{
          echo "
            <option  value='active' name='active'>" . _('Active') . "</option>
            <option selected value='inactive' name='inactive'>" . _('Inactive') . "</option>
          ";
        }
      ?>
      
    </select>

  <input class="" type="submit" name="editProfile" value="Upload Profile Change">
  
</form>