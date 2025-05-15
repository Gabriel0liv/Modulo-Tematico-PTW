<x-layout>
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-600 py-4">
            <h2 class="text-center text-white text-2xl font-bold">Criar uma nova conta</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('criarRegisto') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <!-- Informações Pessoais -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 pb-2 border-b border-gray-200">Informações Pessoais</h3>
                </div>

                <div>
                    <label for="register_name" class="block text-gray-700 text-sm font-semibold mb-2">Nome Completo</label>
                    <input type="text" id="register_name" name="register_name"
                           value="{{ old('register_name') }}"
                           class="w-full px-3 py-3 border @error('register_name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="Seu nome completo" required>
                    @error('register_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_username" class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                    <input type="text" id="register_username" name="register_username"
                           value="{{ old('register_username') }}"
                           class="w-full px-3 py-3 border @error('register_username') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="Username" required>
                    @error('register_username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="register_email" name="register_email"
                           value="{{ old('register_email') }}"
                           class="w-full px-3 py-3 border @error('register_email') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="seu@email.com" required>
                    @error('register_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>
                    <input type="password" id="register_password" name="register_password"
                           class="w-full px-3 py-3 border @error('register_password') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="********" required>
                    @error('register_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirmar Senha</label>
                    <input type="password" id="register_password_confirmation" name="register_password_confirmation"
                           class="w-full px-3 py-3 border @error('register_password_confirmation') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="********" required>
                    @error('register_password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_phone" class="block text-gray-700 text-sm font-semibold mb-2">Telefone</label>
                    <input type="tel" id="register_phone" name="register_phone"
                           value="{{ old('register_phone') }}"
                           class="w-full px-3 py-3 border @error('register_phone') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="(00) 00000-0000">
                    @error('register_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_dob" class="block text-gray-700 text-sm font-semibold mb-2">Data de Nascimento</label>
                    <input type="date" id="register_dob" name="register_dob"
                           value="{{ old('register_dob') }}"
                           class="w-full px-3 py-3 border @error('register_dob') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    @error('register_dob')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Termos e Condições -->
                <div class="md:col-span-2 mt-4">
                    <div class="flex items-start">
                        <input type="checkbox" id="termos" name="termos"
                               class="h-4 w-4 mt-1 text-blue-600 focus:ring-blue-600 border-gray-300 rounded"
                            {{ old('termos') ? 'checked' : '' }}>
                        <label for="termos" class="ml-2 block text-sm text-gray-700">
                            Eu concordo com os <a href="#" class="text-blue-600 hover:underline">Termos de Serviço</a> e
                            <a href="#" class="text-blue-600 hover:underline">Política de Privacidade</a>.
                        </label>
                    </div>
                    @error('termos')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botão de Registro -->
                <div class="md:col-span-2 mt-6">
                    <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-4 rounded-md transition duration-300 shadow-md">
                        Criar Conta
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">Já tem uma conta?
                    <a href="{{ route('loginPage') }}" class="text-blue-600 font-semibold hover:underline">Faça login</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
