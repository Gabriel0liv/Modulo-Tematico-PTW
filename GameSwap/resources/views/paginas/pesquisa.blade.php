<x-layout>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Filter Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block border-r border-gray-100 overflow-y-auto">
            <div class="p-6 sticky top-0">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Filtros</h2>
                <form method="GET" action="{{ route('pesquisaPage') }}">
                    <!-- Search in filters -->
                    <div class="relative">
                        <input
                            type="text" name="query" value="{{ request('query') }}" placeholder="Pesquisar..."
                            class="w-full px-3 py-2 pl-9 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-primary-600"
                        >
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-search text-gray-400 text-sm"></i>
                        </div>
                    </div>


                    <!-- Genre Filter -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Gênero</h3>
                        <div class="space-y-2">
                            @foreach($categorias as $genero)
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox" name="generos[]" value="{{ $genero->id }}" class="sr-only"
                                        {{ in_array($genero->id, (array) request('generos', [])) ? 'checked' : '' }}>
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm text-gray-700">{{$genero->nome}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Console</h3>
                        <div class="space-y-2">
                            @foreach($modelo_consoles as $modelo_console)
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox" name="consoles[]" value="{{ $modelo_console->id }}" class="sr-only"
                                        {{ in_array($modelo_console->id, (array) request('consoles', [])) ? 'checked' : '' }}>
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm text-gray-700">{{$modelo_console->nome}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                            Aplicar Filtros
                        </button>
                    </div>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <main class="p-6">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 mb-1">Resultados da pesquisa</h1>
                        <p class="text-gray-500">Exibindo resultados para: <span class="font-medium">{{ $query }}</span></p>
                    </div>
                </div>

                @if($jogos->isEmpty())
                    <p class="text-gray-500">Nenhum jogo encontrado.</p>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                        @foreach ($jogos as $jogo)
                            <p>Buceta de produto que não mostra</p>
                            @if($jogo->moderado == 1)
                                <x-jogo-card :jogo="$jogo"/>
                            @endif
                        @endforeach
                    </div>
                @endif

                <div class="border-t border-gray-200 my-12"></div>

                @if($consoles->isEmpty())
                    <p class="text-gray-500">Nenhum console encontrado.</p>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                        @foreach ($consoles as $console)
                            @if($console->moderado == 1)
                                <x-console-card :console="$console"/>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $jogos->links() }}
                </div>
                <div class="mt-12 flex justify-center">
                    {{ $consoles->links() }}
                </div>
            </main>
        </div>
    </div>
</x-layout>
