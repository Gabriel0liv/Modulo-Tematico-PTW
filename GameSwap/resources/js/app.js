// DOM Elements
const loginModal = document.getElementById("login-modal");
const registerModal = document.getElementById("register-modal");
const resetPasswordModal = document.getElementById("reset-password-modal");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const resetForm = document.getElementById("reset-form");
const userProfileBtn = document.getElementById("user-profile-btn");
const userProfileBtnMobile = document.getElementById("user-profile-btn-mobile");
const userProfileInfo = document.getElementById("user-profile-info");
const usernameDisplay = document.getElementById("username-display");
const userInitials = document.getElementById("user-initials");
const resetSuccess = document.getElementById("reset-success");
const registerLink = document.getElementById("register-link");
const loginLink = document.getElementById("login-link");
const forgotPasswordLink = document.getElementById("forgot-password-link");
const backToLoginLink = document.getElementById("back-to-login");
const notificationModal = document.getElementById("notificationModal");
const notificationBtn = document.getElementById("notificationBtn");

// Toggle modals
function showModal(modal) {
    loginModal.classList.remove("active");
    registerModal.classList.remove("active");
    resetPasswordModal.classList.remove("active");
    notificationModal.classList.remove("active");

    loginForm.reset();
    registerForm.reset();
    resetForm.reset();
    resetSuccess.classList.remove("active");

    modal.classList.add("active");
}

function setupModalBackdropClose(modal) {
    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.classList.remove("active");
        }
    });
}

setupModalBackdropClose(loginModal);
setupModalBackdropClose(registerModal);
setupModalBackdropClose(resetPasswordModal);
setupModalBackdropClose(notificationModal);

userProfileBtn.addEventListener("click", () => showModal(loginModal));
userProfileBtnMobile.addEventListener("click", () => showModal(loginModal));

registerLink.addEventListener("click", (e) => {
    e.preventDefault();
    showModal(registerModal);
});

loginLink.addEventListener("click", (e) => {
    e.preventDefault();
    showModal(loginModal);
});

forgotPasswordLink.addEventListener("click", (e) => {
    e.preventDefault();
    showModal(resetPasswordModal);
});

backToLoginLink.addEventListener("click", (e) => {
    e.preventDefault();
    showModal(loginModal);
});

notificationBtn.addEventListener("click", () => showModal(notificationModal));

// Show error
function showError(errorElement, errorTextElement, message) {
    errorTextElement.textContent = message;
    errorElement.classList.add("active");
    errorElement.closest("form").classList.add("shake");
    setTimeout(() => {
        errorElement.closest("form").classList.remove("shake");
    }, 500);
}

// Simulação pós-login (frontend)
function loginSuccess(username) {
    loginModal.classList.remove("active");
    userProfileBtn.classList.add("hidden");
    userProfileBtnMobile.classList.add("hidden");
    userProfileInfo.classList.remove("hidden");
    userProfileInfo.classList.add("flex");
    usernameDisplay.textContent = username;
    userInitials.textContent = username.charAt(0).toUpperCase();

    const successToast = document.createElement("div");
    successToast.className =
        "fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
    successToast.textContent = "Login bem-sucedido!";
    document.body.appendChild(successToast);

    setTimeout(() => {
        successToast.remove();
    }, 3000);
}


// Validações ANUNCIAR PRODUTO

//validações pagamento de subscrição 1º etapa

// validações pagamento de subscrição 2º etapa
