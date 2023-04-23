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
                                  <a href="/Message/index" id="opt1"><i class="fa fa-inbox"></i>Inbox</a>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="/Message/sent" id="opt1"><i class="fa fa-mail-forward"></i> Sent</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- END INBOX MENU -->

                        <!-- BEGIN INBOX CONTENT -->
                        <div class="col-md-9">
                            <div class="row">

                                <div style="padding-top: 50px;"></div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <div class="step1">
                                                <?php $this->view('Message/previewMessage', $data[1]); ?>
                                            </div>
                                        </tbody>
                                    </table>
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