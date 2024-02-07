function validateForm() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  removeErrorMessages();

  const errorMessages = [];

  if (email.length > 40) {
    errorMessages.push("L'email ne peut pas dépasser 40 caractères.");
  }

  if (password.length > 40) {
    errorMessages.push("Le password ne peut pas dépasser 40 caractères.");
  }

  // ... (ajoutez d'autres validations selon vos besoins)

  // Affichez les messages d'erreur dans le DOM
  displayErrorMessages(errorMessages);

  // Retourne false si des erreurs sont présentes, sinon true
  return errorMessages.length === 0;
}

function removeErrorMessages() {
  const errorElements = document.querySelectorAll(".error-message");
  errorElements.forEach((element) => element.remove());
}

function displayErrorMessages(messages) {
  const form = document.querySelector(".form-group");

  messages.forEach((message) => {
    const errorMessage = document.createElement("div");
    errorMessage.className = "error-message";
    errorMessage.textContent = message;

    form.appendChild(errorMessage);
  });
}

document
  .querySelector(".login__form")
  .addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
