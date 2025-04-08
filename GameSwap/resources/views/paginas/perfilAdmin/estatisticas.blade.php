<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main class="mb-10">
        
    
            <h2 class=" text-2xl font-bold mb-6">Estatísticas do Site</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Usuários Totais</p>
                            <h3 class="text-2xl font-bold">8,249</h3>
                        </div>
                        <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up"></i> 12% desde o mês passado</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Anúncios Ativos</p>
                            <h3 class="text-2xl font-bold">3,721</h3>
                        </div>
                        <div class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-tag text-green-600"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up"></i> 8% desde o mês passado</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Transações</p>
                            <h3 class="text-2xl font-bold">1,543</h3>
                        </div>
                        <div class="h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-exchange-alt text-purple-600"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up"></i> 15% desde o mês passado</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Receita</p>
                            <h3 class="text-2xl font-bold">€12,450</h3>
                        </div>
                        <div class="h-10 w-10 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-euro-sign text-yellow-600"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up"></i> 10% desde o mês passado</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Usuários Registrados</h3>
                    <div class="h-64 bg-gray-100 rounded-md flex items-center justify-center">
                        <p class="text-gray-500">Gráfico de Usuários</p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Categorias Populares</h3>
                    <div class="h-64 bg-gray-100 rounded-md flex items-center justify-center">
                        <p class="text-gray-500">Gráfico de Categorias</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</x-layout>