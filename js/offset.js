var offset = document.getElementById("offset");
var fnt = document.querySelector(".fnt");

function displaywin() {
  fnt.style.display = "block";
}

offset.addEventListener("click", displaywin);

var close = document.querySelector(".closex"); // Correction de la variable close
close.addEventListener("click", function () {
  fnt.style.display = "none";
});
