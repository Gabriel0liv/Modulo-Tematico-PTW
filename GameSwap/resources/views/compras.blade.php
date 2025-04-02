<x-layout>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Featured Section -->
        <div class="lg:col-span-3 bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl p-8 shadow-md">
          <div class="flex flex-col h-full justify-center items-center text-center">
            <h2 class="text-white text-3xl md:text-4xl font-bold mb-6">Destaque de Consoles e Jogos</h2>
            <p class="text-blue-100 max-w-2xl mb-8">
              Encontre os melhores jogos e consoles com os melhores preços. Compre, venda ou troque com outros gamers.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
              <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-white text-blue-800 hover:bg-blue-50 px-4 py-2">Explorar Consoles</button>
              <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-transparent border border-white text-white hover:bg-blue-800 px-4 py-2">Ver Jogos</button>
            </div>
          </div>
        </div>
  
        <!-- Info Boxes -->
        <div class="lg:col-span-1 space-y-6">
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0">
            <div class="bg-gradient-to-r from-amber-400 to-amber-300 p-4">
              <h3 class="text-xl font-bold text-gray-800">Assine o Premium</h3>
            </div>
            <div class="p-6 pt-0 p-4">
              <div class="mb-3">
                <span class="text-blue-600 font-bold text-lg">R$ 19,90</span>
                <span class="text-gray-500 text-sm"> / mês</span>
              </div>
              <p class="text-sm text-gray-600 mb-3">
                Desbloqueie recursos exclusivos e aproveite ao máximo a plataforma GAMESWAP.
              </p>
              <ul class="space-y-2 text-sm mb-4">
                <li class="flex items-center gap-2">
                  <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                  <span>Sem taxas de transação</span>
                </li>
                <li class="flex items-center gap-2">
                  <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                  <span>Anúncios em destaque</span>
                </li>
                <li class="flex items-center gap-2">
                  <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                  <span>Suporte prioritário</span>
                </li>
              </ul>
              <a href="payment-gateway.html" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white w-full px-4 py-2">
                Assinar Agora
              </a>
            </div>
          </div>
  
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0">
            <div class="bg-gradient-to-r from-amber-400 to-amber-300 p-4">
              <h3 class="text-xl font-bold text-gray-800">Outra Informação</h3>
            </div>
            <div class="p-6 pt-0 p-4">
              <p class="text-sm text-gray-600 mb-4">Receba notificações sobre novos jogos e ofertas especiais.</p>
              <div class="flex gap-2">
                <input placeholder="Seu email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-sm" />
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 rounded-md px-3 bg-amber-400 hover:bg-amber-500 text-gray-800">
                  Inscrever
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Featured Consoles -->
      <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Consoles em Destaque</h2>
  
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
          <!-- Game Card 1 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="FIFA 23"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                PS5
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Playstation 5</h3>
              <p class="text-blue-600 font-bold">R$ 3500,90</p>
            </div>
          </div>
  
          <!-- Game Card 2 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="Hogwarts Legacy"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                Xbox Series X
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Xbox Series X</h3>
              <p class="text-blue-600 font-bold">R$ 2500,99</p>
            </div>
          </div>
  
          <!-- Game Card 3 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="Mario Kart 8"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                Nintendo Switch
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Nintendo Switch 2</h3>
              <p class="text-blue-600 font-bold">R$ 5000,99</p>
            </div>
          </div>
  
          <!-- Game Card 4 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="Elden Ring"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                PS5
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Playstation 4</h3>
              <p class="text-blue-600 font-bold">R$ 2000,90</p>
            </div>
          </div>
  
          <!-- Game Card 5 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="Forza Horizon 5"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                Xbox Series X
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Xbox One</h3>
              <p class="text-blue-600 font-bold">R$ 1500,00</p>
            </div>
          </div>
  
          <!-- Game Card 6 -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
            <div class="relative">
              <img
                src="/placeholder.svg?height=180&width=180"
                alt="The Last of Us Part II"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
              />
              <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                PS4
              </div>
            </div>
            <div class="p-3">
              <h3 class="font-medium text-gray-800 truncate">Nintendo Switch</h3>
              <p class="text-blue-600 font-bold">R$ 2000,00</p>
            </div>
          </div>
          
        </div>
        <div class="mt-12">
          <h2 class="text-2xl font-bold mb-6 text-gray-800">Jogos em Destaque</h2>
    
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <!-- Game Card 1 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="FIFA 23"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  PS5
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">FIFA 23</h3>
                <p class="text-blue-600 font-bold">R$ 199,90</p>
              </div>
            </div>
    
            <!-- Game Card 2 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="Hogwarts Legacy"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  Xbox Series X
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">Hogwarts Legacy</h3>
                <p class="text-blue-600 font-bold">R$ 249,90</p>
              </div>
            </div>
    
            <!-- Game Card 3 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="Mario Kart 8"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  Nintendo Switch
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">Mario Kart 8</h3>
                <p class="text-blue-600 font-bold">R$ 299,90</p>
              </div>
            </div>
    
            <!-- Game Card 4 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="Elden Ring"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  PS5
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">Elden Ring</h3>
                <p class="text-blue-600 font-bold">R$ 229,90</p>
              </div>
            </div>
    
            <!-- Game Card 5 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="Forza Horizon 5"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  Xbox Series X
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">Forza Horizon 5</h3>
                <p class="text-blue-600 font-bold">R$ 199,90</p>
              </div>
            </div>
    
            <!-- Game Card 6 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
              <div class="relative">
                <img
                  src="/placeholder.svg?height=180&width=180"
                  alt="The Last of Us Part II"
                  class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                  PS4
                </div>
              </div>
              <div class="p-3">
                <h3 class="font-medium text-gray-800 truncate">The Last of Us Part II</h3>
                <p class="text-blue-600 font-bold">R$ 149,90</p>
              </div>
            </div>
            
          </div>
      </div>
</x-layout>