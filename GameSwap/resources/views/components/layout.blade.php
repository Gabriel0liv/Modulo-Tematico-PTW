<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="flex flex-col min-h-screen">
  <header class="bg-gradient-to-r from-blue-600 to-blue-500 py-3 px-4 shadow-md">
      <div class="container mx-auto flex items-center justify-between">
          <!-- Logo -->
          <div class="flex items-center">
              <div class="relative flex items-center">
                  <div class="relative mr-2">
                      <div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center shadow-inner">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                              <path d="M6 12H10" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                              <path d="M8 10V14" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                          </svg>

                      </div>
                  </div>
                  <a href="/" class="text-white font-bold text-xl tracking-tight">GAMESWAP</a>
              </div>
          </div>

          <!-- Search Bar -->
          <div class="relative max-w-xl w-full mx-4">
              <input
                  type="text"
                  class="w-full py-2 pl-10 pr-4 rounded-full border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 transition-all"
                  placeholder="Buscar jogos, consoles, acessórios..."
              />
              <div class="absolute inset-y-0 left-3 flex items-center">
                <i class="bi bi-search text-gray-400 text-lg"></i>
              </div>
          </div>

          <!-- Navigation Icons and Anunciar Produto Button -->
          <div class="flex items-center space-x-6">
              <button id='user-profile-btn' class="relative group" aria-label="Perfil">
                  <i class="bi bi-person-circle text-white text-xl"></i>
              </button>
              <!-- User Profile Button (Mobile) -->
              <button id="user-profile-btn-mobile" class="md:hidden p-2 rounded-md text-white hover:bg-primary-500 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
              </button>
              <!-- User Profile Info (Hidden until logged in) -->
              
              <a href="{{route('perfilPage')}}" id="user-profile-info" class="hidden items-center space-x-2">
                  <div class="w-8 h-8 rounded-full bg-primary-300 flex items-center justify-center text-primary-800 font-bold">
                      <span id="user-initials">U</span>
                  </div>
                  <span id="username-display" class="text-white text-sm hidden md:inline-block">Usuário</span>
              </a>
              <a class="relative group" aria-label="Notificações">
                  <i class="bi bi-bell text-white text-xl"></i>

              </a>
              <a href="{{route('mensagensPage')}}" class="relative group" aria-label="Mensagens">
                  <i class="bi bi-chat-dots text-white text-xl"></i>

              </a>
              <a href="{{route('carrinhoPage')}}" class="relative group" aria-label="Carrinho">
                  <i class="bi bi-cart text-white text-xl"></i>

              </a>
              <a href="{{route('anunciarPage')}}"
                 class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium bg-amber-400 hover:bg-amber-500 text-gray-800 px-5 py-2 transition-colors shadow-sm">
                  Anunciar Produto
              </a>
          </div>
      </div>

      <!-- Login Modal -->
      <div id="login-modal" class="modal fixed inset-0 z-50 flex items-center justify-center">
          <div class="modal-content bg-white rounded-xl shadow-elevated max-w-md w-full mx-4 overflow-hidden">
              <div class="p-6">
                  <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Iniciar Sessão</h2>

                  <!-- Error Message -->
                  <div id="login-error" class="error-message bg-red-50 border border-red-200 text-red-600 rounded-lg px-4 py-3 text-sm">
                      <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span id="error-message-text">Nome de usuário ou senha incorretos. Por favor, tente novamente.</span>
                      </div>
                  </div>

                  <form id="login-form">
                      <div class="space-y-4">
                          <div>
                              <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nome de usuário:</label>
                              <input type="text" id="username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Seu nome de usuário">
                          </div>
                          <div>
                              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Palavra passe:</label>
                              <input type="password" id="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                          </div>
                          <div class="text-right">
                              <a href="#" id="forgot-password-link" class="text-sm text-blue-600 hover:text-blue-700">Esqueceu a senha?</a>
                          </div>
                          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg shadow-sm transition-colors">
                              Iniciar Sessão
                          </button>
                          <div class="text-center text-sm text-gray-600">
                              Não tem conta? <a href="#" id="register-link" class="text-blue-600 hover:text-blue-700 font-medium">Registrar</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <!-- Registration Modal -->
      <div id="register-modal" class="modal fixed inset-0 z-50 flex items-center justify-center">
          <div class="modal-content bg-white rounded-xl shadow-elevated max-w-md w-full mx-4 overflow-hidden">
              <div class="p-6">
                  <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Criar Conta</h2>

                  <!-- Error Message -->
                  <div id="register-error" class="error-message bg-red-50 border border-red-200 text-red-600 rounded-lg px-4 py-3 text-sm">
                      <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span id="register-error-text">Por favor, preencha todos os campos obrigatórios.</span>
                      </div>
                  </div>

                  <form id="register-form" class="overflow-y-auto max-h-[60vh]">
                      <div class="space-y-4">
                          <div>
                              <label for="register-name" class="block text-sm font-medium text-gray-700 mb-1">Nome completo: <span class="text-red-500">*</span></label>
                              <input type="text" id="register-name" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Seu nome completo">
                          </div>
                          <div>
                              <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email: <span class="text-red-500">*</span></label>
                              <input type="email" id="register-email" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="seu@email.com">
                          </div>
                          <div>
                              <label for="register-phone" class="block text-sm font-medium text-gray-700 mb-1">Telefone: <span class="text-red-500">*</span></label>
                              <input type="tel" id="register-phone" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="+351 XXX XXX XXX">
                          </div>
                          <div>
                              <label for="register-dob" class="block text-sm font-medium text-gray-700 mb-1">Data de nascimento: <span class="text-red-500">*</span></label>
                              <input type="date" id="register-dob" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                          </div>
                          <div>
                              <label for="register-username" class="block text-sm font-medium text-gray-700 mb-1">Nome de usuário: <span class="text-red-500">*</span></label>
                              <input type="text" id="register-username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Escolha um nome de usuário">
                          </div>
                          <div>
                              <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Senha: <span class="text-red-500">*</span></label>
                              <input type="password" id="register-password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Mínimo 8 caracteres">
                              <p class="text-xs text-gray-500 mt-1">A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números.</p>
                          </div>
                          <div>
                              <label for="register-confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirmar senha: <span class="text-red-500">*</span></label>
                              <input type="password" id="register-confirm-password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                          </div>
                          <div class="flex items-start">
                              <div class="flex items-center h-5">
                                  <input id="terms" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                              </div>
                              <div class="ml-3 text-sm">
                                  <label for="terms" class="font-medium text-gray-700">Aceito os <a href="#" class="text-blue-600 hover:text-blue-700">Termos de Uso</a> e a <a href="#" class="text-blue-600 hover:text-blue-700">Política de Privacidade</a></label>
                              </div>
                          </div>
                          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg shadow-sm transition-colors">
                              Criar Conta
                          </button>
                          <div class="text-center text-sm text-gray-600">
                              Já tem uma conta? <a href="#" id="login-link" class="text-blue-600 hover:text-blue-700 font-medium">Fazer login</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <!-- Password Reset Modal -->
      <div id="reset-password-modal" class="modal fixed inset-0 z-50 flex items-center justify-center">
          <div class="modal-content bg-white rounded-xl shadow-elevated max-w-md w-full mx-4 overflow-hidden">
              <div class="p-6">
                  <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Recuperar Senha</h2>

                  <!-- Error Message -->
                  <div id="reset-error" class="error-message bg-red-50 border border-red-200 text-red-600 rounded-lg px-4 py-3 text-sm">
                      <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span id="reset-error-text">Email não encontrado. Por favor, verifique e tente novamente.</span>
                      </div>
                  </div>

                  <!-- Success Message -->
                  <div id="reset-success" class="success-message bg-green-50 border border-green-200 text-green-600 rounded-lg px-4 py-3 text-sm">
                      <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                          </svg>
                          <span>Email enviado com sucesso! Verifique sua caixa de entrada para redefinir sua senha.</span>
                      </div>
                  </div>

                  <div id="reset-form-container">
                      <p class="text-gray-600 mb-6">Digite seu endereço de email e enviaremos um link para redefinir sua senha.</p>
                      <form id="reset-form">
                          <div class="space-y-4">
                              <div>
                                  <label for="reset-email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                                  <input type="email" id="reset-email" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="seu@email.com">
                              </div>
                              <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg shadow-sm transition-colors">
                                  Enviar Link de Recuperação
                              </button>
                              <div class="text-center text-sm text-gray-600">
                                  <a href="#" id="back-to-login" class="text-blue-600 hover:text-blue-700 font-medium">Voltar para o login</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
</header>

   <main class="container mx-auto py-8 px-4 flex-1">
    {{ $slot }}
   </main>

   <footer class="bg-blue-600 text-white">
    <!-- Seção principal do footer -->
    <div class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Coluna 1: Logo e Sobre -->
        <div class="mb-6 md:mb-0">
          <h2 class="text-2xl font-bold mb-4">GAMESWAP</h2>
          <p class="text-blue-100 mb-4">
            A maior plataforma de compra, venda e troca de jogos e consoles de Portugal.
          </p>
          <div class="flex space-x-4 mt-4">
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497-3.753C20.18 7.773 21.692 5.25 22 4.009z"></path></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
            </a>
          </div>
        </div>

        <!-- Coluna 2: Links Rápidos -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-lg font-semibold mb-4">Links Rápidos</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-blue-100 hover:text-white">Início</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Explorar Consoles</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Ver Jogos</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Como Funciona</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Anunciar Produto</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Assinar Premium</a></li>
          </ul>
        </div>

        <!-- Coluna 3: Categorias -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-lg font-semibold mb-4">Categorias</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-blue-100 hover:text-white">PlayStation 5</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Xbox Series X</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Nintendo Switch</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">PlayStation 4</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Acessórios</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Jogos Retro</a></li>
          </ul>
        </div>

        <!-- Coluna 4: Contato e Newsletter -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Fique por dentro</h3>
          <p class="text-blue-100 mb-4">Receba notificações sobre novos jogos e ofertas especiais.</p>
          <form class="flex flex-col sm:flex-row gap-2">
            <input placeholder="Seu email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-sm" />
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-medium px-4 py-2 rounded-md whitespace-nowrap">
              Inscrever
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Barra inferior com copyright -->
    <div class="bg-blue-700 py-4">
      <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <p class="text-sm text-blue-100 text-center md:text-left">
          &copy; 2025 GAMESWAP. Todos os direitos reservados.
        </p>
        <div class="mt-4 md:mt-0">
          <ul class="flex space-x-6 justify-center">
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Termos de Uso</a></li>
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Política de Privacidade</a></li>
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Ajuda</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

<script>
    // Validações dos formulários
    document.addEventListener('DOMContentLoaded', function () {
        // Validação do formulário de login
        const loginForm = document.getElementById('login-form');
        if (loginForm) {
            loginForm.addEventListener('submit', function (event) {
                let isValid = true;

                const username = document.getElementById('username');
                const password = document.getElementById('password');

                // Validação do nome de usuário
                if (username.value.trim() === '') {
                    alert('O nome de usuário é obrigatório.');
                    username.focus();
                    isValid = false;
                }

                // Validação da senha
                if (password.value.trim() === '') {
                    alert('A senha é obrigatória.');
                    password.focus();
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        }

        // Validação do formulário de registro
        const registerForm = document.getElementById('register-form');
        if (registerForm) {
            registerForm.addEventListener('submit', function (event) {
                let isValid = true;

                const name = document.getElementById('register-name');
                const email = document.getElementById('register-email');
                const phone = document.getElementById('register-phone');
                const dob = document.getElementById('register-dob');
                const username = document.getElementById('register-username');
                const password = document.getElementById('register-password');
                const confirmPassword = document.getElementById('register-confirm-password');
                const terms = document.getElementById('terms');

                // Validação do nome completo
                if (name.value.trim() === '') {
                    alert('O nome completo é obrigatório.');
                    name.focus();
                    isValid = false;
                }

                // Validação do email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email.value.trim() === '') {
                    alert('O email é obrigatório.');
                    email.focus();
                    isValid = false;
                } else if (!emailRegex.test(email.value)) {
                    alert('Insira um email válido.');
                    email.focus();
                    isValid = false;
                }

                // Validação do telefone
                const phoneRegex = /^\+?[0-9\s\-]{9,15}$/;
                if (phone.value.trim() === '') {
                    alert('O telefone é obrigatório.');
                    phone.focus();
                    isValid = false;
                } else if (!phoneRegex.test(phone.value)) {
                    alert('Insira um número de telefone válido.');
                    phone.focus();
                    isValid = false;
                }

                // Validação da data de nascimento
                if (dob.value.trim() === '') {
                    alert('A data de nascimento é obrigatória.');
                    dob.focus();
                    isValid = false;
                }

                // Validação do nome de usuário
                if (username.value.trim() === '') {
                    alert('O nome de usuário é obrigatório.');
                    username.focus();
                    isValid = false;
                }

                // Validação da senha
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
                if (password.value.trim() === '') {
                    alert('A senha é obrigatória.');
                    password.focus();
                    isValid = false;
                } else if (!passwordRegex.test(password.value)) {
                    alert('A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números.');
                    password.focus();
                    isValid = false;
                }

                // Validação da confirmação de senha
                if (confirmPassword.value.trim() === '') {
                    alert('A confirmação de senha é obrigatória.');
                    confirmPassword.focus();
                    isValid = false;
                } else if (password.value !== confirmPassword.value) {
                    alert('As senhas não coincidem.');
                    confirmPassword.focus();
                    isValid = false;
                }

                // Validação dos termos de uso
                if (!terms.checked) {
                    alert('Você deve aceitar os Termos de Uso e a Política de Privacidade.');
                    terms.focus();
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        }

        // Validação do formulário de recuperação de senha
        const resetForm = document.getElementById('reset-form');
        if (resetForm) {
            resetForm.addEventListener('submit', function (event) {
                let isValid = true;

                const email = document.getElementById('reset-email');

                // Validação do email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email.value.trim() === '') {
                    alert('O email é obrigatório.');
                    email.focus();
                    isValid = false;
                } else if (!emailRegex.test(email.value)) {
                    alert('Insira um email válido.');
                    email.focus();
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        }
    });
</script>

</body>
</html>
