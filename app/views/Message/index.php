<?php $this->view('shared/header', "Read your Messages"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">
    .overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.8);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.wrapper {
  margin: 70px auto;
  padding: 20px;
  background: #e7e7e7;
  border-radius: 5px;
  width: 40%;
  position: relative;
  transition: all 5s ease-in-out;
}

.wrapper h2 {
  margin-top: 0;
  color: #333;
}

.wrapper .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.wrapper .close:hover {
  color: #06D85F;
}

.wrapper .content {
  max-height: 30%;
  overflow: auto;
}

.container {
  border-radius: 5px;
  padding: 20px 0;
}
form label {
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 3px;
}
#messageInput {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
#messageSubmit {
  background-color: #413b3b;
  color: #fff;
  padding: 15px 50px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  font-size: 15px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.overflowing {
margin: 5px 0;
padding: 1%;
width: 200pxpx;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
}

.detailsLink {
    text-decoration: none;
    color: black;
}
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" style="padding-top: 50px;">
    <div class="row">
        <!-- BEGIN INBOX -->
        <div class="col-md-12">
            <div class="row">
                <!-- BEGIN INBOX MENU -->
                <div class="col-md-3">
                    <h2 class="grid-title"><i class="fa fa-inbox"></i> <?= _('Inbox') ?></h2>
                        <a class="btn" href="#sendMessage" role="button" style="background-color: #e8c8e7;"><?= _('New Message') ?></a>
                    <hr>

                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <h5>Folders</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <a class="glyphicon glyphicon-cutlery" onclick="fixScroll('inboxHTML');"><i class="fa fa-inbox"> <?= _('Inbox') ?></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <a class="glyphicon glyphicon-cutlery" onclick="fixScroll('sentMessagesHTML');"><i class="fa fa-mail-forward"> <?= _('Sent') ?></i></a>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div style="padding-top: 50px;"></div>

                        <div id="inboxOrSentMessages"></div> 

                        <div id="container" style="width:100%; height:150px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col"><?= _('FROM') ?></th>
                                        <th scope="col"><?= _('MESSAGE') ?></th>
                                        <th scope="col"><?= _('TIME') ?></th>
                                        <!-- <th scope="col"></th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data[0] as $message) { ?>
                                            
                                                <tr>
                                                    <td class="name">
                                                        <a class="detailsLink" href="/Message/messageDetails/<?= $message->message_id ?>">
                                                            <?= htmlentities($message->sender_full_name) ?>
                                                        </a>
                                                    </td>
                                                    <td class="subject">
                                                        <div class="overflowing">
                                                            <?= htmlentities($message->message) ?>
                                                        </div>
                                                    </td>
                                                    <td class="time"><?= htmlentities($message->timestamp) ?></td>
    <!--                                                 <td>
                                                        <a id="deleteMessage" href='/Message/delete/<?= htmlentities($message->message_id) ?>'>
                                                            <i class="bi bi-x"></i>
                                                        </a>
                                                    </td> -->
                                                </tr>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="inboxHTML"  style="display: none; height:20px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col"><?= _('FROM') ?></th>
                                        <th scope="col"><?= _('MESSAGE') ?></th>
                                        <th scope="col"><?= _('TIME') ?></th>
                                        <!-- <th scope="col"></th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data[0] as $message) { ?>
                                            <a href="/Message/messageDetails/<?= $message->message_id ?>">
                                                <tr>
                                                    <td class="name">
                                                        <a class="detailsLink" href="/Message/messageDetails/<?= $message->message_id ?>">
                                                            <?= htmlentities($message->sender_full_name) ?>
                                                        </a>
                                                    </td>
                                                    <td class="subject">
                                                        <div class="overflowing">
                                                            <?= htmlentities($message->message) ?>
                                                        </div>
                                                    </td>
                                                    <td class="time"><?= htmlentities($message->timestamp) ?></td>
    <!--                                                 <td>
                                                        <a name="<?= htmlentities($message->message_id) ?>" href='/Message/delete/<?= htmlentities($message->message_id) ?>'>
                                                            <i class="bi bi-x"></i>
                                                        </a>
                                                    </td> -->
                                                </tr>
                                            </a>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="sentMessagesHTML"  style="display: none; height:20px;"><div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?= _('TO') ?></th>
                                            <th scope="col"><?= _('MESSAGE') ?></th>
                                            <th scope="col"><?= _('TIME') ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data[1] as $message) { ?>
                                            
                                            <tr>
                                                
                                                    <td class="name">
                                                        <a class="detailsLink" href="/Message/messageDetails/<?= $message->message_id ?>">
                                                            <?= htmlentities($message->receiver_full_name) ?>
                                                        </a>
                                                    </td>
                                                    <td class="subject">
                                                        <div class="overflowing">
                                                            <?= htmlentities($message->message) ?>
                                                        </div>
                                                    </td>
                                                    <td class="time"><?= htmlentities($message->timestamp) ?></td>

                                            </tr>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                 
                    </div>
                </div>

                <div class="overlay" id="sendMessage">
                    <div class="wrapper">
                        <h2><?= _('Send a new message') ?></h2><a class="close" href="/Message/index">&times;</a>
                        <div class="content">
                            <div class="container">
                                <form  method="post" action="">
                                    <label><?= _('To') ?></label>
                                    <input placeholder="<?= _('Recipient') ?>" type="text" name="receiver" id="messageInput">
                                    <label><?= _('Message') ?></label> 
                                    <textarea placeholder="<?= _('Write something...') ?>" name="message" id="messageInput"></textarea>
                                    <input class="btn" type="submit" name="action" value='<?= _('Send') ?>' style="background-color: #e8c8e7;" id="messageSubmit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('shared/footer') ?>