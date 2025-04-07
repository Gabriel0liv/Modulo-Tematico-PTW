import './bootstrap';

// DOM Elements
const loginModal = document.getElementById('login-modal');
const loginForm = document.getElementById('login-form');
const userProfileBtn = document.getElementById('user-profile-btn');
const userProfileBtnMobile = document.getElementById('user-profile-btn-mobile');
const userProfileInfo = document.getElementById('user-profile-info');
const usernameDisplay = document.getElementById('username-display');
const userInitials = document.getElementById('user-initials');
const loginError = document.getElementById('login-error');
const errorMessageText = document.getElementById('error-message-text');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

// Initialize - hide error message
loginError.classList.remove('active');

// Toggle login modal
function toggleLoginModal() {
    loginModal.classList.toggle('active');
    // Reset form and error when opening
    if (loginModal.classList.contains('active')) {
        loginForm.reset();
        loginError.classList.remove('active');
    }
}

// Close modal when clicking outside
loginModal.addEventListener('click', function(e) {
    if (e.target === loginModal) {
        toggleLoginModal();
    }
});

// Show login modal when user profile button is clicked
userProfileBtn.addEventListener('click', toggleLoginModal);
userProfileBtnMobile.addEventListener('click', toggleLoginModal);

// Handle login form submission
loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    // Basic validation
    if (!username || !password) {
        showError('Por favor, preencha todos os campos.');
        return;
    }

    // Simulate login process
    simulateLogin(username, password);
});

// Show error message
function showError(message) {
    errorMessageText.textContent = message;
    loginError.classList.add('active');
    loginForm.classList.add('shake');

    // Remove shake animation after it completes
    setTimeout(() => {
        loginForm.classList.remove('shake');
    }, 500);
}

// Simulate login process (for demonstration)
function simulateLogin(username, password) {
    // For demo purposes, let's consider "demo" / "password" as valid credentials
    if (username === 'demo' && password === 'password') {
        // Successful login
        loginSuccess(username);
    } else {
        // Failed login
        showError('Nome de usuário ou senha incorretos. Por favor, tente novamente.');
    }
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

    // Show success message (optional)
    const successToast = document.createElement('div');
    successToast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg';
    successToast.textContent = 'Login bem-sucedido!';
    document.body.appendChild(successToast);

    // Remove success message after 3 seconds
    setTimeout(() => {
        successToast.remove();
    }, 3000);
}
