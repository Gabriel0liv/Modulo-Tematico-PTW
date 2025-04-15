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
const loginError = document.getElementById("login-error");
const registerError = document.getElementById("register-error");
const resetError = document.getElementById("reset-error");
const resetSuccess = document.getElementById("reset-success");
const registerLink = document.getElementById("register-link");
const loginLink = document.getElementById("login-link");
const forgotPasswordLink = document.getElementById("forgot-password-link");
const backToLoginLink = document.getElementById("back-to-login");

// Initialize - hide error messages
loginError.classList.remove("active");
registerError.classList.remove("active");
resetError.classList.remove("active");
resetSuccess.classList.remove("active");

// Toggle modals
function showModal(modal) {
    // Hide all modals first
    loginModal.classList.remove("active");
    registerModal.classList.remove("active");
    resetPasswordModal.classList.remove("active");

    // Show the requested modal
    modal.classList.add("active");

    // Reset forms and errors
    loginForm.reset();
    registerForm.reset();
    resetForm.reset();
    loginError.classList.remove("active");
    registerError.classList.remove("active");
    resetError.classList.remove("active");
    resetSuccess.classList.remove("active");
}

// Close modal when clicking outside
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

// Show login modal when user profile button is clicked
userProfileBtn.addEventListener("click", function () {
    showModal(loginModal);
});

userProfileBtnMobile.addEventListener("click", function () {
    showModal(loginModal);
});

// Switch between modals
registerLink.addEventListener("click", function (e) {
    e.preventDefault();
    showModal(registerModal);
});

loginLink.addEventListener("click", function (e) {
    e.preventDefault();
    showModal(loginModal);
});

forgotPasswordLink.addEventListener("click", function (e) {
    e.preventDefault();
    showModal(resetPasswordModal);
});

backToLoginLink.addEventListener("click", function (e) {
    e.preventDefault();
    showModal(loginModal);
});

// Show error message
function showError(errorElement, errorTextElement, message) {
    errorTextElement.textContent = message;
    errorElement.classList.add("active");
    errorElement.closest("form").classList.add("shake");

    // Remove shake animation after it completes
    setTimeout(() => {
        errorElement.closest("form").classList.remove("shake");
    }, 500);
}

// validação do login
// Handle login form submission
loginForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const username = document.getElementById("username");
    const password = document.getElementById("password");

    //let isValid = true;

    // Validação do nome de usuário
    if (username.value.trim() === "") {
        showError(
            loginError,
            document.getElementById("error-message-text"),
            "Username é obrigatório"
        );
        username.focus();
        isValid = false;
    }

    // Validação da senha
    if (password.value.trim() === "") {
        showError(
            loginError,
            document.getElementById("error-message-text"),
            "Password é obrigatória."
        );
        password.focus();
        isValid = false;
    }

    /*
    if (!isValid) {
        event.preventDefault();
    }*/

    // Simulate login process
    simulateLogin(username, password);
});

// Handle registration form submission
// validação do registro
registerForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("register-name");
    const email = document.getElementById("register-email");
    const phone = document.getElementById("register-phone");
    const dob = document.getElementById("register-dob");
    const username = document.getElementById("register-username");
    const password = document.getElementById("register-password");
    const confirmPassword = document.getElementById(
        "register-confirm-password"
    );
    const termsAccepted = document.getElementById("terms").checked;

    // Basic validation

    // Validação do nome completo
    if (name.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "O nome completo é obrigatório."
        );
        name.focus();
        isValid = false;
    }

    // Validação do email
    if (email.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "O email é obrigatório."
        );
        email.focus();
        isValid = false;
    } else if (!emailRegex.test(email.value)) {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "Insira um email válido."
        );
        email.focus();
        isValid = false;
    }

    // Validação do telefone
    const phoneRegex = /^\+?[0-9\s\-]{9,15}$/;
    if (phone.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "O telefone é obrigatório."
        );
        phone.focus();
        isValid = false;
    } else if (!phoneRegex.test(phone.value)) {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "Insira um número de telefone válido."
        );
        phone.focus();
        isValid = false;
    }

    // Validação da data de nascimento
    if (dob.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "A data de nascimento é obrigatória."
        );
        dob.focus();
        isValid = false;
    }

    // Validação do nome de usuário
    if (username.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "O nome de usuário é obrigatório."
        );
        username.focus();
        isValid = false;
    }

    // Validação da senha
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (password.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "A senha é obrigatória."
        );
        password.focus();
        isValid = false;
    } else if (!passwordRegex.test(password.value)) {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números."
        );
        password.focus();
        isValid = false;
    }

    // Validação da confirmação de senha
    if (confirmPassword.value.trim() === "") {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "A confirmação de senha é obrigatória."
        );
        confirmPassword.focus();
        isValid = false;
    } else if (password.value !== confirmPassword.value) {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "As senhas não coincidem."
        );
        confirmPassword.focus();
        isValid = false;
    }

    // Validação dos termos de uso
    if (!terms.checked) {
        showError(
            registerError,
            document.getElementById("register-error-text"),
            "Você deve aceitar os Termos de Uso e a Política de Privacidade."
        );
        terms.focus();
        isValid = false;
    }

    // Simulate registration process
    simulateRegistration(name, email, username);
});

// Handle password reset form submission
resetForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("reset-email").value.trim();

    // Basic validation
    if (!email) {
        showError(
            resetError,
            document.getElementById("reset-error-text"),
            "Por favor, insira seu email."
        );
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showError(
            resetError,
            document.getElementById("reset-error-text"),
            "Por favor, insira um email válido."
        );
        return;
    }

    // Simulate password reset process
    simulatePasswordReset(email);
});

// Simulate login process (for demonstration)
function simulateLogin(username, password) {
    // For demo purposes, let's consider "demo" / "password" as valid credentials
    if (username === "demo" && password === "password") {
        // Successful login
        loginSuccess(username);
    } else {
        // Failed login
        showError(
            loginError,
            document.getElementById("error-message-text"),
            "Nome de usuário ou senha incorretos. Por favor, tente novamente."
        );
    }
}

// Simulate registration process (for demonstration)
function simulateRegistration(name, email, username) {
    // For demo purposes, always succeed
    setTimeout(() => {
        // Close the modal
        registerModal.classList.remove("active");

        // Show success message
        const successToast = document.createElement("div");
        successToast.className =
            "fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
        successToast.textContent =
            "Registro concluído com sucesso! Você já pode fazer login.";
        document.body.appendChild(successToast);

        // Remove success message after 3 seconds
        setTimeout(() => {
            successToast.remove();
            // Show login modal
            showModal(loginModal);
        }, 3000);
    }, 1000);
}

// Simulate password reset process (for demonstration)
function simulatePasswordReset(email) {
    // For demo purposes, always succeed
    setTimeout(() => {
        // Show success message
        resetError.classList.remove("active");
        resetSuccess.classList.add("active");

        // Hide the form
        document.getElementById("reset-form-container").style.display = "none";

        // After 3 seconds, return to login
        setTimeout(() => {
            showModal(loginModal);
        }, 3000);
    }, 1000);
}

// Handle successful login
function loginSuccess(username) {
    // Close the modal
    loginModal.classList.remove("active");

    // Update UI to show logged in state
    userProfileBtn.classList.add("hidden");
    userProfileBtnMobile.classList.add("hidden");
    userProfileInfo.classList.remove("hidden");
    userProfileInfo.classList.add("flex");

    // Set username and initials
    usernameDisplay.textContent = username;
    userInitials.textContent = username.charAt(0).toUpperCase();

    // Show success message
    const successToast = document.createElement("div");
    successToast.className =
        "fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
    successToast.textContent = "Login bem-sucedido!";
    document.body.appendChild(successToast);

    // Remove success message after 3 seconds
    setTimeout(() => {
        successToast.remove();
    }, 3000);

    // Simple script for price range slider
    document.addEventListener("DOMContentLoaded", function () {
        const priceSliders = document.querySelectorAll(".price-slider");

        priceSliders.forEach((slider) => {
            slider.addEventListener("input", function () {
                const value = this.value;
                const min = this.min ? this.min : 0;
                const max = this.max ? this.max : 100;
                const percentage = ((value - min) * 100) / (max - min);

                this.style.background = `linear-gradient(to right, #2563EB ${percentage}%, #e5e7eb ${percentage}%)`;
            });

            // Trigger the input event to set initial gradient
            const event = new Event("input");
            slider.dispatchEvent(event);
        });

        // Custom checkbox functionality
        const checkboxes = document.querySelectorAll(".custom-checkbox input");
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function () {
                // Additional functionality can be added here if needed
            });
        });
    });
}

// Validações ANUNCIAR PRODUTO

//validações pagamento de subscrição 1º etapa

// validações pagamento de subscrição 2º etapa
