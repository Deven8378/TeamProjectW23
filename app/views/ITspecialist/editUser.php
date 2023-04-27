
<form method="post" action="" class="form1" >
        <h2>Modify User Account</h2>

        <dt class="dt-label " style=""><?=_('ID')?></dt>
        <input class="dd-left" type="text" name="id" value="<?= $data->user_id?>" disabled>

        <dt class="dt-label"><?=_('Username')?></dt>
        <input class="dd-left" type="text" name="username" value="<?= $data->username ?>">

        <dt class="dt-label"><?=_('Modify Password')?></dt>
        <input class="dd-left" type="text" name="password" value="<?= $data->password_hash ?>">

        <input class="" type="submit" name="editUser" value="Upload Account Change">

</form>