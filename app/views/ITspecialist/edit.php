<?php $this->view('shared/header', _('Edit Profile')); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="userDetails">
    <div class="col-4">
        <a href="/ITspecialist/userDetails/<?=$data->user_id?>" id="backLink" class="btn-general">
          <i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
    </div>   

    <div class="alert" style="background-color: rgb(216,212,212);">
      <h3><?= $data->username ?> <?= $data->user_id ?></h3>
    </div>

    <div>
      <button id="toggle-to-account" class="btn-general" onclick="toggleUserDiv()"><?= _('View Profile Information') ?></button>
      <button id="toggle-to-profile" class="btn-general" onclick="toggleUserDiv()"><?= _('View Account Information') ?></button>
    </div>

    <dl class="dl-viewUserDetails">

    <!-- Left side -->
    <div class="" style="" >

      <div id="profile">
        <?php $this->view('ITspecialist/editProfile', $data); ?> 
      </div>

      <div id="user" style="display:none;">
        <?php $this->view('ITspecialist/editUser', $data); ?>
        
      </div>
      
    </div>

  </dl>

</div>


<script>

function toggleUserDiv() {
  const toggleTo2 = document.getElementById("toggle-to-profile");
  const toggleTo1 = document.getElementById("toggle-to-account");

  const div1 = document.getElementById("profile");
  const div2 = document.getElementById("user");

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
     
<?php $this->view('shared/footer'); ?>