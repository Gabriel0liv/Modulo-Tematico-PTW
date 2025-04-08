<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main id="aprovar-anuncios" class="mb-10 ">

            
        
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Aprovar Anúncios</h2>
                <div class="flex space-x-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md">Todos</button>
                    <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Pendentes</button>
                    <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Aprovados</button>
                    <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Rejeitados</button>
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
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#5678</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-gray-300 rounded"></div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">PlayStation 5</div>
                                        <div class="text-sm text-gray-500">Consoles</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Carlos Oliveira</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">€450</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16/04/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                <a href="#" class="text-green-600 hover:text-green-900 mr-3">Aprovar</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Rejeitar</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#5679</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-gray-300 rounded"></div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">The Last of Us Part II</div>
                                        <div class="text-sm text-gray-500">Jogos</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ana Ferreira</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">€35</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/04/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aprovado</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                <a href="#" class="text-green-600 hover:text-green-900 mr-3">Aprovar</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Rejeitar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layout>