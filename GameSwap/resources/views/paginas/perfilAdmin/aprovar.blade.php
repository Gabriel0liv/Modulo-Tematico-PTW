<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">
        <x-perfilAdminSideBar></x-perfilAdminSideBar>

        <main id="aprovar-anuncios" class="mb-10 flex-1 w-full overflow-auto container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Aprovar Anúncios</h2>
                <div class="flex space-x-2">
                    <button id="anunciosPendentesBtn" class="bg-blue-600 text-white px-4 py-2 rounded-md"
                            onclick="mostrar('pendentes', this)">Pendentes
                    </button>
                    <button id="anunciosAprovadosBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md"
                            onclick="mostrar('aprovados', this)">Aprovados
                    </button>
                    <button id="anunciosRejeitadosBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md"
                            onclick="mostrar('rejeitados', this)">Rejeitados
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md">
                <div class="overflow-x-auto">
                    <div id="pendentes" class="anuncios">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produto
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendedor
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Preço
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <x-AprovarAnuncios_anuncios.anunciosPendentes :produtos="$produtos"/>
                            </tbody>
                        </table>
                    </div>

                    <div id="aprovados" class="anuncios hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produto
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendedor
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Preço
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <x-AprovarAnuncios_anuncios.anunciosAprovados :produtos="$produtos"/>
                            </tbody>
                        </table>
                    </div>

                    <div id="rejeitados" class="anuncios hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produto
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendedor
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Preço
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <x-AprovarAnuncios_anuncios.anunciosReprovados :produtos="$produtos"/>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function mostrar(tipo, botao) {
            document.querySelectorAll('.anuncios').forEach(div => div.classList.add('hidden'));
            document.getElementById(tipo).classList.remove('hidden');

            document.querySelectorAll('.flex .space-x-2 button').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-800');
            });

            botao.classList.remove('bg-gray-200', 'text-gray-800');
            botao.classList.add('bg-blue-600', 'text-white');
        }

        document.addEventListener('DOMContentLoaded', () => {
            mostrar('pendentes', document.getElementById('anunciosPendentesBtn'));
        });
    </script>
</x-layout>
