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
const registerLink = document.getElementById("register-link");
const loginLink = document.getElementById("login-link");
const forgotPasswordLink = document.getElementById("forgot-password-link");
const backToLoginLink = document.getElementById("back-to-login");
const notificationModal = document.getElementById("notificationModal");
const notificationBtn = document.getElementById("notificationBtn");

// Initialize - hide error messages


// Toggle modals
function showModal(modal) {
    loginModal.classList.remove("active");
    registerModal.classList.remove("active");
    resetPasswordModal.classList.remove("active");
    notificationModal.classList.remove("active");

    loginForm.reset();
    registerForm.reset();
    resetForm.reset();

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

document.addEventListener("DOMContentLoaded", function () {
    const userProfileBtn = document.getElementById("user-profile-btn");
    const loginModal = document.getElementById("login-modal");
    const registerModal = document.getElementById("register-modal");
    const notificationModal = document.getElementById("notificationModal");

    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    const loginErrorContainer = document.getElementById("login-error");
    const loginErrorText = document.getElementById("error-message-text");

    const registerErrorContainer = document.getElementById("register-error");
    const registerErrorText = document.getElementById("register-error-text");

    const registerLink = document.getElementById("register-link");
    const backToLoginLink = document.getElementById("backToLoginLink");

    const notificationBtn = document.getElementById("notificationBtn");

    // Helper para mostrar modal
    function showModal(modal) {
        document.querySelectorAll(".modal").forEach(m => m.classList.add("hidden"));
        modal?.classList.remove("hidden");
    }

    // Abrir modal de login ao clicar no botão de utilizador
    if (userProfileBtn && loginModal) {
        userProfileBtn.addEventListener("click", () => showModal(loginModal));
    }

    // Alternar entre login e registo
    if (registerLink && registerModal) {
        registerLink.addEventListener("click", (e) => {
            e.preventDefault();
            showModal(registerModal);
        });
    }

    if (backToLoginLink && loginModal) {
        backToLoginLink.addEventListener("click", (e) => {
            e.preventDefault();
            showModal(loginModal);
        });
    }

    // Mostrar notificações
    if (notificationBtn && notificationModal) {
        notificationBtn.addEventListener("click", () => {
            notificationModal.classList.toggle("hidden");
        });
    }

    // Fechar modal ao clicar fora do conteúdo
    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.classList.add("hidden");
                if (loginErrorContainer) loginErrorContainer.classList.add("hidden");
                if (registerErrorContainer) registerErrorContainer.classList.add("hidden");
            }
        });
    });

    // Submissão do login
    if (loginForm) {
        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);

            const response = await fetch(loginForm.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                },
            });

            if (response.ok) {
                window.location.href = "/";
            } else {
                const errors = await response.json();
                loginErrorText.textContent = errors.username || errors.password || "Erro ao fazer login.";
                loginErrorContainer?.classList.remove("hidden");
            }
        });
    }

    // Submissão do registo
    if (registerForm) {
        registerForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(registerForm);

            const response = await fetch(registerForm.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                },
            });

            if (response.ok) {
                window.location.href = "/";
            } else {
                const errors = await response.json();
                registerErrorText.textContent = Object.values(errors).join(" ");
                registerErrorContainer?.classList.remove("hidden");
            }
        });
    }

    // Simulação pós-login (frontend)
    function loginSuccess(username) {
        loginModal.classList.add("hidden");
        userProfileBtn?.classList.add("hidden");
        document.getElementById("user-profile-info")?.classList.remove("hidden");
        document.getElementById("user-profile-info")?.classList.add("flex");

        document.getElementById("username-display").textContent = username;
        document.getElementById("user-initials").textContent = username.charAt(0).toUpperCase();

        const successToast = document.createElement("div");
        successToast.className = "fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
        successToast.textContent = "Login bem-sucedido!";
        document.body.appendChild(successToast);

        setTimeout(() => {
            successToast.remove();
        }, 3000);
    }
});
