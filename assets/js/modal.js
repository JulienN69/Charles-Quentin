let modal = null;
const target = document.getElementById("modal");
let openingLink = null;

const openModal = (e) => {
  //annulation de la fonction click
  e.preventDefault();

  //modification des styles
  target.style.display = null;
  target.removeAttribute("aria-hidden");
  target.setAttribute("aria-modal", "true");
  modal = target;

  //on stock le lien <a> courant
  openingLink = e.currentTarget;

  //fermeture de la modal
  const modalClose = document.querySelector(".js-modal-close");
  modalClose.addEventListener("click", closeModal);

  //validation de la modal, et déclenchement du click initial
  const validateModal = document.querySelector(".js-modal-validate");
  validateModal.addEventListener("click", () => {
    if (openingLink) {
      openingLink.removeEventListener("click", openModal);
      openingLink.click();
    }
    closeModal();
  });
};

const closeModal = (e) => {
  if (modal === null) return;
  if (e) e.preventDefault(); // Vérifie si e est défini avant d'appeler preventDefault()
  target.style.display = "none";
  target.setAttribute("aria-hidden", "true");
  target.removeAttribute("aria-modal");
  modal.removeEventListener("click", closeModal);
  modal = null;
};

document.querySelectorAll(".js-modal").forEach((a) => {
  a.addEventListener("click", openModal);
});
