
<x-layout>

    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Perfil</h1>

        <form action="{{route('user.atualizar')}}" method="post">
            @csrf
            <!-- Informações Pessoais -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Informações Pessoais</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="username" class="block text-sm text-gray-600 mb-1">Username</label>
                        <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->username}}" >
                    </div>
                    <div>
                        <label for="name" class="block text-sm text-gray-600 mb-1">Nome Completo</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->name}}" >
                    </div>

                    <div>
                        <label for="dataNascimento" class="block text-sm text-gray-600 mb-1">Data de Nascimento</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->dataNascimento}}">
                    </div>

                    <div>
                        <label for="contato" class="block text-sm text-gray-600 mb-1">Telemóvel</label>
                        <input type="tel" id="contato" name="contato" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->contato}}">
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Endereço de email</h2>

                <div>
                    <label for="email" class="block text-sm text-gray-600 mb-1">Email Principal</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->email}} ">
                </div>
            </div>

            <!-- Senha -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Palavra-Passe</h2>

                <div>
                    <label for="password" class="block text-sm text-gray-600 mb-1">Palavra-Passe:</label>
                    <div class="relative">
                        <input type="password" id="inputEditPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="">
                        <button type="button" id="mostrarPasswordBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500" onclick="mostrarPassword()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>

                        <script>
                            function mostrarPassword() {
                                if (inputEditPassword && mostrarPasswordBtn) {
                                    if (inputEditPassword.type === "password") {
                                        inputEditPassword.type = "text";
                                    } else {
                                        inputEditPassword.type = "password";
                                    }
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</x-layout>
