<?php $this->view('shared/header', "Read your Messages"); ?>
<?php $this->view('shared/navigation/nav'); ?>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" style="padding-top: 50px;">
    <div class="row">
        <!-- BEGIN INBOX -->
        <div class="col-md-12">
            <div class="grid email">
                <div class="grid-body">
                    <div class="row">
                        <!-- BEGIN INBOX MENU -->
                        <div class="col-md-3">
                            <h2 class="grid-title"><i class="fa fa-inbox"></i> Inbox</h2>
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
                                    <a class="glyphicon glyphicon-cutlery" onclick="fixScroll('inboxHTML');"><i class="fa fa-inbox"> Inbox</i></a>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                    <a class="glyphicon glyphicon-cutlery" onclick="fixScroll('sentMessagesHTML');"><i class="fa fa-mail-forward"> Sent</i></a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- END INBOX MENU -->

                        <!-- BEGIN INBOX CONTENT -->
                        <div class="col-md-9">
                            <div class="row">
                                <div style="padding-top: 50px;"></div>

                                <div id="inboxOrSentMessages"></div> 

                                <div id="container" style="width:100%; height:150px;">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php foreach ($data[0] as $message) { ?>
                                                    <tr>
                                                        <td class="name"><?= $message->sender_fname ?> <?= $message->sender_fname  ?></td>
                                                        <td class="subject"><?= $message->message ?></td>
                                                        <td class="time"><?= $message->timestamp ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="inboxHTML"  style="display: none; height:20px;">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php foreach ($data[0] as $message) { ?>
                                                    <tr>
                                                        <td class="name"><?= $message->sender_fname ?> <?= $message->sender_fname  ?></td>
                                                        <td class="subject"><?= $message->message ?></td>
                                                        <td class="time"><?= $message->timestamp ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="sentMessagesHTML"  style="display: none; height:20px;"><div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php foreach ($data[1] as $message) { ?>
                                                    <tr>
                                                        <td class="name"><?= $message->sender_fname ?> <?= $message->sender_fname  ?></td>
                                                        <td class="subject"><?= $message->message ?></td>
                                                        <td class="time"><?= $message->timestamp ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                 
                            </div>
                            <!-- END INBOX CONTENT -->
                        </div>

                        <div class="overlay" id="sendMessage">
                            <div class="wrapper">
                                <h2>Send a new Message</h2><a class="close" href="/Message/index">&times;</a>
                                <div class="content">
                                    <div class="container">
                                        <form  method="post" action="">
                                            <label>To</label>
                                            <input placeholder="Recipient" type="text" name="receiver" id="messageInput">
                                            <label>Message</label> 
                                            <textarea placeholder="Write something..." name="message" id="messageInput"></textarea>
                                            <input class="btn" type="submit" name="action" value='Send' style="background-color: #e8c8e7;" id="messageSubmit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END INBOX -->
        </div>
    </div>
</div>