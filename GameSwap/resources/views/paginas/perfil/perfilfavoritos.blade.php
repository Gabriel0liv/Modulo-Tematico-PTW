<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Favoritos</h1>
          <div class="relative w-64">
            <input
              type="text"
              class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
              placeholder="Pesquisar favoritos..."
            />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          <!-- Favorite Item 1 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
            <div class="p-4">
              <div class="relative">
                <div class="relative h-48 w-full rounded-md overflow-hidden bg-gray-100 mb-4">
                  <img src="images/placeholder.jpg" alt="Assassin's Creed Valhalla" class="w-full h-full object-cover">
                </div>
                <button class="absolute top-2 right-2 h-8 w-8 bg-white rounded-full flex items-center justify-center shadow-md">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </button>
              </div>

              <h3 class="font-medium text-gray-900 mb-1">Assassin's Creed Valhalla</h3>
              <p class="text-sm text-gray-500 mb-2">PlayStation 5</p>
              <p class="text-lg font-semibold text-gray-900 mb-2">39.99€</p>

              <div class="flex flex-col space-y-1 mb-4">
                <p class="text-sm text-gray-500">Vendedor: GameStore</p>
                <p class="text-sm text-gray-500">Condição: Como novo</p>
              </div>

              <div class="flex gap-2">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary-hover h-10 px-4 py-2 flex-1">
                  Comprar
                </button>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 flex-1">
                  Ver Detalhes
                </button>
              </div>
            </div>
          </div>

          <!-- Favorite Item 2 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
            <div class="p-4">
              <div class="relative">
                <div class="relative h-48 w-full rounded-md overflow-hidden bg-gray-100 mb-4">
                  <img src="images/placeholder.jpg" alt="Metroid Prime 4" class="w-full h-full object-cover">
                </div>
                <button class="absolute top-2 right-2 h-8 w-8 bg-white rounded-full flex items-center justify-center shadow-md">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </button>
              </div>

              <h3 class="font-medium text-gray-900 mb-1">Metroid Prime 4</h3>
              <p class="text-sm text-gray-500 mb-2">Nintendo Switch</p>
              <p class="text-lg font-semibold text-gray-900 mb-2">49.99€</p>

              <div class="flex flex-col space-y-1 mb-4">
                <p class="text-sm text-gray-500">Vendedor: SwitchGames</p>
                <p class="text-sm text-gray-500">Condição: Novo</p>
              </div>

              <div class="flex gap-2">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary-hover h-10 px-4 py-2 flex-1">
                  Comprar
                </button>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 flex-1">
                  Ver Detalhes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</x-layout>
