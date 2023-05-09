<form action="/ITspecialist/editUser/<?= $data->user_id?>" method="post" action="" class="form1" >
        <h2><?= _('Modify User Account') ?></h2>

        <dt class="dt-label" style="margin-top: 10px;"><?=_('ID')?></dt>
        <input class="dd-left" type="text" name="id" value="<?= $data->user_id?>" disabled>

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Username')?></dt>
        <input class="dd-left" type="text" name="username" value="<?= $data->username ?>" placeholder="<?= _('Username') ?>">

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Modify Password')?></dt>
        <input class="dd-left" type="text" name="password" placeholder="<?= _('Password') ?>">

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Type of User:')?></dt>
        <select name="user_type" id="user_type"  class="dropdownUserType">
                <?php
                        if($data->user_type == "admin"){
                                echo "
                                        <option selected value='admin' name='admin'>" .  _('Admin') . "</option>
                                        <option value='employee' name='employee'>" ._('Employee') . "</option>
                                ";
                        }else{
                                echo "
                                        <option value='admin' name='admin'>" .  _('Admin') . "</option>
                                        <option selected value='employee' name='employee'>" ._('Employee') . "</option>
                                ";
                        }
                ?>
        </select>

        <input class="btn-general" type="submit" name="editUser" value="<?= _('Upload Account Change') ?>">

</form>