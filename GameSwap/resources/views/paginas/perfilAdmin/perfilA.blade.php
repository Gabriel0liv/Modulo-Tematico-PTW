<x-layout>


    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <div class="container mx-auto py-8 px-6 max-w-4xl">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Gerir Perfil</h1>
                </div>

                <!-- Personal Information -->
                <div class="rounded-lg border bg-card text-card-foreground shadow-card mb-6">
                    <div class="flex flex-row items-center justify-between p-6 pb-2 relative">
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Informações Pessoais</h3>

                    </div>
                    <div class="p-6 pt-0">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-500 mb-1 block">Username</label>
                                <p class="text-gray-800">{{ Auth::user()->username }}</p>

                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 mb-1 block">Nome Completo</label>
                                <p class="text-gray-800">{{ Auth::user()->name }}</p>

                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 mb-1 block">Data de Nascimento</label>
                                <p class="text-gray-800">{{ Auth::user()->dataNascimento }}</p>

                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 mb-1 block">Telemóvel</label>
                                <p class="text-gray-800">{{ Auth::user()->contato }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="rounded-lg border bg-card text-card-foreground shadow-card mb-6">
                    <div class="flex flex-row items-center justify-between p-6 pb-2 relative">
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Endereço de email</h3>

                    </div>
                    <div class="p-6 pt-0">
                        <label class="text-sm font-medium text-gray-500 mb-1 block">Email Principal</label>
                        <p class="text-gray-800">{{ Auth::user()->email }}</p>

                    </div>
                </div>

                <!-- Password -->
                <div class="rounded-lg border bg-card text-card-foreground shadow-card mb-6">
                    <div class="flex flex-row items-center justify-between p-6 pb-2 relative">
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Palavra-Passe</h3>

                    </div>
                    <div class="p-6 pt-0">
                        <div class="flex items-center">
                            <label class="text-sm font-medium text-gray-500 mr-2">Palavra-Passe:</label>
                            <div class="flex items-center bg-gray-100 rounded px-3 py-2">
                                <span class="text-gray-800 mr-2">••••••••</span>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Accont -->
                <div class="rounded-lg border border-destructive/20 bg-destructive/5 text-card-foreground shadow-card mb-6">
                    <div class="flex flex-row items-center justify-between p-6 pb-2">
                        <h3 class="text-lg font-semibold leading-none tracking-tight text-destructive">Editar perfil</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-gray-600 mb-4">
                            Nesta área você poderá editar as informações do seu perfil.
                        </p>
                        <a href="{{route('editarPerfil')}}" id="abrir-editar-modal" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-red-50 border border-gray-200 hover:border-gray-300 text-gray-600 hover:text-gray-700 h-10 px-4 py-2">
                            Editar Informações
                        </a>
                    </div>
                </div>

                <!-- Cancel Account -->
                <div class="rounded-lg border border-destructive/20 bg-destructive/5 text-card-foreground shadow-card">
                    <div class="flex flex-row items-center justify-between p-6 pb-2">
                        <h3 class="text-lg font-semibold leading-none tracking-tight text-destructive">Cancelar Conta</h3>
                    </div>
                    <div class="p-6 pt-0">

                        <a href="{{route('cancelarConta')}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-red-50 border border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 h-10 px-4 py-2">
                            Cancelar Conta
                        </a>

                    </div>
                </div>
            </div>
        </main>


    </div>
</x-layout>
