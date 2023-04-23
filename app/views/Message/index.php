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
                            <a class="btn" href="#divOne" role="button" style="background-color: #e8c8e7;"><?= _('New Message') ?></a>

                            <hr>

                            <div class="container">
                              <div class="row">
                                <div class="col">
                                  <h5>Folders</h5>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="/Message/index"><i class="fa fa-inbox"></i>Inbox</a>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="#"><i class="fa fa-mail-forward"></i> Sent</a>
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
                                            <?php $this->view('Message/previewMessage'); ?>
                                            <?php $this->view('Message/previewMessage'); ?>
                                            <?php $this->view('Message/previewMessage'); ?>
                                            <?php $this->view('Message/previewMessage'); ?>
                                            <?php $this->view('Message/previewMessage'); ?>
                                            <?php $this->view('Message/previewMessage'); ?>
                                        </tbody>
                                    </table>
                                </div>                      
                            </div>
                            <!-- END INBOX CONTENT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INBOX -->
        </div>
    </div>
</div>

<div class="overlay" id="divOne">
    <div class="wrapper">
        <h2>Send a new Message</h2><a class="close" href="#">&times;</a>
        <div class="content">
            <div class="container">
                <form>
                    <label>To</label>
                    <input placeholder="Your name.." type="text">
                    <label>Message</label> 
                    <textarea placeholder="Write something.."></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>