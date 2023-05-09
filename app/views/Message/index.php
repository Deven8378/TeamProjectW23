<?php $this->view('shared/header', _('Read your Messages')); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">


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

<div class="messages-container" style="font-size: clamp(0.75rem, 0.6538rem + 0.4103vw, 1rem);">

    <div class="row-messages">

        <div class="col-navigation">
            <h2 ><i class="bi bi-inbox"></i> <?= _('Inbox') ?></h2>
            <a class="btn-general btn-5" href="/Message/sendMessage" role="button" >
                <i class="bi bi-pencil-square"></i> <?= _('New Message') ?>
            </a>
            <hr class="btn-5">

            <div class="folder-container">

                <h5><?= _('Folders') ?></h5>

                <button id="toggle-to-inbox" class="btn-general" onclick="toggleDiv()">
                    <i class="bi bi-inbox"></i> <?= _('Inbox') ?>
                </button>

                <button id="toggle-to-sent" class="btn-general" onclick="toggleDiv()"><i class="bi bi-send"></i> <?= _('Sent') ?></button>

            </div>
        </div>

        <div class="col-messages">
            <div class="row" style="margin-top: 50px;">

                <div id="inbox">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"><?= _('FROM') ?></th>
                                <th scope="col"><?= _('MESSAGE') ?></th>
                                <th scope="col"><?= _('TIME') ?></th>
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