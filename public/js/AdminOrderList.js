(function () {
  var button = document.querySelector("#menu_toggle");
  var sidebar = document.querySelector(".sidebar");
  var main_content = document.querySelector(".main-content");

  button.addEventListener("click", function () {
    sidebar.classList.toggle("sidebar_active");
    main_content.classList.toggle("main-content_collapse");
  });

  var notifi = document.querySelector(".notifi");
  var user_info = document.querySelector(".user-info");
  var notifications = document.querySelector(".notifications");
  var account_drop = document.querySelector(".account-drop");

  notifi.addEventListener("click", function () {
    notifications.classList.toggle("notifications_active");
    account_drop.classList.remove("account-drop_active");
  });

  user_info.addEventListener("click", function () {
    account_drop.classList.toggle("account-drop_active");
    notifications.classList.remove("notifications_active");
  });
})();

var main_menu = document.getElementsByClassName("menu-main");
var i;

for (i = 0; i < main_menu.length; i++) {
  main_menu[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var sub_menu = this.nextElementSibling;
    if (sub_menu.style.maxHeight) {
      sub_menu.style.maxHeight = null;
    } else {
      sub_menu.style.maxHeight = sub_menu.scrollHeight + "px";
    }
  });
}

const optionMenu = document.querySelector(".select-menu"),
  selectBtn = optionMenu.querySelector(".select-btn"),
  options = optionMenu.querySelectorAll(".option"),
  sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () =>
  optionMenu.classList.toggle("active")
);
options.forEach((option) => {
  option.addEventListener("click", () => {
    let selectedOption = option.querySelector(".option-text").innerText;
    sBtn_text.innerText = selectedOption;
    optionMenu.classList.remove("active");
  });
});

function action_fun_one() {
  const action_btn = document.getElementById("action_btn_one");
  action_btn.classList.toggle("active");
}
function action_fun_two() {
  const action_btn = document.getElementById("action_btn_two");
  action_btn.classList.toggle("active");
}
