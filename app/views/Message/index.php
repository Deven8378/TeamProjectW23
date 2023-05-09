<?php $this->view('shared/header', "Read your Messages"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">

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

<script>
    function toggleDiv(){
        const toggleTo2 = document.getElementById("toggle-to-sent");
        const toggleTo1 = document.getElementById("toggle-to-inbox");

        const div1 = document.getElementById("inbox");
        const div2 = document.getElementById("sent");

        const hide = el => el.style.setProperty("display", "none");
        const show = el => el.style.setProperty("display", "block");

        hide(div2);

        toggleTo2.addEventListener("click", () => {
        hide(div1);

        show(div2);
        });

        toggleTo1.addEventListener("click", () => {
        hide(div2);
        show(div1);
        });
    }
</script>

<div class="messages-container" style="">

    <div class="row-messages" style="" >

        <div class="col-navigation">
            <h2 ><i class="bi bi-inbox"></i> <?= _('Inbox') ?></h2>
            <a class="btn-general" href="/Message/sendMessage" role="button" >
                <i class="bi bi-pencil-square"></i> <?= _('New Message') ?>
            </a>
            <hr>

            <div class="folder-container">

                <!-- <div class="row-me"> -->
                    <!-- <div class="col"> -->
                        <h5><?= _('Folders') ?></h5>
                    <!-- </div> -->
                <!-- </div> -->

                <!-- <div class="row"> -->
                    <!-- <div class="col"> -->
                        <button id="toggle-to-inbox" class="btn-general" onclick="toggleDiv()">
                            <i class="bi bi-inbox"> <?= _('Inbox') ?></i>
                        </button>
                    <!-- </div> -->
                <!-- </div> -->

                <!-- <div class="row"> -->
                    <!-- <div class="col"> -->
                        <button id="toggle-to-sent" class="btn-general" onclick="toggleDiv()"><i class="bi bi-send"> <?= _('Sent') ?></i></button>
                    <!-- </div> -->
                <!-- </div> -->

            </div>
        </div>

        <div class="" style="flex: 0 0 auto;
        width: 83.33333333%;">
            <div class="row">
                <div style="padding-top: 50px;"></div> 

                <div id="inbox">
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
                                        </tr>
                                    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="sent" style="display: none;">
                    <div class="table-responsive">
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
    </div>
</div>

<?php $this->view('shared/footer') ?>