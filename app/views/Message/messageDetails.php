<?php $this->view('shared/header', _('Read your Message')); ?>
<?php $this->view('shared/navigation/nav'); ?>



<div style="padding-left: 100px; margin-top: 50px;">
	<a href="/Message/index" class="btn-general" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
</div>

<div class="centeringPage">
	<div class="wrapping" style="margin: 25px;">
		<?php if($data->receiver == $_SESSION['user_id']) {?>
			<a class="btn-general" href='#popupMessage' id="<?= $data->message_id ?>" onclick="deleteMessageLinkID(this.id)">
				<i class="bi bi-x"></i>
				<?= _('Delete') ?>
			</a>
		<?php } ?>

		<p style="font-weight: bold;"><?=_('From:')?> <?= $data->sender_full_name ?></p>	
		<p style="font-weight: bold;"><?=_('To:')?> <?= $data->receiver_full_name ?></p>
		<p style="font-size: 12px;"><?= $data->timestamp ?></p>
		<p style="word-wrap: break-word;"><?= $data->message ?></p>

	</div>
</div>

<!-- CONFIMATION MESSAGE TO DELETE MESSAGE -->
<div class="overlay" id="popupMessage">
  <div class="wrapper">
      <div class="wrapper-confirmation"><?= _('Confirmation') ?></div><a class="close" href="/Message/messageDetails/<?= $data->message_id ?>">&times;</a>
      <!-- <div class="content"> -->
          <div class="container">
              <form  method="post" action="">
                    <label class="wrapper-message"><?=_('Do you want to delete this message?')?></label>
                    <div align="center">
                      <a href="/Message/messageDetails/<?= $data->message_id ?>" class="btn-general"><?=_('Cancel')?></a>
                      <!-- getting href from deleteLinkID javascript function -->
                      <a id="deleteMessage" href="" class="btn-general"><?=_('Confirm')?></a>
                </div>
              </form>
          </div>
      <!-- </div> -->
  </div>
</div>

<script type="text/javascript">
  
  function deleteMessageLinkID(linkID){
    // var selectLink = document.getElementById(linkID);
    var setLinkInDelete = document.getElementById('deleteMessage');
    setLinkInDelete.href = "/Message/delete/" + linkID;
  }

</script>

<?php $this->view('shared/footer') ?>