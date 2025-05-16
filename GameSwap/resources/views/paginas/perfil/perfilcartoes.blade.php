<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Cartões Adicionados</h1>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 transition h-10 px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Adicionar Cartão
          </button>
        </div>

        <div class="space-y-4">
          <!-- Card 1 - Primary -->
          <div class="rounded-lg border border-primary/50 bg-primary-light/30 text-card-foreground shadow-card">
            <div class="flex flex-row items-center justify-between p-6 pb-2">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                <h3 class="text-lg font-semibold leading-none tracking-tight">Visa •••• 4242</h3>
                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors border-transparent bg-primary text-primary-foreground ml-3">
                  Principal
                </span>
              </div>
              <div class="flex items-center gap-2">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-gray-500 bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </button>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="p-6 pt-0">
              <div class="space-y-1 text-gray-700">
                <p>Titular: João Silva</p>
                <p>Validade: 05/25</p>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card">
            <div class="flex flex-row items-center justify-between p-6 pb-2">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                <h3 class="text-lg font-semibold leading-none tracking-tight">Mastercard •••• 5678</h3>
              </div>
              <div class="flex items-center gap-2">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-gray-500 bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </button>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="p-6 pt-0">
              <div class="space-y-1 text-gray-700">
                <p>Titular: João Silva</p>
                <p>Validade: 08/26</p>
              </div>
              <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-primary bg-transparent hover:underline h-auto p-0 mt-2">
                Definir como cartão principal
              </button>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-card">
            <div class="flex flex-row items-center justify-between p-6 pb-2">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                <h3 class="text-lg font-semibold leading-none tracking-tight">American Express •••• 1234</h3>
              </div>
              <div class="flex items-center gap-2">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-gray-500 bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </button>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="p-6 pt-0">
              <div class="space-y-1 text-gray-700">
                <p>Titular: João Silva</p>
                <p>Validade: 12/24</p>
              </div>
              <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-primary bg-transparent hover:underline h-auto p-0 mt-2">
                Definir como cartão principal
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</x-layout>
