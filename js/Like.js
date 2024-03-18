document.querySelectorAll(".likeBtn").forEach((button) => {
  button.addEventListener("click", () => {
    var countElement = button.querySelector(".likes");
    var count = parseInt(countElement.innerHTML);
    var icon = button.querySelector(".xx"); // Sélectionnez l'icône dans le bouton actuel

    if (!button.classList.contains("like-it")) {
      count++;
      icon.classList.add("fas", "fa-heart");
      button.classList.add("like-it");
      icon.classList.remove("bx", "bx-comment");
    } else {
      count--;
      button.classList.remove("like-it");
      icon.classList.remove("fas", "fa-heart");
      icon.classList.add("bx", "bx-comment");
    }

    countElement.innerHTML = count;
  });
});
