const form = document.querySelector("form");
const nextBtn = form.querySelector(".next");
const backBtn = form.querySelector(".backbtn");
const chooseFileBtn = form.querySelector(".btn2");
const allInputFirst = form.querySelectorAll(".first input");

nextBtn.addEventListener("click", (event) => {
    event.preventDefault(); 
    form.classList.add('secActive');
});

backBtn.addEventListener("click", () => {
    form.classList.remove('secActive');
});

chooseFileBtn.addEventListener("click", (event) => {
    event.preventDefault(); 
    event.stopPropagation(); 
});
const dropArea = document.querySelector(".drop_box"),
  button = dropArea.querySelector("button"),
  dragText = dropArea.querySelector("header"),
  input = dropArea.querySelector("input");

button.onclick = () => {
  input.click();
};

input.addEventListener("change", function (e) {
  const fileName = e.target.files[0].name;
  dragText.textContent = fileName; 
});