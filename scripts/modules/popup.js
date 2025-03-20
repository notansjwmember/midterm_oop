let popups = [
  {
    wrapper: document.querySelector(".popup-wrapper"),
    container: document.querySelector(".popup-container"),
    form: document.querySelector(".form-container"),
  },
  {
    wrapper: document.querySelector(".popup-edit-wrapper"),
    container: document.querySelector(".popup-edit-container"),
    form: document.querySelector(".edit-form-container"),
  },
];

const actionPopup = document.querySelector(".popup-action-container");

function openPopup(popup) {
  popup.wrapper.style.display = "flex";
  handleEditFormStep(1);

  prevFormHeight = prevForm.getBoundingClientRect().height + 20;
  nextFormHeight = nextForm.getBoundingClientRect().height + 20;

  popup.form.style.minHeight = prevFormHeight + "px";

  setTimeout(() => {
    popup.wrapper.style.opacity = 1;
    popup.container.style.transform = "scale(1)";
    popup.wrapper.style.visibility = "visible";
  }, 200);
}

function openEditPopup() {
  const popup = popups[1];
  openPopup(popup);

  const inputs = popup.form.querySelectorAll("input");
  const options = popup.form.querySelectorAll("option");
  const textarea = popup.form.querySelectorAll("textarea");
  const image = popup.form.querySelector(".user-photo-container");
  inputs.forEach((input) => {
    if (input.type !== "file" && input.type !== "password") {
      const inputName = input.name;
      input.value = user[inputName];
    }
  });

  options.forEach((opt) => {
    if (opt.value == user["gender"]) {
      opt.selected = true;
    }
  });

  textarea.forEach((ta) => {
    const inputName = ta.name;
    ta.textContent = user[inputName];
  });

  image.style.display = "block";
  image.src = user["user_photo"];
}
function closePopup(popup) {
  resetInvalidInputs(popup);

  popup.wrapper.style.opacity = 0;
  popup.container.style.transform = "scale(0.95)";
  popup.wrapper.style.visibility = "hidden";

  setTimeout(() => {
    popup.wrapper.style.display = "none";
  }, 200);
}

document.addEventListener("click", (event) => {
  if (event.target !== actionPopup) {
    closeActionPopup();
  }
});

function openDeletePopup() {
  const confirmation = confirm("Are you sure you want to delete this user?");

  if (confirmation) {
    deleteUser(user["user_id"]);
  }
}

function openActionPopup(event, user_id) {
  actionPopup.style.display = "grid";

  actionPopup.style.left =
    event.currentTarget.getBoundingClientRect().left + "px";
  actionPopup.style.top =
    event.currentTarget.getBoundingClientRect().top + "px";

  setTimeout(() => {
    actionPopup.style.opacity = 1;
    actionPopup.style.visibility = "visible";
  }, 200);

  user = fetchUser(user_id);
}

function closeActionPopup() {
  actionPopup.style.opacity = 0;
  actionPopup.style.visibility = "hidden";

  setTimeout(() => {
    actionPopup.display = "none";
  }, 200);
}

function showAlertPopup(title, icon, message) {
  const popup = document.querySelector(".popup-alert-container");

  popup.querySelector(".title-placeholder").innerHTML = title;
  popup.querySelector(".icon-placeholder").innerHTML = icon;
  popup.querySelector(".text-placeholder").innerHTML = message;

  popup.style.display = "grid";

  setTimeout(() => {
    popup.style.visibility = "visible";
    popup.style.opacity = 1;
  }, 200);

  setTimeout(() => {
    popup.style.visibility = "hidden";
    popup.style.opacity = 0;
  }, 2700);

  setTimeout(() => {
    popup.style.display = "none";
  }, 3700);
}
