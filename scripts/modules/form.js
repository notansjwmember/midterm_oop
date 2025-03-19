let formData = new FormData();
let prevFormData;
let isPasswordVisible = false;
let editFormStep = 1;

const req_fields = [
  "first_name",
  "last_name",
  "username",
  "password",
  "country",
  "gender",
  "birthdate",
  "email",
];

const formContainer = popups[0].form;
const editFormContainer = popups[1].form;

const formOptionsContainer = document.querySelector(".form-options");
const formOptions = formOptionsContainer.querySelectorAll(".edit-form-option");

const nextStep = document.querySelector("#next-step");
const nextStepEdit = popups[1].container.querySelector("#next-step-edit");

const nextEditForm = editFormContainer.querySelector("#per_info_form");
const prevEditForm = editFormContainer.querySelector("#gen_info_form");

const nextForm = formContainer.querySelector("#per_info_form");
const prevForm = formContainer.querySelector("#gen_info_form");

const wrappers = [
  document.querySelector(".user-photo-wrapper"),
  editFormContainer.querySelector(".user-photo-wrapper"),
];

function handleStep(step, popup) {
  prevFormData = new FormData(prevForm);
  let isValid = true;

  // validation
  prevFormData.forEach((value, key) => {
    if (req_fields.includes(key) && !value) {
      isValid = false;
      const input = prevForm.querySelector(`[name="${key}"]`);
      if (input) input.classList.add("invalid-input");
    }
  });

  // do nothing
  if (!isValid) return;

  if (step === 1) {
    formNextAnimation(popup);
  } else if (step === 0) {
    formPrevAnimation(popup);
  }
}

let formOption = null;
let formInitialized = false;

// for getting the form option wanted in edit popup
formOptions.forEach((opt) => {
  opt.addEventListener("click", (e) => {
    formOptions.forEach((option) => option.classList.remove("active"));
    e.currentTarget.classList.add("active");
    formOption = e.currentTarget.dataset.form;
  });
});

function handleEditFormStep(step) {
  const popup = popups[1];

  if (!formOption) return;

  if (!formInitialized) {
    formOptionHeight = formOptionsContainer.getBoundingClientRect().height;
    formInitialized = true;
  }

  if (step == 2) {
    nextStepEdit.style.backgroundColor = "#274f7d";
    nextStepEdit.textContent = "Save changes";
    nextStepEdit.onclick = () => handleFormData();
  }

  if (step == 1) {
    formOptionsContainer.style.position = "relative";
    formOptionsContainer.style.left = "0";
    formOptionsContainer.style.opacity = 1;

    popup.form.style.minHeight = formOptionHeight + "px";

    prevEditForm.style.left = "100%";
    prevEditForm.style.opacity = 0;
    nextEditForm.style.left = "100%";
    nextEditForm.style.opacity = 0;

    nextStepEdit.style.backgroundColor = "#9843dd";
    nextStepEdit.textContent = "Next step";
    nextStepEdit.onclick = () => handleEditFormStep(2, null);
  }
  if (step == 2 && formOption == 1) {
    formOptionsContainer.style.left = "-100%";
    formOptionsContainer.style.position = "absolute";
    formOptionsContainer.style.opacity = 0;

    prevEditForm.style.opacity = 1;
    prevEditForm.style.left = "0";

    popup.form.style.minHeight =
      popup.wrapper.querySelector("#gen_info_form").getBoundingClientRect()
        .height + "px";
  } else if (step == 2 && formOption == 2) {
    popup.form.style.minHeight =
      popup.wrapper.querySelector("#per_info_form").getBoundingClientRect()
        .height + "px";

    setTimeout(() => {
      formOptionsContainer.style.left = "-100%";
      prevEditForm.style.position = "absolute";
      prevEditForm.style.opacity = 0;
    }, 0);

    nextEditForm.style.opacity = 1;
    nextEditForm.style.left = "0";
  }
}

function handleFormData() {
  const nextFormData = new FormData(nextForm);
  let isValid = true;

  nextFormData.forEach((value, key) => {
    if (req_fields.includes(key) && !value) {
      isValid = false;
      const input = nextForm.querySelector(`[name="${key}"]`);
      const password = nextForm.querySelector(".password-input");
      if (input) input.classList.add("invalid-input");
      if (password) password.classList.add("invalid-input");
    }
  });

  if (!isValid) return;

  prevFormData.forEach((value, key) => {
    formData.append(key, value);
  });

  nextFormData.forEach((value, key) => {
    formData.append(key, value);
  });

  // redirect to user api
  createUser(formData);
}

// form animations
function formNextAnimation(popup) {
  resetInvalidInputs(popup);

  nextForm.style.display = "flex";
  nextStep.textContent = "Create user";
  nextStep.style.backgroundColor = "#274f7d";
  nextStep.onclick = () => handleFormData();

  setTimeout(() => {
    prevForm.style.left = "-100%";
    prevForm.style.position = "absolute";
    prevForm.style.opacity = 0;
    popup.form.style.minHeight = nextFormHeight + "px";
  }, 0);

  nextForm.style.opacity = 1;
  nextForm.style.left = "0";
}

function formPrevAnimation(popup) {
  nextStep.style.backgroundColor = "#9843dd";
  nextStep.textContent = "Next step";
  nextStep.onclick = () => handleStep(1, popup);
  prevForm.style.display = "flex";

  setTimeout(() => {
    nextForm.style.left = "100%";
    nextForm.style.position = "absolute";
    nextForm.style.opacity = 0;
    popup.form.style.minHeight = prevFormHeight + "px";
  }, 0);

  prevForm.style.opacity = 1;
  prevForm.style.left = "0";
}

// listen to both forms regarding profile picture upload
wrappers.forEach((wrap) => {
  wrap.addEventListener("click", () => {
    wrap.querySelector("input[name='user_photo']").click();
  });

  wrap
    .querySelector("input[name='user_photo']")
    .addEventListener("change", (e) => {
      const file = e.target.files[0];

      wrap.querySelector(".upload-button").style.display = "none";
      wrap.querySelector("#user-photo-text").textContent = wrap.querySelector(
        "input[name='user_photo']",
      ).files[0].name;

      if (file) {
        const blobUrl = URL.createObjectURL(file);
        const userPhotoContainer = wrap.querySelector(".user-photo-container");

        userPhotoContainer.src = blobUrl;
        userPhotoContainer.style.display = "block";
      }
    });
});

function resetInvalidInputs(popup) {
  const inputs = popup.form.querySelectorAll("input");
  const select = popup.form.querySelector("select");

  inputs.forEach((input) => {
    input.classList.remove("invalid-input");
  });
  select.classList.remove("invalid-input");
}

// password visibility toggle
document.querySelector(".password-input-eye").addEventListener("click", () => {
  isPasswordVisible = !isPasswordVisible;

  if (!isPasswordVisible) {
    document.querySelector(".password-input-eye").innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
  </svg>
`;
    document.querySelector(".password-input input").type = "password";
    return;
  }

  document.querySelector(".password-input-eye").innerHTML = `
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
  <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
  <path d="M3 3l18 18" />
</svg>
`;
  document.querySelector(".password-input input").type = "text";
});
