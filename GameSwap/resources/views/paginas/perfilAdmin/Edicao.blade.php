<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main id="edicao-site" class="mb-10 ">

            <h2 class="text-2xl font-bold mb-6">Edição do Site</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Banners da Página Inicial</h3>
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-md p-4">
                            <div class="h-32 bg-gray-200 rounded-md mb-3"></div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">Banner Principal</p>
                                    <p class="text-sm text-gray-500">Ativo desde: 10/04/2023</p>
                                </div>
                                <div>
                                    <button class="text-blue-600 mr-2">Editar</button>
                                    <button class="text-red-600">Remover</button>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-md p-4">
                            <div class="h-32 bg-gray-200 rounded-md mb-3"></div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">Banner Secundário</p>
                                    <p class="text-sm text-gray-500">Ativo desde: 12/04/2023</p>
                                </div>
                                <div>
                                    <button class="text-blue-600 mr-2">Editar</button>
                                    <button class="text-red-600">Remover</button>
                                </div>
                            </div>
                        </div>

                        <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 px-4 py-2 transition">
                            <i class="fas fa-plus mr-2"></i> Adicionar Novo Banner
                        </button>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Categorias</h3>
                    <div class="space-y-4">
                        @foreach ($categorias as $categoria)
                        <div class="flex justify-between items-center p-3 border border-gray-200 rounded-md">
                            <div class="flex items-center">
                                <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-gamepad text-blue-600"></i>
                                </div>
                            </div>
                            <div class="flex justify-between items-center p-3">
                                <div class="flex-1">
                                    <form action="{{ route('categoria.editarCategoria', $categoria->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        <input type="text" name="nome" value="{{ $categoria->nome }}" class="flex-1 p-2 border border-gray-300 rounded-md mr-2">
                                        <button type="submit" class="flex items-center gap-3 px-4 py-3 bg-blue-50 border  border-blue-200 hover:border-blue-300 text-blue-600 hover:text-blue-700 rounded-md transition-colors mr-2">Salvar</button>
                                    </form>
                                </div>
                                <form action="{{ route('categoria.eliminarCategoria', $categoria->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 px-4 py-3 bg-red-50 border  border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 rounded-md transition-colors">Remover</button>
                                </form>
                            </div>
                        </div>
                        @endforeach

                        <form action="{{ route('categoria.adicionar') }}" method="POST" class="space-y-4">
                            @csrf
                            <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 px-4 py-2 transition">
                                <i class="fas fa-plus mr-2"></i> Adicionar Nova Categoria
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Configurações do Site</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Site</label>
                            <input type="text" value="GAMESWAP" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                            <textarea class="w-full p-2 border border-gray-300 rounded-md" rows="3">Plataforma de troca e venda de jogos, consoles e acessórios.</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-blue-600 text-white flex items-center justify-center rounded-md mr-3">GS</div>
                                <button class="text-blue-600">Alterar Logo</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cores do Tema</label>
                            <div class="flex space-x-2">
                                <div class="h-8 w-8 bg-blue-600 rounded-md"></div>
                                <div class="h-8 w-8 bg-yellow-500 rounded-md"></div>
                                <div class="h-8 w-8 bg-white border border-gray-300 rounded-md"></div>
                                <button class="text-blue-600 ml-2">Editar Cores</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">SEO e Metadados</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título da Página</label>
                            <input type="text" value="GAMESWAP - Troca e Venda de Jogos" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Descrição</label>
                            <textarea class="w-full p-2 border border-gray-300 rounded-md" rows="3">GAMESWAP é a maior plataforma de troca e venda de jogos, consoles e acessórios em Portugal. Encontre os melhores preços e ofertas!</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Palavras-chave</label>
                            <input type="text" value="jogos, consoles, troca, venda, playstation, xbox, nintendo" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Google Analytics ID</label>
                            <input type="text" value="UA-12345678-1" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md mr-2">Cancelar</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md">Salvar Alterações</button>
            </div>
        </main>
    </div>
</x-layout>
