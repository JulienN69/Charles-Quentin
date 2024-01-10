// code js pour l'animation du slider de la page gallery

document.addEventListener("DOMContentLoaded", function () {
  // récupération des éléments du DOM

  const galleryPhotos = document.querySelector(".gallery-photo");
  const arrowBtnLeft = document.querySelector(".arrow-js-left");
  const arrowBtnRight = document.querySelector(".arrow-js-right");

  // variables utiles

  let cumulativeTranslation = 0;
  let isAnimating = false;
  let compteur = 0;
  const numberOfChildren = galleryPhotos.childElementCount;
  let leftButtonEnabled = true;
  let rightButtonEnabled = true;

  // Cloner et ajouter les 3 premiers enfants d'une catégorie

  let firstImage = galleryPhotos.firstElementChild.cloneNode(true);
  galleryPhotos.appendChild(firstImage);
  let secondChild = galleryPhotos.children[1].cloneNode(true);
  let thirdChild = galleryPhotos.children[2].cloneNode(true);
  galleryPhotos.appendChild(secondChild);
  galleryPhotos.appendChild(thirdChild);

  const handleAnimationEnd = () => {
    isAnimating = false;
    galleryPhotos.removeEventListener("transitionend", handleAnimationEnd);
    // Réinitialiser le style une fois que l'animation est terminée
    if (compteur == numberOfChildren) {
      setTimeout(() => {
        galleryPhotos.style.transition = "unset";
        galleryPhotos.style.transform = `translateX(0)`;
        compteur = 0; // Réinitialiser le compteur
        cumulativeTranslation = 0;
        leftButtonEnabled = true;
        rightButtonEnabled = true;
      }, 400);
    } else {
      // Réappliquer la transition pour la prochaine animation
      galleryPhotos.style.transition = "transform 0.4s ease-out";
      leftButtonEnabled = true;
      rightButtonEnabled = true;
    }
  };

  arrowBtnRight.addEventListener("click", () => {
    if (!isAnimating && rightButtonEnabled) {
      cumulativeTranslation += 33;
      compteur -= 1;
      console.log(compteur);

      isAnimating = true;
      rightButtonEnabled = false;
      galleryPhotos.style.transition = "transform 0.4s ease-out";
      galleryPhotos.style.transform = `translateX(${cumulativeTranslation}%)`;
      galleryPhotos.addEventListener("transitionend", handleAnimationEnd);
    }
  });

  arrowBtnLeft.addEventListener("click", () => {
    if (!isAnimating && leftButtonEnabled) {
      cumulativeTranslation -= 33;
      compteur += 1;
      console.log(compteur);
      isAnimating = true;
      leftButtonEnabled = false;
      galleryPhotos.style.transition = "transform 0.4s ease-out";
      galleryPhotos.style.transform = `translateX(${cumulativeTranslation}%)`;
      galleryPhotos.addEventListener("transitionend", handleAnimationEnd);
    }
  });
});
