// DOM Elements
const loginModal = document.getElementById('login-modal');
const registerModal = document.getElementById('register-modal');
const resetPasswordModal = document.getElementById('reset-password-modal');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const resetForm = document.getElementById('reset-form');
const userProfileBtn = document.getElementById('user-profile-btn');
const userProfileBtnMobile = document.getElementById('user-profile-btn-mobile');
const userProfileInfo = document.getElementById('user-profile-info');
const usernameDisplay = document.getElementById('username-display');
const userInitials = document.getElementById('user-initials');
const loginError = document.getElementById('login-error');
const registerError = document.getElementById('register-error');
const resetError = document.getElementById('reset-error');
const resetSuccess = document.getElementById('reset-success');
const registerLink = document.getElementById('register-link');
const loginLink = document.getElementById('login-link');
const forgotPasswordLink = document.getElementById('forgot-password-link');
const backToLoginLink = document.getElementById('back-to-login');

// Initialize - hide error messages
loginError.classList.remove('active');
registerError.classList.remove('active');
resetError.classList.remove('active');
resetSuccess.classList.remove('active');

// Toggle modals
function showModal(modal) {
    // Hide all modals first
    loginModal.classList.remove('active');
    registerModal.classList.remove('active');
    resetPasswordModal.classList.remove('active');

    // Show the requested modal
    modal.classList.add('active');

    // Reset forms and errors
    loginForm.reset();
    registerForm.reset();
    resetForm.reset();
    loginError.classList.remove('active');
    registerError.classList.remove('active');
    resetError.classList.remove('active');
    resetSuccess.classList.remove('active');
}

// Close modal when clicking outside
function setupModalBackdropClose(modal) {
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
}

setupModalBackdropClose(loginModal);
setupModalBackdropClose(registerModal);
setupModalBackdropClose(resetPasswordModal);

// Show login modal when user profile button is clicked
userProfileBtn.addEventListener('click', function() {
    showModal(loginModal);
});

userProfileBtnMobile.addEventListener('click', function() {
    showModal(loginModal);
});

// Switch between modals
registerLink.addEventListener('click', function(e) {
    e.preventDefault();
    showModal(registerModal);
});

loginLink.addEventListener('click', function(e) {
    e.preventDefault();
    showModal(loginModal);
});

forgotPasswordLink.addEventListener('click', function(e) {
    e.preventDefault();
    showModal(resetPasswordModal);
});

backToLoginLink.addEventListener('click', function(e) {
    e.preventDefault();
    showModal(loginModal);
});

// Show error message
function showError(errorElement, errorTextElement, message) {
    errorTextElement.textContent = message;
    errorElement.classList.add('active');
    errorElement.closest('form').classList.add('shake');

    // Remove shake animation after it completes
    setTimeout(() => {
        errorElement.closest('form').classList.remove('shake');
    }, 500);
}

// Handle login form submission
loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    // Basic validation
    if (!username || !password) {
        showError(loginError, document.getElementById('error-message-text'), 'Por favor, preencha todos os campos.');
        return;
    }

    // Simulate login process
    simulateLogin(username, password);
});

// Handle registration form submission
registerForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('register-name').value.trim();
    const email = document.getElementById('register-email').value.trim();
    const phone = document.getElementById('register-phone').value.trim();
    const dob = document.getElementById('register-dob').value.trim();
    const username = document.getElementById('register-username').value.trim();
    const password = document.getElementById('register-password').value.trim();
    const confirmPassword = document.getElementById('register-confirm-password').value.trim();
    const termsAccepted = document.getElementById('terms').checked;

    // Basic validation
    if (!name || !email || !phone || !dob || !username || !password || !confirmPassword) {
        showError(registerError, document.getElementById('register-error-text'), 'Por favor, preencha todos os campos obrigatórios.');
        return;
    }

    if (password.length < 8) {
        showError(registerError, document.getElementById('register-error-text'), 'A senha deve ter pelo menos 8 caracteres.');
        return;
    }

    if (password !== confirmPassword) {
        showError(registerError, document.getElementById('register-error-text'), 'As senhas não coincidem.');
        return;
    }

    if (!termsAccepted) {
        showError(registerError, document.getElementById('register-error-text'), 'Você deve aceitar os Termos de Uso e a Política de Privacidade.');
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showError(registerError, document.getElementById('register-error-text'), 'Por favor, insira um email válido.');
        return;
    }

    // Simulate registration process
    simulateRegistration(name, email, username);
});

// Handle password reset form submission
resetForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('reset-email').value.trim();

    // Basic validation
    if (!email) {
        showError(resetError, document.getElementById('reset-error-text'), 'Por favor, insira seu email.');
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showError(resetError, document.getElementById('reset-error-text'), 'Por favor, insira um email válido.');
        return;
    }

    // Simulate password reset process
    simulatePasswordReset(email);
});

// Simulate login process (for demonstration)
function simulateLogin(username, password) {
    // For demo purposes, let's consider "demo" / "password" as valid credentials
    if (username === 'demo' && password === 'password') {
        // Successful login
        loginSuccess(username);
    } else {
        // Failed login
        showError(loginError, document.getElementById('error-message-text'), 'Nome de usuário ou senha incorretos. Por favor, tente novamente.');
    }
}

// Simulate registration process (for demonstration)
function simulateRegistration(name, email, username) {
    // For demo purposes, always succeed
    setTimeout(() => {
        // Close the modal
        registerModal.classList.remove('active');

        // Show success message
        const successToast = document.createElement('div');
        successToast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        successToast.textContent = 'Registro concluído com sucesso! Você já pode fazer login.';
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
        resetError.classList.remove('active');
        resetSuccess.classList.add('active');

        // Hide the form
        document.getElementById('reset-form-container').style.display = 'none';

        // After 3 seconds, return to login
        setTimeout(() => {
            showModal(loginModal);
        }, 3000);
    }, 1000);
}

// Handle successful login
function loginSuccess(username) {
    // Close the modal
    loginModal.classList.remove('active');

    // Update UI to show logged in state
    userProfileBtn.classList.add('hidden');
    userProfileBtnMobile.classList.add('hidden');
    userProfileInfo.classList.remove('hidden');
    userProfileInfo.classList.add('flex');

    // Set username and initials
    usernameDisplay.textContent = username;
    userInitials.textContent = username.charAt(0).toUpperCase();

    // Show success message
    const successToast = document.createElement('div');
    successToast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    successToast.textContent = 'Login bem-sucedido!';
    document.body.appendChild(successToast);

    // Remove success message after 3 seconds
    setTimeout(() => {
        successToast.remove();
    }, 3000);
}
