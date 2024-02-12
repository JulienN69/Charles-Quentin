document.getElementById("photoInput").addEventListener("change", function () {
  var fileNameDisplay = document.getElementById("fileName");
  if (this.files && this.files.length > 0) {
    fileNameDisplay.textContent = this.files[0].name;
  } else {
    fileNameDisplay.textContent = "";
  }
});
