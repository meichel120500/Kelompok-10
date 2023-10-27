const hamburgerMenu = document.getElementById("hamburger-menu");
const sidebar = document.getElementsByClassName("sidebar")[0];

// hamburger menu trigger
hamburgerMenu.addEventListener("click", function () {
    sidebar.classList.toggle("hide");
    console.log("ok");
});

// dropdown akun
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

// dropdown transaksi
const dropdown2 = document.getElementById("dropdown-trigger2");
const itemDropdownTrans = document.getElementById("item-dropdown-topup");
const itemDropdownTrans2 = document.getElementById("item-dropdown-konvertuang");
const itemDropdownTrans3 = document.getElementById("item-dropdown-payment");
const itemDropdownTrans4 = document.getElementById(
    "item-dropdown-historitrans"
);

dropdown2.addEventListener("click", function () {
    if (itemDropdownTrans.style.display === "none") {
        itemDropdownTrans.style.display = "block";
        itemDropdownTrans2.style.display = "block";
        itemDropdownTrans3.style.display = "block";
        itemDropdownTrans4.style.display = "block";
    } else {
        itemDropdownTrans.style.display = "none";
        itemDropdownTrans2.style.display = "none";
        itemDropdownTrans3.style.display = "none";
        itemDropdownTrans4.style.display = "none";
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
