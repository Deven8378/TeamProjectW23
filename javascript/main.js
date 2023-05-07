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