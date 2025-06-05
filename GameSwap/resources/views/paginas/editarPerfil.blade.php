<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Perfil</h1>

        <form id="editarPerfilForm" action="{{route('user.atualizar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Informacoes Pessoais -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Informações Pessoais</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="username" class="block text-sm text-gray-600 mb-1">Username</label>
                        <input type="text" id="username" name="username" value="{{Auth::user()->username}}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="error-username" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                    <div>
                        <label for="name" class="block text-sm text-gray-600 mb-1">Nome Completo</label>
                        <input type="text" id="name" name="name" value="{{Auth::user()->name}}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="error-name" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <div>
                        <label for="dataNascimento" class="block text-sm text-gray-600 mb-1">Data de Nascimento</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" value="{{Auth::user()->dataNascimento}}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="error-dob" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <div>
                        <label for="contato" class="block text-sm text-gray-600 mb-1">Telemóvel</label>
                        <input type="tel" id="contato" name="contato" value="{{Auth::user()->contato}}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="error-phone" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>
            </div>

            <!-- Imagem de Perfil -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Imagem de Perfil</h2>

                <div class="flex items-center">
                    <img
                        src="{{ Auth::user()->imagemUser ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl(Auth::user()->imagemUser->imagem_url) : '/placeholder.svg' }}"
                        alt="Imagem de perfil"
                        class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 mr-4">

                    <label for="profileImage" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-700">
                        Alterar Imagem
                    </label>
                    <input
                        type="file"
                        id="profileImage"
                        name="imagem_perfil"
                        accept="image/*"
                        class="hidden">
                </div>

                <p class="text-xs text-gray-500 mt-2">
                    Carregue uma nova imagem de perfil. Apenas formatos JPEG, PNG ou GIF são permitidos (máx. 8 MB).
                </p>
            </div>



            <!-- Email -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Endereço de email</h2>

                <div>
                    <label for="email" class="block text-sm text-gray-600 mb-1">Email Principal</label>
                    <input type="email" id="email" name="email" value="{{Auth::user()->email}}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p id="error-email" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>
            </div>

            <!-- Palavra-Passe -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Palavra-Passe</h2>
                <div class="relative">
                    <label for="password" class="block text-sm text-gray-600 mb-1">Palavra-Passe:</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <!-- Botão para mostrar/ocultar senha -->
                    <button type="button" id="togglePassword"
                            class="absolute top-3/4 transform -translate-y-1/2 right-3 text-gray-600">
                        <!-- Ícone inicial -->
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.944 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Ícone para senha visível (substituído via script) -->
                        <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825a10.405 10.405 0 003.624-2.616c1.394-1.39 2.444-3.08 3.08-4.71m-1.328-5.595a10.457 10.457 0 00-4.26-2.606m-4.605.04c-1.482.315-2.897.97-4.26 2.566C3.732 7.784 2.458 9.548 2.458 12c0 2.452 1.274 4.217 3.042 5.684 1.768 1.467 3.98 2.334 6.5 2.334 1.697 0 3.578-.423 5.217-1.414m-7.86-3.86c0-2.173 1.174-4.248 3.157-5.326" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                        </svg>
                    </button>
                    <p id="error-password" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>
            </div>


            <div class="text-right">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('editarPerfilForm');
            const fields = {
                username: document.getElementById('username'),
                name: document.getElementById('name'),
                email: document.getElementById('email'),
                password: document.getElementById('password'),
                contato: document.getElementById('contato'),
                dataNascimento: document.getElementById('dataNascimento')
            };
            const errors = {
                username: document.getElementById('error-username'),
                name: document.getElementById('error-name'),
                email: document.getElementById('error-email'),
                password: document.getElementById('error-password'),
                contato: document.getElementById('error-phone'),
                dataNascimento: document.getElementById('error-dob')
            };


            async function validateField(name) {
                const field = fields[name];
                const error = errors[name];
                let valid = true;

                if (field.value.trim() === '' && name !== 'password') {
                    valid = true; // Not required
                } else {
                    switch (name) {
                        case 'name':
                            if (/\d/.test(field.value.trim())) {
                                valid = false;
                                error.textContent = 'O nome não pode conter números.';
                            }
                            break;
                        case 'email':
                            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!pattern.test(field.value.trim())) {
                                valid = false;
                                error.textContent = 'Email inválido.';
                            }
                            break;
                        case 'password':
                            if (field.value.length > 0 && field.value.length < 6) {
                                valid = false;
                                error.textContent = 'A senha deve ter pelo menos 6 caracteres.';
                            }
                            break;
                        case 'contato':
                            if (!/^\d{9}$/.test(field.value.trim())) {
                                valid = false;
                                error.textContent = 'O número deve conter exatamente 9 dígitos.';
                            }
                            break;
                        case 'dataNascimento':
                            const dob = new Date(field.value);
                            const hoje = new Date();
                            let idade = hoje.getFullYear() - dob.getFullYear();
                            const m = hoje.getMonth() - dob.getMonth();
                            if (m < 0 || (m === 0 && hoje.getDate() < dob.getDate())) idade--;
                            if (!isNaN(idade) && idade < 18) {
                                valid = false;
                                error.textContent = 'É necessário ter pelo menos 18 anos.';
                            }
                            break;
                        case 'username':
                            const username = field.value.trim();
                            if (username !== "{{ Auth::user()->username }}") {
                                try {
                                    const response = await fetch(`/verificar-username?username=${encodeURIComponent(username)}`);
                                    const data = await response.json();
                                    if (data.exists) {
                                        valid = false;
                                        error.textContent = 'Este username já está em uso.';
                                    }
                                } catch {
                                    valid = false;
                                    error.textContent = 'Erro ao verificar username.';
                                }
                            }
                            break;
                    }
                }

                if (!valid) {
                    field.classList.add('border-red-500');
                    error.classList.remove('hidden');
                } else {
                    field.classList.remove('border-red-500');
                    error.classList.add('hidden');
                }

                return valid;
            }

            form.addEventListener('submit', async (e) => {
                let valid = true;
                for (const name of Object.keys(fields)) {
                    const fieldValid = await validateField(name);
                    if (!fieldValid) valid = false;
                }
                if (!valid) e.preventDefault();
            });

            Object.keys(fields).forEach(name => {
                fields[name].addEventListener('blur', () => validateField(name));
            });


            const passwordField = document.getElementById('password');
            const togglePasswordButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            togglePasswordButton.addEventListener('click', () => {
                // Alterna o estado do campo de senha
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;

                // Alterna os ícones
                eyeIcon.classList.toggle('hidden');
                eyeSlashIcon.classList.toggle('hidden');
            });



        });
    </script>
</x-layout>
