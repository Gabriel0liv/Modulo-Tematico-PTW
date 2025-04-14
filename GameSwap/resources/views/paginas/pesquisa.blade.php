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
                                <span class="ml-auto text-xs text-muted">128</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Aventura</span>
                                <span class="ml-auto text-xs text-muted">96</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">RPG</span>
                                <span class="ml-auto text-xs text-muted">64</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Estratégia</span>
                                <span class="ml-auto text-xs text-muted">42</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Esportes</span>
                                <span class="ml-auto text-xs text-muted">38</span>
                            </label>
                        </div>
                        <button class="text-primary-600 hover:text-primary-700 text-sm font-medium flex items-center">
                            <span>Ver mais</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                    </div>

                    <!-- Developer Filter -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Desenvolvedor</h3>
                        <select
                            class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
                            <option value="">Todos os desenvolvedores</option>
                            <option value="nintendo">Nintendo</option>
                            <option value="sony">Sony</option>
                            <option value="microsoft">Microsoft</option>
                            <option value="ea">Electronic Arts</option>
                            <option value="ubisoft">Ubisoft</option>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Estado</h3>
                        <div class="space-y-2">
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Selado</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Novo</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Semi novo</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Usado</span>
                            </label>
                        </div>
                    </div>

                    <!-- Region Filter -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Região</h3>
                        <select
                            class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
                            <option value="">Todas as regiões</option>
                            <option value="eu">Europa</option>
                            <option value="na">América do Norte</option>
                            <option value="jp">Japão</option>
                            <option value="br">Brasil</option>
                        </select>
                    </div>

                    <!-- Model Name Filter -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Modelo</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">PS5</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">PS4</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Xbox X</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Xbox S</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Switch</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" class="sr-only">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">PC</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price Range Slider -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Faixa de Preço</h3>
                        <div class="px-1">
                            <input type="range" min="0" max="100" value="50" class="price-slider">
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>€0</span>
                            <span>€100</span>
                        </div>
                        <div class="flex gap-2">
                            <div class="relative flex-1">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500 text-sm">€</span>
                                <input type="number" placeholder="Min"
                                       class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded-md text-sm">
                            </div>
                            <div class="relative flex-1">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500 text-sm">€</span>
                                <input type="number" placeholder="Max"
                                       class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded-md text-sm">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <!-- Apply Filters Button -->
                    <div class="space-y-2">
                        <button
                            class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2.5 px-4 rounded-lg font-medium transition-colors flex items-center justify-center">
                            <i class="fas fa-filter mr-2 text-sm"></i>
                            Aplicar Filtros
                        </button>
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-lg shadow-soft transition-all mb-4">
                            Limpar Filtros
                        </button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Mobile filter button -->
            <div class="md:hidden p-4 bg-white shadow-sm sticky top-0 z-10">
                <label for="mobile-filter-toggle"
                       class="w-full flex items-center justify-between border border-gray-200 rounded-lg px-4 py-2.5 cursor-pointer bg-white">
          <span class="flex items-center">
            <i class="fas fa-filter mr-2 text-primary-600"></i>
            <span class="font-medium text-gray-800">Filtros</span>
          </span>
                    <i class="fas fa-chevron-down text-sm text-gray-500"></i>
                </label>
                <input type="checkbox" id="mobile-filter-toggle" class="hidden">

                <!-- Mobile filter menu (hidden by default) -->
                <div class="mobile-filter-menu hidden mt-2 p-4 border border-gray-200 rounded-lg bg-white">
                    <!-- Mobile filters (simplified version) -->
                    <div class="space-y-4">
                        <select class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                            <option value="">Gênero: Todos</option>
                            <option value="action">Ação</option>
                            <option value="adventure">Aventura</option>
                            <option value="rpg">RPG</option>
                        </select>

                        <select class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                            <option value="">Desenvolvedor: Todos</option>
                            <option value="nintendo">Nintendo</option>
                            <option value="sony">Sony</option>
                            <option value="microsoft">Microsoft</option>
                        </select>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">Preço: €0 - €100</label>
                            <input type="range" min="0" max="100" value="50" class="price-slider">
                        </div>

                        <button class="w-full bg-primary-600 text-white py-2 px-4 rounded-lg font-medium">
                            Aplicar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Game grid -->
            <main class="p-6">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 mb-1">Jogos Recomendados</h1>
                        <p class="text-gray-500">Encontramos <span class="font-medium">245</span> jogos para você</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 sm:mt-0">
                        <span class="text-sm text-gray-600">Ordenar por:</span>
                        <select class="custom-select px-3 py-2 border border-gray-200 rounded-lg text-sm bg-white">
                            <option value="relevance">Relevância</option>
                            <option value="price-asc">Preço: Menor para Maior</option>
                            <option value="price-desc">Preço: Maior para Menor</option>
                            <option value="newest">Mais Recentes</option>
                        </select>
                        <div class="flex border border-gray-200 rounded-lg overflow-hidden">
                            <button class="px-3 py-2 bg-primary-50 text-primary-600 border-r border-gray-200">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="px-3 py-2 bg-white text-gray-500 hover:text-gray-700">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach ($produtos as $item)

                            <a href="/produto/{{$item['id']}}" class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
                                <div class="relative">
                                    <img
                                        src="/placeholder.svg?height=180&width=180"
                                        alt="FIFA 23"
                                        class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                                    />
                                    <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                                        {{$item['publicador']}}
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-medium text-gray-800 truncate">{{$item['nome']}}</h3>
                                    <p class="text-blue-600 font-bold">€ {{$item['preco']}}</p>
                                </div>
                            </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-1">
                        <button
                            class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-400 bg-white cursor-not-allowed"
                            disabled>
                            <i class="fas fa-chevron-left mr-1 text-xs"></i>
                            Anterior
                        </button>
                        <button
                            class="w-9 h-9 flex items-center justify-center border border-primary-600 rounded-lg text-sm bg-primary-50 text-primary-700 font-medium">
                            1
                        </button>
                        <button
                            class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                            2
                        </button>
                        <button
                            class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                            3
                        </button>
                        <span class="px-2 text-gray-500">...</span>
                        <button
                            class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                            10
                        </button>
                        <button
                            class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                            Próximo
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </nav>
                </div>
            </main>
        </div>
    </div>
</x-layout>
