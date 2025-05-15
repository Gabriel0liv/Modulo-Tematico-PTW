// DOM Elements
const loginModal = document.getElementById("login-modal");
const registerModal = document.getElementById("register-modal");
const resetPasswordModal = document.getElementById("reset-password-modal");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const resetForm = document.getElementById("reset-form");
const userProfileBtn = document.getElementById("user-profile-btn");
const userProfileBtnMobile = document.getElementById("user-profile-btn-mobile");
const anunciarButton = document.getElementById("anunciar-button");
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
anunciarButton.addEventListener("click", () => showModal(loginModal));
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

//JavaScript para moradas
document.addEventListener("DOMContentLoaded", function () {
    mostrarMoradas();

    const botaoAdicionar = document.getElementById("addAdressBtn");
    if (botaoAdicionar) {
        botaoAdicionar.addEventListener("click", criarFormularioMorada);
    }
});

function criarFormularioMorada() {
    const container = document.getElementById("moradaFormContainer");

    const form = document.createElement("div");
    form.className = "rounded-lg border border-primary/50 bg-primary-light/30 text-card-foreground shadow-card p-6 space-y-4";

    form.innerHTML = `
        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="addressTitleInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Ex: Casa">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Morada</label>
            <input type="text" id="streetInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Ex: Rua das Flores, nº 10">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Código Postal</label>
            <input type="text" id="addressInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Ex: 4000-123 Vila Nova de Gaia, Porto">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Código Postal</label>
            <input type="text" id="postalCodeInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Ex: 4000-123">
        </div>
        <div class="flex justify-end gap-2">
            <button class="text-sm font-medium px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300" onclick="this.closest('div').remove()">Cancelar</button>
            <button class="text-sm font-medium px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-hover" onclick="guardarMorada()">Guardar Morada</button>
        </div>
    `;

    container.appendChild(form);
}

function guardarMorada() {
    const container = document.getElementById("moradaFormContainer");
    const titulo = document.getElementById('addressTitleInput').value;
    const rua = document.getElementById('streetInput').value;
    const morada = document.getElementById('addressInput').value;
    const codigoPostal = document.getElementById('postalCodeInput').value;

    if (!titulo || !rua || !morada || !codigoPostal) {
        alert("Por favor preencha todos os campos.");
        return;
    }

    const novaMorada = { titulo, rua , morada, codigoPostal };

    let moradas = JSON.parse(localStorage.getItem('moradas')) || [];
    moradas.push(novaMorada);
    localStorage.setItem('moradas', JSON.stringify(moradas));

    mostrarMoradas();

    container.innerHTML = ''; // Limpa o formulário após guardar
}

function mostrarMoradas() {
    const moradas = JSON.parse(localStorage.getItem('moradas')) || [];
    const divMoradas = document.getElementById('moradas-guardadas');
    if (!divMoradas) return;

    divMoradas.innerHTML = '';

    moradas.forEach((morada, index) => {
        const item = document.createElement('div');
        item.className = 'morada-item';
        item.innerHTML = `
            <div class="rounded-lg border border-primary/50 bg-primary-light/30 text-card-foreground shadow-card">
            <div class="flex flex-row items-center justify-between p-6 pb-2">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <!-- Titulo Morada -->
                <h3 id="addressTitle" class="text-lg font-semibold leading-none tracking-tight">${morada.titulo}</h3>
                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors border-transparent bg-primary text-primary-foreground ml-3">
                  Principal
                </span>
              </div>
              <div class="flex items-center gap-2">
                <!-- Edit Button -->
                <button id="editAdressBtn" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-gray-500 bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </button>
                <!-- Delete Button -->
                <button id="deleteAdressBtn" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0" onclick="removerMorada()">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="p-6 pt-0">
              <!-- Morada -->
              <div class="space-y-1 text-gray-700">
                <p id="streetField">${morada.rua}</p>
                <p id="adressField">${morada.morada}</p>
                <p id="postalField">${morada.codigoPostal}</p>
              </div>
            </div>
          </div>
        `;
        divMoradas.appendChild(item);
    });
}

function removerMorada(index) {
    let moradas = JSON.parse(localStorage.getItem('moradas')) || [];
    moradas.splice(index, 1);
    localStorage.setItem('moradas', JSON.stringify(moradas));
    mostrarMoradas();
}

// Script para os componentes da pagina aprovar
const divAnunciosAprovarAnuncios = document.getElementById(divAnunciosAprovarAnuncios);
const todosAnunciosBtn = document.getElementById("todosAnunciosBtn");
const anunciosPendentesBtn = document.getElementById("anunciosPendentesBtn");
const anunciosAprovadosBtn = document.getElementById("anunciosAprovadosBtn");
const anunciosRejeitadosBtn = document.getElementById("anunciosRejeitadosBtn");

// Funções para alterar o conteúdo da divAnunciosAprovarAnuncios
function mostrarTodosAnuncios() {
    divAnunciosAprovarAnuncios.innerHTML = "<x-AprovarAnuncios_anuncios.todosAnuncios :produtos=\"$produtos\" />";
}

function mostrarAnunciosPendentes() {
    divAnunciosAprovarAnuncios.innerHTML = "<x-AprovarAnuncios_anuncios.anunciosPendentes :produtos=\"$produtos\" />";
}

function mostrarAnunciosAprovados() {
    divAnunciosAprovarAnuncios.innerHTML = "<x-AprovarAnuncios_anuncios.anunciosAprovados :produtos=\"$produtos\" />"
    }

function mostrarAnunciosRejeitados() {
    divAnunciosAprovarAnuncios.innerHTML = "<x-AprovarAnuncios_anuncios.anunciosReprovados :produtos=\"$produtos\" />";
}

// Adicionando eventos aos botões
todosAnunciosBtn.addEventListener("click", mostrarTodosAnuncios);
anunciosAprovadosBtn.addEventListener("click", mostrarAnunciosAprovados);
anunciosPendentesBtn.addEventListener("click", mostrarAnunciosPendentes);
anunciosRejeitadosBtn.addEventListener("click", mostrarAnunciosRejeitados);
