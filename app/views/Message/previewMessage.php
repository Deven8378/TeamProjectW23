<?php foreach ($data as $message) { ?>
    <tr>
        <td class="name"><?= $message->sender_fname ?> <?= $message->sender_fname ?></td>
        <td class="subject"><?= $message->message ?></a>
        <td class="time"><?= $message->timestamp ?></td>
    </tr>
<?php } ?>