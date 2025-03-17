const popup = document.querySelector(".popup-wrapper");
const popupContainer = document.querySelector(".popup-container");
const formContainer = document.querySelector(".form-container");
const nextForm = document.querySelector("#per_info_form");
const prevForm = document.querySelector("#gen_info_form");

let formInitialized = false;
let step = 0;

popup.addEventListener("click", (e) => {
  if (e.target === popup) {
    closePopup();
  }
});

function openPopup() {
  popup.style.display = "flex";
  popup.style.visibility = "visible";

  if (!formInitialized) {
    formContainer.style.minHeight =
      prevForm.getBoundingClientRect().height + 20 + "px";
    formInitialized = true;
  }

  setTimeout(() => {
    popup.style.opacity = 1;
    popupContainer.style.transform = "scale(1)";

    nextFormHeight = nextForm.getBoundingClientRect().height;
    prevFormHeight = prevForm.getBoundingClientRect().height;
  }, 0);
}

function closePopup() {
  formContainer
    .querySelectorAll("input")
    .forEach((e) => e.classList.remove("invalid-input"));
  formContainer.querySelector("select").classList.remove("invalid-input");
  nextForm.querySelector(".password-input").classList.remove("invalid-input");

  setTimeout(() => {
    popup.style.opacity = 0;
    popupContainer.style.transform = "scale(0.95)";
    popup.style.visibility = "hidden";
  }, 0);

  setTimeout(() => {
    popup.style.display = "none";
  }, 200);
}
