
<form action="/ITspecialist/editProfile/<?= $data->user_id?>" method="post" action="" class="form1">
  <h2><?= _('Modify Profile') ?></h2>
  <dl class="dl-viewUserDetails">
    <div style="flex:  50%; " >
      <dt class="dt-label"> <?= _('First Name')?> </dt>
      <input class="dd-right" style="width: 100%;" type="text" name="first_name" value="<?= $data->first_name ?>" placeholder="<?= _('First Name') ?>">

      <dt class="dt-label"><?=_('Middle Name')?></dt>
      <input class="dd-right" style="width: 100%;" type="text" name="middle_name" value="<?= $data->middle_name ?>" placeholder="<?= _('Middle Name') ?>">

      <dt class="dt-label"><?=_('Last Name')?></dt>
      <input class="dd-right" style="width: 100%;" type="text" name="last_name" value="<?= $data->last_name ?>" placeholder="<?= _('Last Name') ?>">
    </div>
    <div style="flex: 50%;" >
      <dt class="dt-label"><?=_('Email')?></dt>
      <input class="dd-right" style="width: 100%;" type="email" name="email" value="<?= $data->email ?>" placeholder="<?= _('Email') ?>">

      <dt class="dt-label"><?=_('Phone Number')?></dt>
      <input class="dd-right" style="width: 100%;" type="tel" pattern="[0-9]{10}" name="phone_number" value="<?= $data->phone_number ?>" placeholder="<?= _('Phone Number') ?>">

      <dt class="dt-label"><?=_('Status')?></dt>

      <select style="width: 100%;" name="status" id="status" class="dropdownUserType">
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
    </div>
   
  </dl> 
  <input class="btn-general" type="submit" name="editProfile" value="<?= _('Upload Profile Change') ?>">
</form>