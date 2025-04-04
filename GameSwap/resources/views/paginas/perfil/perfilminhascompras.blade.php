<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Minhas Compras</h1>
          <div class="relative w-64">
            <input
              type="text"
              class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
              placeholder="Pesquisar compras..."
            />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>

        <div class="space-y-4">
          <!-- Purchase Item 1 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
            <div class="flex items-center p-4 md:p-6">
              <div class="relative h-20 w-20 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
                <img src="images/placeholder.jpg" alt="The Legend of Zelda: Tears of the Kingdom" class="w-full h-full object-cover">
              </div>

              <div class="ml-6 flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <h3 class="font-medium text-gray-900">The Legend of Zelda: Tears of the Kingdom</h3>
                    <p class="mt-1 text-sm text-gray-500">Nintendo Switch</p>
                  </div>
                  <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end">
                    <p class="text-lg font-medium text-gray-900">59.99€</p>
                    <p class="text-sm text-gray-500">Pedido: ORD-2023-1234</p>
                  </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm text-gray-500">Data: 15/03/2024</p>
                  <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors border-transparent bg-green-500 text-white">
                    Entregue
                  </span>
                </div>
              </div>
            </div>
          </div>

          <!-- Purchase Item 2 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
            <div class="flex items-center p-4 md:p-6">
              <div class="relative h-20 w-20 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
                <img src="images/placeholder.jpg" alt="Final Fantasy XVI" class="w-full h-full object-cover">
              </div>

              <div class="ml-6 flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <h3 class="font-medium text-gray-900">Final Fantasy XVI</h3>
                    <p class="mt-1 text-sm text-gray-500">PlayStation 5</p>
                  </div>
                  <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end">
                    <p class="text-lg font-medium text-gray-900">69.99€</p>
                    <p class="text-sm text-gray-500">Pedido: ORD-2023-1233</p>
                  </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm text-gray-500">Data: 02/03/2024</p>
                  <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors border-transparent bg-yellow-500 text-white">
                    Em trânsito
                  </span>
                </div>
              </div>
            </div>
          </div>

          <!-- Purchase Item 3 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
            <div class="flex items-center p-4 md:p-6">
              <div class="relative h-20 w-20 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
                <img src="images/placeholder.jpg" alt="Elden Ring" class="w-full h-full object-cover">
              </div>

              <div class="ml-6 flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <h3 class="font-medium text-gray-900">Elden Ring</h3>
                    <p class="mt-1 text-sm text-gray-500">Xbox Series X</p>
                  </div>
                  <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end">
                    <p class="text-lg font-medium text-gray-900">49.99€</p>
                    <p class="text-sm text-gray-500">Pedido: ORD-2023-1232</p>
                  </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm text-gray-500">Data: 25/02/2024</p>
                  <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors border-transparent bg-green-500 text-white">
                    Entregue
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</x-layout>
