
<form action="/ITspecialist/editUser" method="post" action="" class="form1" >
        <h2>Modify User Account</h2>

        <dt class="dt-label " style="margin-top: 10px;"><?=_('ID')?></dt>
        <input class="dd-left" type="text" name="id" value="<?= $data->user_id?>" disabled>

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Username')?></dt>
        <input class="dd-left" type="text" name="username" value="<?= $data->username ?>">

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Modify Password')?></dt>
        <input class="dd-left" type="text" name="password" value="<?= $data->password_hash ?>">

        <dt class="dt-label" style="margin-top: 10px;"><?=_('Type of User:')?></dt>
        <select name="user_type" id="user_type"  class="dropdownUserType" style="">
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

        <input class="" type="submit" name="editUser" value="Upload Account Change">

</form>