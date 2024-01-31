
function toggleMenu() {
  const menu = document.getElementById("menu");
  const menuBtn = document.querySelector(".menu-hamb");

  if (menu.style.transform === "scaleY(1)") {
    menu.style.transform = "scaleY(0)";
    menuBtn.classList.remove("open");
  } else {
    menu.style.transform = "scaleY(1)";
    menuBtn.classList.add("open");
  }
}

