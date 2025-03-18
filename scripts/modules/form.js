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

const userPhotoWrapper = document.querySelector(".user-photo-wrapper");
const editUserPhotoWrapper = editFormContainer.querySelector(
  ".user-photo-wrapper",
);

const nextStep = document.querySelector("#next-step");

const formOptionsContainer = document.querySelector(".form-options");
const formOptions = document.querySelectorAll(
  ".form-options .edit-form-option",
);

const wrappers = [userPhotoWrapper, editUserPhotoWrapper];

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

let step = 0;
let formData = new FormData();
let prevFormData;
let isPasswordVisible = false;
let formOption = null;

formOptions.forEach((opt) => {
  opt.addEventListener("click", (e) => {
    formOptions.forEach((option) => option.classList.remove("active"));

    e.currentTarget.classList.add("active");

    formOption = e.currentTarget.dataset.form;
  });
});

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

function handleStep(num) {
  prevFormData = new FormData(prevForm);

  let isValid = true;

  if (step + num > 1) return;

  prevFormData.forEach((value, key) => {
    if (req_fields.includes(key) && !value) {
      isValid = false;
      const input = prevForm.querySelector(`[name="${key}"]`);
      if (input) input.classList.add("invalid-input");
    }
  });

  if (!isValid) return;

  step += num;

  if (step === 1) {
    formContainer
      .querySelectorAll("input")
      .forEach((e) => e.classList.remove("invalid-input"));
    formContainer.querySelector("select").classList.remove("invalid-input");

    formNextAnimation();
  } else if (step === 0) {
    formPrevAnimation();
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

  createUser(formData);
}

function formNextAnimation() {
  nextForm.style.display = "flex";
  nextStep.textContent = "Create user";
  nextStep.style.backgroundColor = "#274f7d";
  nextStep.onclick = () => handleFormData();

  setTimeout(() => {
    formContainer.style.minHeight = nextFormHeight + 25 + "px";
    prevForm.style.left = "-100%";
    prevForm.style.position = "absolute";
    prevForm.style.opacity = 0;
  }, 0);

  nextForm.style.opacity = 1;
  nextForm.style.left = "0";
}

function formPrevAnimation() {
  nextStep.style.backgroundColor = "#9843dd";
  nextStep.textContent = "Next step";
  nextStep.onclick = () => handleStep(1);
  prevForm.style.display = "flex";

  setTimeout(() => {
    formContainer.style.minHeight = prevFormHeight + 25 + "px";
    nextForm.style.left = "100%";
    nextForm.style.position = "absolute";
    nextForm.style.opacity = 0;
  }, 0);

  prevForm.style.opacity = 1;
  prevForm.style.left = "0";
}

const nextStepEdit = popupEditContainer.querySelector("#next-step-edit");
const nextEditForm = editFormContainer.querySelector("#per_info_form");
const prevEditForm = editFormContainer.querySelector("#gen_info_form");

let nextEditFormHeight;
let prevEditFormHeight;
let editFormStep = 1;

function editUser(user_id) {
  openEditPopup();

  setTimeout(() => {
    nextEditFormHeight = nextEditForm.getBoundingClientRect().height;
    prevEditFormHeight = prevEditForm.getBoundingClientRect().height;
  }, 0);

  formOption = null;
  nextStepEdit.onclick = () => handleEditFormStep(formOption);
}

function deleteUser(user_id) {
  openDeletePopup();
}

function handleEditFormStep(formOption) {
  if (editFormStep == 2) {
    nextStepEdit.style.backgroundColor = "#274f7d";
    nextStepEdit.textContent = "Save changes";
    nextStepEdit.onclick = () => handleFormData();
  }

  if (editFormStep == 1) {
    changeEditFormStep(1);
  } else if (editFormStep == 2 && formOption == 1) {
    formOptionsContainer.style.left = "-100%";
    formOptionsContainer.style.position = "absolute";
    formOptionsContainer.style.opacity = 0;

    editFormContainer.style.minHeight = prevEditFormHeight + 20 + "px";
    prevEditForm.style.opacity = 1;
    prevEditForm.style.left = "0";
  } else if (editFormStep == 2 && formOption == 2) {
    setTimeout(() => {
      editFormContainer.style.minHeight = nextEditFormHeight + 20 + "px";
      formOptionsContainer.style.left = "-100%";
      prevEditForm.style.position = "absolute";
      prevEditForm.style.opacity = 0;
    }, 0);

    nextEditForm.style.opacity = 1;
    nextEditForm.style.left = "0";
  }
}

function changeEditFormStep(step) {
  editFormStep += step;
  handleEditFormStep(editFormStep);
}
