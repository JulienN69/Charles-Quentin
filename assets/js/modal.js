let modal = null;
const target = document.getElementById("modal");

const openModal = (e) => {
  e.preventDefault();
  target.style.display = null;
  target.removeAttribute("aria-hidden");
  target.setAttribute("aria-modal", "true");
  modal = target;
  document
    .querySelector(".js-modal-close")
    .addEventListener("click", closeModal);
};

const closeModal = (e) => {
  if (modal === null) return;
  e.preventDefault();
  target.style.display = "none";
  target.setAttribute("aria-hidden", "true");
  target.removeAttribute("aria-modal");
  modal.removeEventListener("click", closeModal);
  modal
    .querySelector("js-modal-close")
    .removeEventListener("click", closeModal);
  modal = null;
};

document.querySelectorAll(".js-modal").forEach((a) => {
  a.addEventListener("click", openModal);
});
