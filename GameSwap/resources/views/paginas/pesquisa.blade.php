<x-layout>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Filter Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block border-r border-gray-100 overflow-y-auto">
            <div class="p-6 sticky top-0">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Filtros</h2>

                <div class="space-y-6">
                    <!-- Search in filters -->
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Buscar filtros..."
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
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Ação</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Aventura</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">RPG</span>
                            </label>
                        </div>
                    </div>
                </div>
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
                            <a href="/produto/{{ $jogo->id }}" class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
                                <div class="relative">
                                    <img
                                        src="/placeholder.svg?height=180&width=180"
                                        alt="{{ $jogo->nome }}"
                                        class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                                    />
                                    <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                                        {{ $jogo->console }}
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-medium text-gray-800 truncate">{{ $jogo->nome }}</h3>
                                    <p class="text-blue-600 font-bold">€ {{ $jogo->preco }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif

                <div class="border-t border-gray-200 my-12"></div>

                @if($consoles->isEmpty())
                    <p class="text-gray-500">Nenhum console encontrado.</p>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                        @foreach ($consoles as $console)
                            <a href="/produto/{{ $console->id }}" class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
                                <div class="relative">
                                    <img
                                        src="/placeholder.svg?height=180&width=180"
                                        alt="{{ $console->nome }}"
                                        class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                                    />
                                    <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                                        {{ $console->console }}
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-medium text-gray-800 truncate">{{ $console->nome }}</h3>
                                    <p class="text-blue-600 font-bold">€ {{ $console->preco }}</p>
                                </div>
                            </a>
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
