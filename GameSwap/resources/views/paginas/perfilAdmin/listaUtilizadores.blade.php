<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">
        <x-perfilAdminSideBar></x-perfilAdminSideBar>

        <main id="lista-utilizadores" class="mb-10 flex-1 w-full overflow-auto container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Lista de Utilizadores</h2>
                <div class="flex space-x-2">
                    <button id="utilizadoresAtivosBtn" class="bg-blue-600 text-white px-4 py-2 rounded-md" onclick="mostrar('ativos', this)">Ativos</button>
                    <button id="utilizadoresInativosBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md" onclick="mostrar('inativos', this)">Inativos</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md">
                <div class="overflow-x-auto">
                    <div id="ativos" class="utilizadores">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <x-ListaUtilizadores.utilizadoresAtivos :users="$ativos" />
                            </tbody>
                        </table>
                    </div>

                    <div id="inativos" class="utilizadores hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <x-ListaUtilizadores.utilizadoresInativos :users="$inativos" />
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                {{ $ativos->links() }}
                {{ $inativos->links() }}
            </div>
        </main>
    </div>

    <script>
        function mostrar(tipo, botao) {
            document.querySelectorAll('.utilizadores').forEach(div => div.classList.add('hidden'));
            document.getElementById(tipo).classList.remove('hidden');

            document.querySelectorAll('.flex .space-x-2 button').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-800');
            });

            botao.classList.remove('bg-gray-200', 'text-gray-800');
            botao.classList.add('bg-blue-600', 'text-white');
        }

        document.addEventListener('DOMContentLoaded', () => {
            mostrar('ativos', document.getElementById('utilizadoresAtivosBtn'));
        });
    </script>
</x-layout>
