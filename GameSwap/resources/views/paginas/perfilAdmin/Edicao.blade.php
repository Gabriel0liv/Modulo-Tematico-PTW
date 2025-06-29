<x-layout>
    <div class="flex flex-1 overflow-hidden gap-x-6">

        <x-perfilAdminSideBar>
        </x-perfilAdminSideBar>

        <main id="edicao-site" class="mb-10 ">

            <h2 class="text-2xl font-bold mb-6">Edição do Site</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Modelos de Consoles</h3>
                    <div class="space-y-4">
                        @foreach ($modelo_consoles as $modelo_console)
                            <div class="flex justify-between items-center p-3 border border-gray-200 rounded-md">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-gamepad text-blue-600"></i>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-3">
                                    <div class="flex-1">
                                        <form action="{{ route('modelo_consoles.editarModelo', $modelo_console->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="text" name="nome" value="{{ $modelo_console->nome }}" class="flex-1 p-2 border border-gray-300 rounded-md mr-2">
                                            <button type="submit" class="flex items-center gap-3 px-4 py-3 bg-blue-50 border border-blue-200 hover:border-blue-300 text-blue-600 hover:text-blue-700 rounded-md transition-colors mr-2">Salvar</button>
                                        </form>
                                    </div>
                                    <form action="{{ route('modelo_consoles.eliminarModelo', $modelo_console->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-3 px-4 py-3 bg-red-50 border border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 rounded-md transition-colors">Remover</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        {{$modelo_consoles->links()}}

                        <form action="{{ route('modelo_consoles.adicionar') }}" method="POST" class="space-y-4">
                            @csrf
                            <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 px-4 py-2 transition">
                                <i class="fas fa-plus mr-2"></i> Adicionar Novo Modelo
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Categorias</h3>
                    <div class="space-y-4">
                        @foreach ($categorias as $categoria)
                        <div class="flex justify-between items-center p-3 border border-gray-200 rounded-md">
                            <div class="flex items-center">
                                <div class="h-10 w-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
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

                        {{$categorias->links()}}

                        <form action="{{ route('categoria.adicionar') }}" method="POST" class="space-y-4">
                            @csrf
                            <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 px-4 py-2 transition">
                                <i class="fas fa-plus mr-2"></i> Adicionar Nova Categoria
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>
