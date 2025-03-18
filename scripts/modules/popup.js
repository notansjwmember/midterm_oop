const popup = document.querySelector(".popup-wrapper");
const popupContainer = document.querySelector(".popup-container");

const popupEdit = document.querySelector(".popup-edit-wrapper");
const popupEditContainer = document.querySelector(".popup-edit-container");

const popupActionContainer = document.querySelector(".popup-action-container");

const formContainer = document.querySelector(".form-container");
const editFormContainer = document.querySelector(".edit-form-container");

const nextForm = document.querySelector("#per_info_form");
const prevForm = document.querySelector("#gen_info_form");

let popups = [
  {
    wrapper: popup,
    container: popupContainer,
    formContainer: formContainer,
  },
  {
    wrapper: popupEdit,
    container: popupEditContainer,
    formContainer: editFormContainer,
  },
];

document.addEventListener("click", (e) => {
  if (e.target !== popupActionContainer) {
    closeActionPopup();
  }
});

function openPopup(popup) {
  popup.wrapper.style.display = "flex";
  popup.wrapper.style.visibility = "visible";
  popup.wrapper.style.opacity = 1;
  popup.container.style.transform = "scale(1)";

  setTimeout(() => {
    popup.formContainer.style.minHeight =
      prevForm.getBoundingClientRect().height + "px";
    editFormContainer.style.minHeight =
      formOptionsContainer.getBoundingClientRect().height + "px";

    nextFormHeight = nextForm.getBoundingClientRect().height;
    prevFormHeight = prevForm.getBoundingClientRect().height;
  }, 0);

  nextStepEdit.style.backgroundColor = "#9843dd";
  nextStepEdit.textContent = "Next step";
  editFormStep = 1;
}

function closePopup(popup) {
  resetInvalidInput(formContainer);
  formOptionsContainer.style.opacity = 1;
  formOptionsContainer.style.left = 0;

  popup.wrapper.style.opacity = 0;
  popup.container.style.transform = "scale(0.95)";
  popup.wrapper.style.visibility = "hidden";

  setTimeout(() => {
    formOptionsContainer.style.position = "flex";

    prevEditForm.style.left = "100%";
    prevEditForm.style.opacity = 0;
    nextEditForm.style.left = "100%";
    nextEditForm.style.opacity = 0;

    popup.wrapper.style.display = "none";
  }, 200);
}

function openEditPopup() {
  openPopup(popups[1]);
}

function closeEditPopup() {
  closePopup(popups[1]);
}

// function openDeletePopup() { }
// function closeDeletePopup() { }

function openActionPopup(event, user_id) {
  event.stopPropagation();

  document.querySelector(".edit-button").onclick = () => editUser(user_id);
  document.querySelector(".delete-button").onclick = () => deleteUser(user_id);

  const elementTarget = event.currentTarget;
  let popupTopPos = elementTarget.getBoundingClientRect().top;
  let popupRightPos = elementTarget.getBoundingClientRect().left;

  popupActionContainer.style.display = "grid";
  popupActionContainer.style.top = popupTopPos - 5 + "px";
  popupActionContainer.style.left = popupRightPos + "px";

  setTimeout(() => {
    popupActionContainer.style.visibility = "visible";
    popupActionContainer.style.transform = "scale(1)";
    popupActionContainer.style.opacity = 1;
  }, 100);
}

function closeActionPopup() {
  popupActionContainer.style.visibility = "hidden";
  popupActionContainer.style.transform = "scale(0.95)";
  popupActionContainer.style.opacity = 0;

  setTimeout(() => {
    popupActionContainer.style.display = "none";
  }, 300);
}

function resetInvalidInput(formContainer) {
  formContainer
    .querySelectorAll("input")
    .forEach((e) => e.classList.remove("invalid-input"));
  formContainer.querySelector("select").classList.remove("invalid-input");
  nextForm.querySelector(".password-input").classList.remove("invalid-input");
}
