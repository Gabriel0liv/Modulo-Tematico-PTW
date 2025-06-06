<x-layout>
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-600 py-4">
            <h2 class="text-center text-white text-2xl font-bold">Criar uma nova conta</h2>
        </div>
        <div class="p-6">
            <form id="registerForm" action="{{ route('criarRegisto') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 pb-2 border-b border-gray-200">Informações Pessoais</h3>
                </div>

                <div>
                    <label for="register_name" class="block text-gray-700 text-sm font-semibold mb-2">Nome Completo</label>
                    <input type="text" id="register_name" name="register_name" value="{{ old('register_name') }}" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Seu nome completo">
                    <p id="error-name" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div>
                    <label for="register_username" class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                    <input type="text" id="register_username" name="register_username" value="{{ old('register_username') }}" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Username">
                    <p id="error-username" class="text-red-500 text-sm mt-1 hidden">Este username já está em uso.</p>
                </div>

                <div>
                    <label for="register_email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="register_email" name="register_email" value="{{ old('register_email') }}" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="seu@email.com">
                    <p id="error-email" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div>
                    <label for="register_password" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>
                    <input type="password" id="register_password" name="register_password" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="********">
                    <p id="error-password" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div>
                    <label for="register_password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirmar Senha</label>
                    <input type="password" id="register_password_confirmation" name="register_password_confirmation" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="********">
                    <p id="error-confirm-password" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div>
                    <label for="register_phone" class="block text-gray-700 text-sm font-semibold mb-2">Telefone</label>
                    <input type="tel" id="register_phone" name="register_phone" value="{{ old('register_phone') }}"class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="900000000">
                    <p id="error-phone" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div>
                    <label for="register_dob" class="block text-gray-700 text-sm font-semibold mb-2">Data de Nascimento</label>
                    <input type="date" id="register_dob" name="register_dob" value="{{ old('register_dop') }}"class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <p id="error-dob" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div class="md:col-span-2 mt-4">
                    <div class="flex items-start">
                        <input type="checkbox" id="termos" name="termos" value="1" {{ old('termos') ? 'checked' : '' }} class="h-4 w-4 mt-1 text-blue-600 focus:ring-blue-600 border-gray-300 rounded">
                        <label for="termos" class="ml-2 block text-sm text-gray-700">
                            Eu concordo com os <a href="{{route('termos')}}" class="text-blue-600 hover:underline">Termos de Serviço</a> e
                            <a href="{{route('privacidade')}}" class="text-blue-600 hover:underline">Política de Privacidade</a>.
                        </label>
                    </div>
                    <p id="error-termos" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div class="md:col-span-2 mt-6">
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-4 rounded-md transition duration-300 shadow-md">
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registerForm');
            const fields = {
                name: document.getElementById('register_name'),
                username: document.getElementById('register_username'),
                email: document.getElementById('register_email'),
                password: document.getElementById('register_password'),
                confirmPassword: document.getElementById('register_password_confirmation'),
                phone: document.getElementById('register_phone'),
                dob: document.getElementById('register_dob'),
                termos: document.getElementById('termos')
            };

            const errors = {
                name: document.getElementById('error-name'),
                username: document.getElementById('error-username'),
                email: document.getElementById('error-email'),
                password: document.getElementById('error-password'),
                confirmPassword: document.getElementById('error-confirm-password'),
                phone: document.getElementById('error-phone'),
                dob: document.getElementById('error-dob'),
                termos: document.getElementById('error-termos')
            };

            const touched = {};
            Object.keys(fields).forEach(key => touched[key] = false);

            const validateField = async (name) => {
                const field = fields[name];
                const error = errors[name];
                let valid = true;

                if ((name !== 'termos') && field.value.trim() === '') {
                    valid = false;
                    error.textContent = "Este campo é obrigatório.";
                } else {
                    switch (name) {
                        case 'name':
                            if (/\d/.test(field.value.trim())) {
                                valid = false;
                                error.textContent = "O nome não pode conter números.";
                            }
                            break;
                        case 'username':
                            const username = field.value.trim();
                            if (username.length > 0) {
                                try {
                                    const response = await fetch(`/verificar-username?username=${encodeURIComponent(username)}`);
                                    const data = await response.json();
                                    if (data.exists) {
                                        valid = false;
                                        error.textContent = "Este username já está em uso.";
                                    }
                                } catch {
                                    valid = false;
                                    error.textContent = "Erro ao verificar username.";
                                }
                            }
                            break;
                        case 'email':
                            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!pattern.test(field.value.trim())) {
                                valid = false;
                                error.textContent = "Email inválido.";
                            }
                            break;
                        case 'password':
                            if (field.value.length < 6) {
                                valid = false;
                                error.textContent = "A senha deve ter pelo menos 6 caracteres.";
                            }
                            break;
                        case 'confirmPassword':
                            if (field.value !== fields.password.value) {
                                valid = false;
                                error.textContent = "As senhas não coincidem.";
                            }
                            break;
                        case 'phone':
                            if (!/^\d{9}$/.test(field.value.trim())) {
                                valid = false;
                                error.textContent = "O número deve conter exatamente 9 dígitos.";
                            }
                            break;
                        case 'dob':
                            const dob = new Date(field.value);
                            const hoje = new Date();
                            let idade = hoje.getFullYear() - dob.getFullYear();
                            const m = hoje.getMonth() - dob.getMonth();
                            if (m < 0 || (m === 0 && hoje.getDate() < dob.getDate())) idade--;
                            if (isNaN(idade) || idade < 18) {
                                valid = false;
                                error.textContent = "É necessário ter pelo menos 18 anos.";
                            }
                            break;
                        case 'termos':
                            if (!field.checked) {
                                valid = false;
                                error.textContent = "É necessário aceitar os termos.";
                            }
                            break;
                    }
                }

                if (!valid && touched[name]) {
                    field.classList.add('border-red-500');
                    error.classList.remove('hidden');
                } else {
                    field.classList.remove('border-red-500');
                    error.classList.add('hidden');
                }

                return valid;
            };

            Object.keys(fields).forEach(name => {
                const event = name === 'termos' ? 'change' : 'blur';
                fields[name].addEventListener(event, () => {
                    touched[name] = true;
                    validateField(name);
                });
            });

            form.addEventListener('submit', async (e) => {
                let isValid = true;
                for (const name of Object.keys(fields)) {
                    touched[name] = true;
                    const fieldValid = await validateField(name);
                    if (!fieldValid) isValid = false;
                }
                if (!isValid) e.preventDefault();
            });
        });
    </script>

</x-layout>
