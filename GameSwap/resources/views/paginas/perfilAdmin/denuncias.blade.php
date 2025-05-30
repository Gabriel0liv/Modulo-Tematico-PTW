<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main id="resolver-denuncias" class="mb-10">
            <div class=" flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Denúncias</h2>
                <div class="flex space-x-2">
                    <button id="denunciasPendentesBtn" class="bg-blue-600 text-white px-4 py-2 rounded-md" onclick="mostrar('pendentes', this)">Pendentes</button>
                    <button id="denunciasAprovadasBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md" onclick="mostrar('resolvidas', this)">Resolvidas</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div id="pendentes" class="denuncias">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <x-AprovarDenuncias_denuncias.denunciasPendentes :denuncias="$denuncias" />
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div id="resolvidas" class="denuncias hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <x-AprovarDenuncias_denuncias.denunciasResolvidas :denuncias="$denuncias" />
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function mostrar(tipo, botao) {
            document.querySelectorAll('.denuncias').forEach(div => div.classList.add('hidden'));
            document.getElementById(tipo).classList.remove('hidden');

            document.querySelectorAll('.flex .space-x-2 button').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-800');
            });

            botao.classList.remove('bg-gray-200', 'text-gray-800');
            botao.classList.add('bg-blue-600', 'text-white');
        }

        document.addEventListener('DOMContentLoaded', () => {
            mostrar('pendentes', document.getElementById('denunciasPendentesBtn'));
        });
    </script>
</x-layout>
