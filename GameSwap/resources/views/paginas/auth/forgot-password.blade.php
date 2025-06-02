<x-layout>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-600 py-4">
            <h2 class="text-center text-white text-2xl font-bold">Enviar email</h2>
        </div>
        <div class="p-6">
            <form id="loginForm" action="{{ route('password.email') }}" method="POST" novalidate>
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">email</label>
                    <input type="text" id="email" name="email" value=""
                           class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="email">
                    <p id="error-email" class="text-red-600 text-sm mt-1 hidden"></p>
                </div>

                <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-4 rounded-md transition duration-300 shadow-md">
                    Enviar link de redefinição
                </button>
            </form>
            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
            @endif

            <div class="mt-6 text-center">
                <p class="text-gray-600">Não tem uma conta?
                    <a href="{{ route('registoPage') }}" class="text-blue-600 font-semibold hover:underline">Registe-se</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('loginForm');
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const errorUsername = document.getElementById('error-username');
            const errorPassword = document.getElementById('error-password');

            let touched = {
                username: false,
                password: false
            };

            function validateField(field, errorEl, message, condition = true) {
                const value = field.value.trim();
                if (!value || !condition) {
                    field.classList.add('border-red-500');
                    errorEl.textContent = message;
                    errorEl.classList.remove('hidden');
                    return false;
                } else {
                    field.classList.remove('border-red-500');
                    errorEl.classList.add('hidden');
                    return true;
                }
            }

            username.addEventListener('blur', () => {
                touched.username = true;
                validateField(username, errorUsername, "Insira o seu username.");
            });

            password.addEventListener('blur', () => {
                touched.password = true;
                validateField(password, errorPassword, "A senha deve ter pelo menos 6 caracteres.", password.value.length >= 6);
            });

            form.addEventListener('submit', (e) => {
                touched.username = touched.password = true;

                const validUsername = validateField(username, errorUsername, "Insira o seu username.");
                const validPassword = validateField(password, errorPassword, "A senha deve ter pelo menos 6 caracteres.", password.value.length >= 6);

                if (!validUsername || !validPassword) {
                    e.preventDefault();
                }
            });
        });
    </script>
</x-layout>
