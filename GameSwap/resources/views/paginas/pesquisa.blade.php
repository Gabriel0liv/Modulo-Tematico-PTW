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
                        <select name="genero" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                            <option value="">Todos</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('genero') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Console</h3>
                        <select name="modelo" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                            <option value="">Todos</option>
                            @foreach($modelo_consoles as $modelo_console)
                                <option value="{{ $modelo_console->id }}" {{ request('modelo') == $modelo_console->id ? 'selected' : '' }}>
                                    {{ $modelo_console->nome }}
                                </option>
                            @endforeach
                        </select>
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
                            <x-jogo-card :jogo="$jogo"/>
                        @endforeach
                    </div>
                    @if($jogos instanceof \Illuminate\Pagination\LengthAwarePaginator || $jogos instanceof \Illuminate\Pagination\Paginator)
                        <div class="mt-12 flex justify-center">
                            {{ $jogos->appends([
                                'consoles_page' => request('consoles_page'),
                                'query' => request('query'),
                                'genero' => request('genero'),
                                'modelo' => request('modelo'),
                                'tipo' => request('tipo')
                            ])->links() }}
                        </div>
                    @endif
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
                @if($consoles instanceof \Illuminate\Pagination\LengthAwarePaginator || $consoles instanceof \Illuminate\Pagination\Paginator)
                    <div class="mt-12 flex justify-center">
                        {{ $consoles->appends([
                            'jogos_page' => request('jogos_page'),
                            'query' => request('query'),
                            'genero' => request('genero'),
                            'modelo' => request('modelo'),
                            'tipo' => request('tipo')
                        ])->links() }}
                    </div>
                @endif

            </main>
        </div>
    </div>
</x-layout>
