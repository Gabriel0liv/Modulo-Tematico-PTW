<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Perfil</h1>

        <form id="editarPerfilForm" action="{{route('user.atualizar')}}" method="post">
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
                <div>
                    <label for="password" class="block text-sm text-gray-600 mb-1">Palavra-Passe:</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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
        });
    </script>
</x-layout>
