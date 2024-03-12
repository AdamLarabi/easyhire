document.querySelectorAll(".likeBtn").forEach((button) => {
  button.addEventListener("click", () => {
    var countElement = button.querySelector(".likes");
    var count = parseInt(countElement.innerHTML);

    if (button.click) {
      count++;
    } else {
      count--;
    }
    countElement.innerHTML = count;
    button.click = !button.click;
  });
});
