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