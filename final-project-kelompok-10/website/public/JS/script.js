const hamburgerMenu = document.getElementById("hamburger-menu");
const sidebar = document.getElementsByClassName("sidebar")[0];

// hamburger menu trigger
hamburgerMenu.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
  console.log("ok");
});

// dropdown trigger
const dropdown = document.getElementById("dropdown-trigger");
const itemDropdown = document.getElementById("item-dropdown1");
const itemDropdown2 = document.getElementById("item-dropdown2");

dropdown.addEventListener("click", function () {
  if (itemDropdown.style.display === "none") {
    itemDropdown.style.display = "block";
    itemDropdown2.style.display = "block";
  } else {
    itemDropdown.style.display = "none";
    itemDropdown2.style.display = "none";
  }
});

// photo profile
const imgDiv = document.querySelector(".user-img");
const img = document.querySelector("#photo");
const file = document.querySelector("#file");
const uploadbtn = document.querySelector("#uploadbtn");

file.addEventListener("change", function () {
  const chosedfile = this.files[0];
  if (chosedfile) {
    const reader = new FileReader();

    reader.addEventListener("load", function () {
      img.setAttribute("src", reader.result);
    });
    reader.readAsDataURL(chosedfile);
  }
});
