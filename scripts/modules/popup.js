const popup = document.querySelector(".popup-wrapper");
const popupContainer = document.querySelector(".popup-container");

const popupEdit = document.querySelector(".popup-edit-wrapper");
const popupEditContainer = document.querySelector(".popup-edit-container");

const popupActionContainer = document.querySelector(".popup-action-container");

const formContainer = document.querySelector(".form-container");
const editFormContainer = document.querySelector(".edit-form-container");

const nextForm = document.querySelector("#per_info_form");
const prevForm = document.querySelector("#gen_info_form");

const popups = [
  {
    wrapper: popup,
    container: popupContainer,
    formContainer: formContainer,
    formInitialized: false,
  },
  {
    wrapper: popupEdit,
    container: popupEditContainer,
    formContainer: editFormContainer,
    formInitialized: false,
  },
];

popups.forEach((popup) => {
  popup.wrapper.addEventListener("click", (e) => {
    if (!popup.container.contains(e.target)) {
      closePopup(popup.wrapper, popup.container, popup.formContainer);
    }
  });
});

document.addEventListener("click", (e) => {
  if (e.target !== popupActionContainer) {
    closeActionPopup();
  }
});

function openPopup(formInitialized, popup, popupContainer) {
  popup.style.display = "flex";
  popup.style.visibility = "visible";

  if (!formInitialized) {
    formContainer.style.minHeight =
      prevForm.getBoundingClientRect().height + 20 + "px";
    editFormContainer.style.minHeight =
      formOptionsContainer.getBoundingClientRect().height + "px";
    formInitialized = true;
  }

  setTimeout(() => {
    popup.style.opacity = 1;
    popupContainer.style.transform = "scale(1)";

    nextFormHeight = nextForm.getBoundingClientRect().height;
    prevFormHeight = prevForm.getBoundingClientRect().height;
  }, 0);
}

function closePopup(popup, popupContainer, formContainer) {
  resetInvalidInput(formContainer);

  setTimeout(() => {
    popup.style.opacity = 0;
    popupContainer.style.transform = "scale(0.95)";
    popup.style.visibility = "hidden";
  }, 0);

  setTimeout(() => {
    popup.style.display = "none";
  }, 200);
}

function openEditPopup() {
  openPopup(popups[1].formInitialized, popupEdit, popupEditContainer);
}

function closeEditPopup() {
  closePopup(popupEdit, popupEditContainer, editFormContainer);
}

function openDeletePopup() { }
function closeDeletePopup() { }

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
