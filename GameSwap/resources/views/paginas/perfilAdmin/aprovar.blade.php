<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main id="aprovar-anuncios" class="mb-10 ">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Aprovar Anúncios</h2>
                <div class="flex space-x-2">
                    <button id="todosAnunciosBtn" class="bg-blue-600 text-white px-4 py-2 rounded-md">Todos</button>
                    <button id="anunciosPendentesBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Pendentes</button>
                    <button id="anunciosAprovadosBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Aprovados</button>
                    <button id="anunciosRejeitadosBtn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Rejeitados</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vendedor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <div id="divAnunciosAprovarAnuncios">
                        <x-AprovarAnuncios_anuncios.todosAnuncios :produtos="$produtos" />
                    </div>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layout>
