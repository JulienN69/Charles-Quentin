// ------------------- Récupération des éléments du DOM --------------------

const categories = document.querySelectorAll(".gallery-nav__a");
const galleryPhotoContainer = document.querySelector(".gallery-photo");

const baseImageURLs = {
  1: "assets/images/mariage/",
  2: "assets/images/bébé/",
  3: "assets/images/grossesse/",
  4: "assets/images/famille/",
  5: "assets/images/bapteme/",
  6: "assets/images/couple/",
};

// ----------- Fonction d'écoute du click ------------

categories.forEach((category) => {
  category.addEventListener("click", async (e) => {
    e.preventDefault();
    const categoryId = category.dataset.categoryId;
    console.log(categoryId);
    const photos = await loadPhotos(categoryId);
    displayPhotos(photos, categoryId);
  });
});

// ---------- appel AJAX pour récupérer les photos -----------

const loadPhotos = async (categoryId) => {
  try {
    const response = await fetch(
      `?controller=gallery&action=read&category=${categoryId}`
    );
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    const photos = await response.json();
    console.log(photos);
    return photos;
  } catch (error) {
    console.log(error);
    return [];
  }
};

// ------------ fonction d'affichage des photos -------------

const displayPhotos = (photos, categoryId) => {
  const photosList = document.querySelectorAll(".gallery-photo__container");
  photosList.forEach((photo) => photo.remove());
  // galleryPhotoContainer.innerHTML = "";
  photos.forEach((photo) => {
    const baseImageURL = baseImageURLs[categoryId];
    const container = document.createElement("div");
    container.classList.add("gallery-photo__container");

    const imgElement = document.createElement("img");
    imgElement.src = `${baseImageURL}${photo.name}`;
    imgElement.alt = "image";
    imgElement.classList.add("gallery-photo__img");

    container.appendChild(imgElement);
    galleryPhotoContainer.appendChild(container);
  });
};
