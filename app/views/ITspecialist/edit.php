<?php $this->view('shared/header','Edit Profile'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="userDetails">
    <div class="col-4">
        <a href="/ITspecialist/userDetails/<?= $data->user_id ?>" type="submit" class="btn-userDetails"><?=_('Back')?></a>
    </div>   
      <!-- <input type="submit" id="option" onclick="myFunction()" value="Edit Account"> -->

    <div class="alert" style="background-color: rgb(216,212,212);">
      <h3><?= $data->username ?> <?= $data->user_id ?></h3>
    </div>

    <div>
      <!-- 
      background-color: #EA4C89;
      border-radius: 8px;
      border-style: none;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      display: inline-block;
      
      font-size: 14px;
      font-weight: 500;
      height: 40px;
      line-height: 20px;
      list-style: none;
      margin: 0;
      outline: none;
      padding: 10px 16px;
      position: relative;
      text-align: center;
      text-decoration: none;
      transition: color 100ms;
      vertical-align: baseline;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation; 
      -->
      <button id="toggle-to-account" class="btn-edit" style="" >View Profile Information</button>
      <button id="toggle-to-profile" class="btn-edit" style="">View Account Information</button>
    </div>

    <dl class="dl-viewUserDetails" style="">

    <!-- Left side -->
    <div class="" style="flex: 70%; " >

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
  // function myFunction() {
  //  var mainFrameOne = document.getElementById("profile"); 
  //  var mainFrameTwo = document.getElementById("user");
  //  var buttonName = document.getElementById("option");

  //  mainFrameOne.style.display = (
  //      mainFrameOne.style.display == "none" ? "block" : "none"); 
  //  mainFrameTwo.style.display = (
  //      mainFrameTwo.style.display == "none" ? "block" : "none"); 
   
  //  if (buttonName.value=="Edit Profile"){
  //     buttonName.value = "Edit Account";
  //   }else{ 
  //     buttonName.value = "Edit Profile";
  //   }
  // }
  const toggleTo2 = document.getElementById("toggle-to-profile");
  const toggleTo1 = document.getElementById("toggle-to-account");

  const div1 = document.getElementById("profile");
  const div2 = document.getElementById("user");

  const hide = el => el.style.setProperty("display", "none");
  const show = el => el.style.setProperty("display", "block");

  hide(div2);
  // hide(toggleTo1);

  toggleTo2.addEventListener("click", () => {
    hide(div1);

    show(div2);
  });

  toggleTo1.addEventListener("click", () => {
    hide(div2);
    // hide(toggleTo1);
    // show(toggleTo2);
    show(div1);
  });
</script>
     
<?php $this->view('shared/footer'); ?>