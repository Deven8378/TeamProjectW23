
<form method="post" action="" class="form1" style="" >
        <h2>Modify User Account</h2>

        <dt class="dt-label " style=""><?=_('ID')?></dt>
        <input class="dd-left" type="" name="" value="<?= $data->user_id?>">
        <!-- <dd class="dd-left" style=""><?= $data->user_id ?></dd> -->

        <dt class="dt-label"><?=_('Username')?></dt>
        <input class="dd-left" type="" name="" value="<?= $data->username ?>">
        <!-- <dd class="dd-left"><?= $data->username?></dd> -->

        <dt class="dt-label"><?=_('Modify Password')?></dt>
        <input class="dd-left" type="" name="" value="<?= $data->password_hash ?>">
        <input class="" type="submit" name="" value="Upload Change">
</form>