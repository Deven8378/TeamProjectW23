<?php $this->view('shared/header', "Read your Messages"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<div id="messagesDiv">
    <h1 id="message_heading">Messages</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="leftside" id="inbox_side">
                <a class="btn" href="Recipes/index" role="button" style="background-color: #e8c8e7;"><?= _('Compose a Message') ?></a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="rightside" id="messages_side">
            ...rightside content here...
            </div>
        </div>
    </div>
</div>

