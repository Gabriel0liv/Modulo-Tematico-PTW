
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <div class="relative flex items-center">
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
            <div class="relative group">
                <button id="notificationBtn" class="relative group z-50" aria-label="Notificações">
                    <i class="bi bi-bell text-white text-xl"></i>
                </button>
                <!-- notification modal -->
                <div id="notificationModal" class="modal absolute top-full left-1/2 -translate-x-1/2 mt-2 w-64 bg-white shadow-lg rounded-lg p-4 z-40 active">
                      <p>Sem novas notificações.</p>
                </div>
            </div>
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
    <x-Auth.login>
    </x-Auth.login>

    <!-- Registration Modal -->
    <x-Auth.registo>
    </x-Auth.registo>

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

