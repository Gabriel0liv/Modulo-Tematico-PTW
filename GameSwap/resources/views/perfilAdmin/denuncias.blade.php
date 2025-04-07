<x-layout>
    <div class="mb-10">
        <div class=" flex justify-between items-center mb-6">
            <x-perfilAdminSideBar>
            </x-perfilAdminSideBar>
    
            <h2 class="text-2xl font-bold">Denúncias</h2>
            <div class="flex space-x-2">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md">Todas</button>
                <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Pendentes</button>
                <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Resolvidas</button>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
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
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#1234</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-gray-300"></div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">João Silva</div>
                                    <div class="text-sm text-gray-500">joao.silva@exemplo.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Anúncio Fraudulento</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/04/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                            <a href="#" class="text-green-600 hover:text-green-900 mr-3">Resolver</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#1235</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-gray-300"></div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Maria Santos</div>
                                    <div class="text-sm text-gray-500">maria.santos@exemplo.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Conteúdo Impróprio</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14/04/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Resolvido</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                            <a href="#" class="text-green-600 hover:text-green-900 mr-3">Resolver</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>