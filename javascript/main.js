function toggleMessageDiv(){
  const toggleTo2 = document.getElementById("toggle-to-inbox");
  const toggleTo1 = document.getElementById("toggle-to-sent");

  const div1 = document.getElementById("sent");
  const div2 = document.getElementById("inbox");

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

function getValueUsingID() {
  var selectBox = document.getElementById("selectBox");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;

  var getID = document.getElementById(selectedValue).innerHTML;

  document.getElementById("editing").setAttribute("value", getID);
}

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

function deleteIngredientLinkID(linkID){
    // var selectLink = document.getElementById(linkID);
  var setLinkInDelete = document.getElementById('deleteQuantity');
  setLinkInDelete.href = "/Product/deleteQuantity/" + linkID;
}