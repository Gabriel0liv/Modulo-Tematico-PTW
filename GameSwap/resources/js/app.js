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
    const confirmPassword = document
        .getElementById("register-confirm-password");
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
    document.addEventListener('DOMContentLoaded', function() {
        const priceSliders = document.querySelectorAll('.price-slider');

        priceSliders.forEach(slider => {
            slider.addEventListener('input', function() {
                const value = this.value;
                const min = this.min ? this.min : 0;
                const max = this.max ? this.max : 100;
                const percentage = ((value - min) * 100) / (max - min);

                this.style.background = `linear-gradient(to right, #2563EB ${percentage}%, #e5e7eb ${percentage}%)`;
            });

            // Trigger the input event to set initial gradient
            const event = new Event('input');
            slider.dispatchEvent(event);
        });

        // Custom checkbox functionality
        const checkboxes = document.querySelectorAll('.custom-checkbox input');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Additional functionality can be added here if needed
            });
        });
    });
}

// Validações ANUNCIAR PRODUTO
const form = document.getElementById("formPublicar"); // Seleciona o formulário principal
const productName = document.getElementById("product-name"); // Campo do nome do produto
const productPrice = document.getElementById("product-price"); // Campo do preço do produto
const gameCategory = document.getElementById("game-category"); // Campo da categoria do jogo
const productDescription = document.getElementById("product-description"); // Campo da descrição do produto
const consoleType = document.getElementById("console-type"); // Campo do tipo de console

// Adiciona um evento de validação ao enviar o formulário
form.addEventListener("submit", function (event) {
    let isValid = true; // Flag para rastrear se o formulário é válido

    // Validação do nome do produto
    if (productName.value.trim() === "") {
        alert("O nome do produto é obrigatório.");
        productName.focus();
        isValid = false;
    } else if (productName.value.length < 3) {
        alert("O nome do produto deve ter pelo menos 3 caracteres.");
        productName.focus();
        isValid = false;
    }

    // Validação do preço do produto
    if (productPrice.value.trim() === "") {
        alert("O preço do produto é obrigatório.");
        productPrice.focus();
        isValid = false;
    } else if (
        isNaN(productPrice.value) ||
        parseFloat(productPrice.value) <= 0
    ) {
        alert("Insira um preço válido maior que zero.");
        productPrice.focus();
        isValid = false;
    }

    // Validação da categoria do jogo
    if (gameCategory.value === "") {
        alert("Selecione uma categoria de jogo.");
        gameCategory.focus();
        isValid = false;
    }

    // Validação da descrição do produto
    if (productDescription.value.trim() === "") {
        alert("A descrição do produto é obrigatória.");
        productDescription.focus();
        isValid = false;
    } else if (productDescription.value.length > 1000) {
        alert("A descrição do produto não pode exceder 1000 caracteres.");
        productDescription.focus();
        isValid = false;
    }

    // Validação do tipo de console
    if (consoleType.value === "") {
        alert("Selecione um tipo de console.");
        consoleType.focus();
        isValid = false;
    }

    // Impede o envio do formulário se alguma validação falhar
    if (!isValid) {
        event.preventDefault();
    }
});

// Validação em tempo real para o campo de preço (apenas números e ponto decimal)
productPrice.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9.]/g, ""); // Remove caracteres inválidos
});

// Validação em tempo real para o campo de descrição (limite de caracteres)
productDescription.addEventListener("input", function () {
    const count = this.value.length;
    const charCount = document.getElementById("char-count");
    charCount.textContent = count;

    if (count > 1000) {
        charCount.classList.add("text-red-500", "font-bold");
    } else {
        charCount.classList.remove("text-red-500", "font-bold");
    }
});

// Character counter for description
const descriptionField = document.getElementById("product-description");
const charCount = document.getElementById("char-count");

descriptionField.addEventListener("input", function () {
    const count = this.value.length;
    charCount.textContent = count;

    if (count > 1000) {
        charCount.classList.add("text-red-500");
        charCount.classList.add("font-bold");
    } else {
        charCount.classList.remove("text-red-500");
        charCount.classList.remove("font-bold");
    }
});

// Make the file upload areas clickable
document.querySelectorAll(".photo-upload").forEach((area) => {
    area.addEventListener("click", () => {
        area.querySelector('input[type="file"]').click();
    });

    const fileInput = area.querySelector('input[type="file"]');
    fileInput.addEventListener("change", (e) => {
        if (e.target.files.length > 0) {
            // Show preview of the image
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function (event) {
                // Replace the icon with the image preview
                const isMain = area.querySelector(".top-2") !== null;
                let mainTag = "";

                if (isMain) {
                    mainTag = `<div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                    Principal
                  </div>`;
                }

                area.innerHTML = `
                  <div class="relative w-full h-full">
                    ${mainTag}
                    <img src="${event.target.result}" class="w-full h-full object-cover rounded-lg" />
                    <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-md remove-image">
                      <i data-lucide="x" class="h-4 w-4 text-gray-500"></i>
                    </button>
                    <input type="file" class="hidden" accept="image/*" />
                  </div>
                `;

                // Re-initialize icons
                lucide.createIcons();

                // Add event listener to remove button
                area.querySelector(".remove-image").addEventListener(
                    "click",
                    (e) => {
                        e.stopPropagation();

                        // Restore original content
                        if (isMain) {
                            area.innerHTML = `
                      <div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                        Principal
                      </div>
                      <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                      <span class="text-sm text-gray-500">Adicionar foto principal</span>
                      <input type="file" class="hidden" accept="image/*" />
                    `;
                        } else {
                            area.innerHTML = `
                      <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                      <span class="text-sm text-gray-500">Adicionar foto</span>
                      <input type="file" class="hidden" accept="image/*" />
                    `;
                        }

                        lucide.createIcons();

                        // Re-add click event to the area
                        area.addEventListener("click", () => {
                            area.querySelector('input[type="file"]').click();
                        });
                    }
                );
            };

            reader.readAsDataURL(file);
        }
    });
});

//validações pagamento de subscrição 1º etapa

const formPay1 = document.getElementById("formPay1"); // Seleciona o formulário principal
const nameField = document.getElementById("name"); // Campo do nome completo
const emailField = document.getElementById("email"); // Campo do email
const addressField = document.getElementById("address"); // Campo do endereço
const cityField = document.getElementById("city"); // Campo da cidade
const zipCodeField = document.getElementById("zipCode"); // Campo do CEP

// Adiciona um evento de validação ao enviar o formulário
formPay1.addEventListener("submit", function (event) {
    let isValid = true; // Flag para rastrear se o formulário é válido

    alert("oi");
    // Validação do nome completo
    if (nameField.value.trim() === "") {
        alert("O nome completo é obrigatório.");
        nameField.focus();
        isValid = false;
    } else if (nameField.value.length < 3) {
        alert("O nome completo deve ter pelo menos 3 caracteres.");
        nameField.focus();
        isValid = false;
    }

    // Validação do email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex para validar email
    if (emailField.value.trim() === "") {
        alert("O email é obrigatório.");
        emailField.focus();
        isValid = false;
    } else if (!emailRegex.test(emailField.value)) {
        alert("Insira um email válido.");
        emailField.focus();
        isValid = false;
    }

    // Validação do endereço
    if (addressField.value.trim() === "") {
        alert("O endereço é obrigatório.");
        addressField.focus();
        isValid = false;
    } else if (addressField.value.length < 5) {
        alert("O endereço deve ter pelo menos 5 caracteres.");
        addressField.focus();
        isValid = false;
    }

    // Validação da cidade
    if (cityField.value.trim() === "") {
        alert("A cidade é obrigatória.");
        cityField.focus();
        isValid = false;
    }

    // Validação do CEP
    const zipCodeRegex = /^[0-9]{5}-?[0-9]{3}$/; // Regex para validar CEP (formato 12345-678 ou 12345678)
    if (zipCodeField.value.trim() === "") {
        alert("O CEP é obrigatório.");
        zipCodeField.focus();
        isValid = false;
    } else if (!zipCodeRegex.test(zipCodeField.value)) {
        // Verifica se o CEP está no formato correto
        alert("Insira um CEP válido no formato 12345-678.");
        zipCodeField.focus();
        isValid = false;
    }

    // Impede o envio do formulário se alguma validação falhar
    if (!isValid) {
        event.preventDefault();
    } else {
        // Redireciona para a próxima página se o formulário for válido

        window.location.href = "{{route('assinatura-2')}}"; // Substitua pela rota da próxima página
    }
});

// Validação em tempo real para o campo de email
emailField.addEventListener("input", function () {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailField.value)) {
        emailField.classList.add("border-red-500"); // Adiciona uma borda vermelha se o email for inválido
    } else {
        emailField.classList.remove("border-red-500"); // Remove a borda vermelha se o email for válido
    }
});

// Validação em tempo real para o campo de CEP
zipCodeField.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9-]/g, ""); // Permite apenas números e o caractere "-"
});

//validações pagamento de subscrição 2º etapa

const formPay2 = document.getElementById("formPay2"); // Seleciona o formulário principal
const cardNumberField = document.getElementById("cardNumber"); // Campo do número do cartão
const expiryDateField = document.getElementById("expiryDate"); // Campo da data de validade
const cvvField = document.getElementById("cvv"); // Campo do CVV

// Adiciona um evento de validação ao enviar o formulário
formPay2.addEventListener("submit", function (event) {
    let isValid = true; // Flag para rastrear se o formulário é válido

    // Validação do número do cartão
    const cardNumberRegex = /^[0-9]{16}$/; // Regex para validar 16 dígitos
    const cardNumberValue = cardNumberField.value.replace(/\s+/g, ""); // Remove espaços
    if (cardNumberValue === "") {
        alert("O número do cartão é obrigatório.");
        cardNumberField.focus();
        isValid = false;
    } else if (!cardNumberRegex.test(cardNumberValue)) {
        alert("Insira um número de cartão válido com 16 dígitos.");
        cardNumberField.focus();
        isValid = false;
    }

    // Validação da data de validade
    const expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/; // Regex para validar formato MM/AA
    const expiryDateValue = expiryDateField.value.trim(); // Remove espaços extras
    if (expiryDateValue === "") {
        alert("A data de validade é obrigatória.");
        expiryDateField.focus();
        isValid = false;
    } else if (!expiryDateRegex.test(expiryDateValue)) {
        alert("Insira uma data de validade válida no formato MM/AA.");
        expiryDateField.focus();
        isValid = false;
    } else {
        // Verifica se a data de validade não está no passado
        const [month, year] = expiryDateValue.split("/");
        const currentDate = new Date();
        const expiryDate = new Date(`20${year}`, month - 1); // Converte para formato de data
        if (expiryDate < currentDate) {
            alert("A data de validade não pode estar no passado.");
            expiryDateField.focus();
            isValid = false;
        }
    }

    // Validação do CVV
    const cvvRegex = /^[0-9]{3}$/; // Regex para validar 3 dígitos
    const cvvValue = cvvField.value.trim(); // Remove espaços extras
    if (cvvValue === "") {
        alert("O CVV é obrigatório.");
        cvvField.focus();
        isValid = false;
    } else if (!cvvRegex.test(cvvValue)) {
        alert("Insira um CVV válido com 3 dígitos.");
        cvvField.focus();
        isValid = false;
    }

    // Impede o envio do formulário se alguma validação falhar
    if (!isValid) {
        event.preventDefault(); // Bloqueia o envio do formulário
    } else {
        console.log("Formulário enviado com sucesso!");
    }
});

// Validação em tempo real para o campo do número do cartão
cardNumberField.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ""); // Permite apenas números
    if (this.value.length > 16) {
        this.value = this.value.slice(0, 16); // Limita a 16 dígitos
    }
});

// Validação em tempo real para o campo da data de validade
expiryDateField.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9/]/g, ""); // Permite apenas números e "/"
    if (this.value.length > 5) {
        this.value = this.value.slice(0, 5); // Limita ao formato MM/AA
    }
});

// Validação em tempo real para o campo do CVV
cvvField.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ""); // Permite apenas números
    if (this.value.length > 3) {
        this.value = this.value.slice(0, 3); // Limita a 3 dígitos
    }
});

// validação do registro
/*
if (registerForm) {
    registerForm.addEventListener("submit", function (event) {
        let isValid = true;

        const name = document.getElementById("register-name");
        const email = document.getElementById("register-email");
        const phone = document.getElementById("register-phone");
        const dob = document.getElementById("register-dob");
        const username = document.getElementById("register-username");
        const password = document.getElementById("register-password");
        const confirmPassword = document.getElementById(
            "register-confirm-password"
        );
        const terms = document.getElementById("terms");

        // Validação do nome completo
        if (name.value.trim() === "") {
            alert("O nome completo é obrigatório.");
            name.focus();
            isValid = false;
        }

        // Validação do email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.value.trim() === "") {
            alert("O email é obrigatório.");
            email.focus();
            isValid = false;
        } else if (!emailRegex.test(email.value)) {
            alert("Insira um email válido.");
            email.focus();
            isValid = false;
        }

        // Validação do telefone
        const phoneRegex = /^\+?[0-9\s\-]{9,15}$/;
        if (phone.value.trim() === "") {
            alert("O telefone é obrigatório.");
            phone.focus();
            isValid = false;
        } else if (!phoneRegex.test(phone.value)) {
            alert("Insira um número de telefone válido.");
            phone.focus();
            isValid = false;
        }

        // Validação da data de nascimento
        if (dob.value.trim() === "") {
            alert("A data de nascimento é obrigatória.");
            dob.focus();
            isValid = false;
        }

        // Validação do nome de usuário
        if (username.value.trim() === "") {
            alert("O nome de usuário é obrigatório.");
            username.focus();
            isValid = false;
        }

        // Validação da senha
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (password.value.trim() === "") {
            alert("A senha é obrigatória.");
            password.focus();
            isValid = false;
        } else if (!passwordRegex.test(password.value)) {
            alert(
                "A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números."
            );
            password.focus();
            isValid = false;
        }

        // Validação da confirmação de senha
        if (confirmPassword.value.trim() === "") {
            alert("A confirmação de senha é obrigatória.");
            confirmPassword.focus();
            isValid = false;
        } else if (password.value !== confirmPassword.value) {
            alert("As senhas não coincidem.");
            confirmPassword.focus();
            isValid = false;
        }

        // Validação dos termos de uso
        if (!terms.checked) {
            alert(
                "Você deve aceitar os Termos de Uso e a Política de Privacidade."
            );
            terms.focus();
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
}
*/

// Validação do formulário de recuperação de senha
/*
if (resetForm) {
    resetForm.addEventListener("submit", function (event) {
        let isValid = true;

        const email = document.getElementById("reset-email");

        // Validação do email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.value.trim() === "") {
            alert("O email é obrigatório.");
            email.focus();
            isValid = false;
        } else if (!emailRegex.test(email.value)) {
            alert("Insira um email válido.");
            email.focus();
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
}
*/

