<div id="login-modal" class="modal fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-content bg-white rounded-xl shadow-elevated max-w-md w-full mx-4 overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Iniciar Sessão</h2>

            <!-- Error Message
            <div id="login-error" class="error-message bg-red-50 border border-red-200 text-red-600 rounded-lg px-4 py-3 text-sm">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span id="error-message-text">Nome de usuário ou senha incorretos. Por favor, tente novamente.</span>
                </div>
            </div>-->

            <form id="login-form" action="{{route('login')}}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nome de usuário:</label>
                        <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Seu nome de usuário">
                        @error('username')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Palavra passe:</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('password')
                        <div class="error">{{ $message }}</div>
                        @enderror
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
