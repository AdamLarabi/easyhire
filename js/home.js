var fenetre = document.getElementById("fenetre");

function openModal() {
  fenetre.style.opacity = "0";
  fenetre.style.display = "block";
  setTimeout(() => {
    fenetre.style.opacity = "1";
  }, 130);
}

function closeModal() {
  fenetre.style.opacity = "0";
  setTimeout(() => {
    fenetre.style.display = "none";
  }, 300);
}

function publishPost() {
  var postContent = document.getElementById("content").value;
  var file = document.getElementById("fileInput").files[0];

  console.log("Contenu du post :", postContent);
  console.log("Fichier sélectionné :", file);

  closeModal();
}

var textarea = document.getElementById("content");

function afficherConfirmation() {
  var confirmationModal = document.getElementById("confirmationModal");
  confirmationModal.style.display = "block";
}

function abandonner() {
  textarea.value = "";
  closeModal();
  fermerConfirmation();
}

function continuer() {
  fermerConfirmation();
}

function fermerConfirmation() {
  var confirmationModal = document.getElementById("confirmationModal");
  confirmationModal.style.display = "none";
}

document.addEventListener("keydown", function (event) {
  if (event.key === "x") {
    afficherConfirmation();
  }
});

window.onload = function () {
  document.getElementById("pub").disabled = true;
};
