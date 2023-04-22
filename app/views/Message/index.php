<?php $this->view('shared/header', "Read your Messages"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<h1>Messages</h1>

<div class="messages_split">
    <!-- Left content -->
    <div class="inbox_side">
    	<h1>inbox</h1>
    </div>

    <!-- Right content -->
    <div class="messages_side">
    	<h2 id="home_header"><?= _('Welcome back Sweemory Team!') ?></h2><br><br>
    </div>
</div>