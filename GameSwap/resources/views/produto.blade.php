<x-layout>
  <!-- Breadcrumbs -->
  <div class="max-w-7xl mx-auto px-6 pt-6 pb-2">
    <div class="flex items-center text-sm text-gray-500">
      <a href="#" class="hover:text-[#0a66c2] hover:underline">Home</a>
      <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      <a href="#" class="hover:text-[#0a66c2] hover:underline">{{$produto['tipo_produto']}}</a>
      <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      <a href="#" class="hover:text-[#0a66c2] hover:underline">{{$produto['console']}}</a>
      <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      <span class="text-gray-700 font-medium">{{$produto['nome']}}</span>
    </div>
  </div>

  <!-- Product Content -->
  <main class="max-w-7xl mx-auto px-6 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Product Images -->
      <div class="space-y-4">
        <!-- Image Gallery with CSS-only functionality -->
        <div class="relative">
          <input type="radio" name="thumbnail" id="thumb1" class="thumbnail-radio" checked>
          <input type="radio" name="thumbnail" id="thumb2" class="thumbnail-radio">
          <input type="radio" name="thumbnail" id="thumb3" class="thumbnail-radio">
          <input type="radio" name="thumbnail" id="thumb4" class="thumbnail-radio">

          <div class="main-image-container bg-white rounded-xl shadow-sm overflow-hidden aspect-square relative">
            <img id="main-image-1" src="https://via.placeholder.com/500" alt="God of War PlayStation 2" class="main-image absolute inset-0 w-full h-full object-contain p-4">
            <img id="main-image-2" src="https://via.placeholder.com/500?text=Image+2" alt="God of War PlayStation 2 - Image 2" class="main-image absolute inset-0 w-full h-full object-contain p-4">
            <img id="main-image-3" src="https://via.placeholder.com/500?text=Image+3" alt="God of War PlayStation 2 - Image 3" class="main-image absolute inset-0 w-full h-full object-contain p-4">
            <img id="main-image-4" src="https://via.placeholder.com/500?text=Image+4" alt="God of War PlayStation 2 - Image 4" class="main-image absolute inset-0 w-full h-full object-contain p-4">

            <div class="absolute top-4 left-4 flex gap-2">
              <span class="bg-[#ff922b] text-[#212529] font-medium px-3 py-1 rounded-full text-sm">
                {{$produto['estado']}}
              </span>
              <span class="bg-[#4dabf7] text-white font-medium px-3 py-1 rounded-full text-sm">
                Platinum
              </span>
            </div>

            <div class="absolute top-4 right-4 flex gap-2">
              <input type="checkbox" id="wishlist" class="wishlist-checkbox">
              <label for="wishlist" class="wishlist-button p-2 rounded-full bg-white/80 text-gray-700 hover:bg-white transition-colors cursor-pointer">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </label>
              <button class="p-2 rounded-full bg-white/80 text-gray-700 hover:bg-white transition-colors">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
              </button>
            </div>
          </div>

          <div class="flex gap-3 overflow-x-auto pb-2 mt-4">
            <label for="thumb1" class="relative min-w-[80px] h-[80px] rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 cursor-pointer">
              <img src="https://via.placeholder.com/80" alt="Thumbnail 1" class="w-full h-full object-cover">
            </label>
            <label for="thumb2" class="relative min-w-[80px] h-[80px] rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 cursor-pointer">
              <img src="https://via.placeholder.com/80?text=2" alt="Thumbnail 2" class="w-full h-full object-cover">
            </label>
            <label for="thumb3" class="relative min-w-[80px] h-[80px] rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 cursor-pointer">
              <img src="https://via.placeholder.com/80?text=3" alt="Thumbnail 3" class="w-full h-full object-cover">
            </label>
            <label for="thumb4" class="relative min-w-[80px] h-[80px] rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 cursor-pointer">
              <img src="https://via.placeholder.com/80?text=4" alt="Thumbnail 4" class="w-full h-full object-cover">
            </label>
            <div class="min-w-[80px] h-[80px] rounded-lg bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition-colors cursor-pointer">
              <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Info -->
      <div class="space-y-8">
        <div class="space-y-4">
          <div>
            <div class="flex items-center gap-2 mb-1">
              <div class="flex">
                <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
                <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
                <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
                <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
                <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
              </div>
              <span class="text-sm text-gray-500">(32 avaliações)</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">{{$produto['nome']}}</h1>
            <p class="text-gray-500 mt-1">{{$produto['console']}} • Jogo Original • Platinum Edition</p>
          </div>

          <div class="flex items-end gap-3">
            <span class="text-3xl font-bold text-gray-900">R${{$produto['preco']}}</span>
          </div>

          <div class="flex items-center gap-1 text-gray-600">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>{{$produto['morada']}}</span>
            <span class="mx-2">•</span>
            <a href="#" class="text-[#0a66c2]">Ver no mapa</a>
          </div>

          <div class="flex items-center gap-1 text-gray-600">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>Vendido por <a href="#" class="font-medium text-[#0a66c2] hover:underline">{{$produto['id_anunciante']}}</a></span>
            <span class="mx-2">•</span>
            <span class="text-[#2b8a3e]">Vendedor verificado</span>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
          <a href="#" class="bg-amber-400 hover:bg-amber-500 text-gray-800 font-medium rounded-lg py-6 text-base transition-all flex-1 text-center">
            Adicionar ao carrinho
          </a>
          <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg py-6 text-base transition-all text-center">
            Fazer oferta
          </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
          <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
            <div class="p-2 rounded-full bg-[#e7f5ff]">
              <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span>Produto em {{$produto['estado']}}</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
            <div class="p-2 rounded-full bg-[#e7f5ff]">
              <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <span>Envio em 24 horas</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
            <div class="p-2 rounded-full bg-[#e7f5ff]">
              <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <span>Garantia de 7 dias</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
            <div class="p-2 rounded-full bg-[#e7f5ff]">
              <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
              </svg>
            </div>
            <span>Pagamento seguro</span>
          </div>
        </div>

        <!-- CSS-only Tabs -->
        <div class="relative">
          <div id="description" class="tab-content mt-4 text-gray-700 space-y-4">
            {{$produto['descricao']}}
          </div>

          <div id="details" class="tab-content mt-4">
            <div class="bg-white rounded-lg p-4 space-y-3">
              <div class="grid grid-cols-2 gap-2 text-sm">
                <div class="text-gray-500">Plataforma</div>
                <div class="font-medium">{{$produto['console']}}</div>

                <div class="text-gray-500">Gênero</div>
                <div class="font-medium">Ação, Aventura</div>

                <div class="text-gray-500">Desenvolvedor</div>
                <div class="font-medium">{{$produto['desenvolvedor']}}</div>

                <div class="text-gray-500">Publicador</div>
                <div class="font-medium">{{$produto['publicador']}}</div>

                <div class="text-gray-500">Ano de lançamento</div>
                <div class="font-medium">{{$produto['ano_lancamento']}}</div>

                <div class="text-gray-500">Idioma</div>
                <div class="font-medium">{{$produto['idiomas']}}</div>

                <div class="text-gray-500">Classificação</div>
                <div class="font-medium">{{$produto['classificacao']}}</div>

                <div class="text-gray-500">Estado</div>
                <div class="font-medium">{{$produto['estado']}}</div>
              </div>
            </div>
          </div>

          <div id="shipping" class="tab-content mt-4">
            <div class="bg-white rounded-lg p-4 space-y-4">
              <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg">
                <div class="p-2 rounded-full bg-[#e7f5ff]">
                  <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <div>
                  <div class="font-medium">Envio padrão</div>
                  <div class="text-sm text-gray-500">2-3 dias úteis • €3,99</div>
                </div>
              </div>
              <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg">
                <div class="p-2 rounded-full bg-[#e7f5ff]">
                  <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <div>
                  <div class="font-medium">Envio expresso</div>
                  <div class="text-sm text-gray-500">1 dia útil • €5,99</div>
                </div>
              </div>
              <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg">
                <div class="p-2 rounded-full bg-[#e7f5ff]">
                  <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <div class="font-medium">Retirada local</div>
                  <div class="text-sm text-gray-500">{{$produto['morada']}} • Grátis</div>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs grid w-full grid-cols-3 bg-gray-100 rounded-lg p-1 mt-4">
            <a href="#description" class="tab text-center py-2 px-4 rounded-md hover:bg-white/50 transition-colors">
              Descrição
            </a>
            <a href="#details" class="tab text-center py-2 px-4 rounded-md hover:bg-white/50 transition-colors">
              Detalhes
            </a>
            <a href="#shipping" class="tab text-center py-2 px-4 rounded-md hover:bg-white/50 transition-colors">
              Envio
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-12 bg-white p-6 rounded-xl shadow-sm">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-900">Avaliações</h2>
        <a href="#" class="border border-[#0a66c2] text-[#0a66c2] hover:bg-[#0a66c2] hover:text-white font-medium rounded-lg px-4 py-2 transition-all">
          Ver todas
        </a>
      </div>

      <div class="grid gap-6">
        <div class="border-b border-gray-100 pb-6">
          <div class="flex justify-between mb-2">
            <div class="flex items-center gap-3">
              <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-medium">
                JP
              </div>
              <div>
                <div class="font-medium">João Pedro</div>
                <div class="text-sm text-gray-500">12 de março de 2023</div>
              </div>
            </div>
            <div class="flex">
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
            </div>
          </div>
          <p class="text-gray-700">
            Excelente jogo! Chegou em perfeito estado, como descrito pelo vendedor. A entrega foi rápida e o vendedor foi muito atencioso. Recomendo!
          </p>
        </div>

        <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
          <div class="flex justify-between mb-2">
            <div class="flex items-center gap-3">
              <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-medium">
                MS
              </div>
              <div>
                <div class="font-medium">Maria Silva</div>
                <div class="text-sm text-gray-500">28 de fevereiro de 2023</div>
              </div>
            </div>
            <div class="flex">
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 fill-[#fcc419] text-[#fcc419]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              <svg class="h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
            </div>
          </div>
          <p class="text-gray-700">
            Muito bom jogo, um clássico do PS2. O disco tem alguns riscos leves mas funciona perfeitamente. Entrega dentro do prazo.
          </p>
        </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="mt-12">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-900">Produtos relacionados</h2>
        <a href="#" class="text-[#0a66c2] hover:text-[#0a66c2] hover:bg-[#e7f5ff] font-medium rounded-lg px-4 py-2 transition-all flex items-center">
          Ver mais
          <svg class="h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($produtosRelacionados as $produto)
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
              <div class="relative aspect-square">
                  <img src="https://via.placeholder.com/300" alt="{{ $produto['nome'] }}" class="w-full h-full object-cover">
                  <div class="absolute top-3 left-3">
                      <span class="bg-[#ff922b] text-[#212529] font-medium px-2 py-1 text-xs rounded-full">
                          {{ ucfirst($produto['estado']) }}
                      </span>
                  </div>
              </div>
              <div class="p-4">
                  <h3 class="font-medium text-gray-900 mb-1">{{ $produto['nome'] }}</h3>
                  <p class="text-sm text-gray-500 mb-2">{{ $produto['console'] }}</p>
                  <div class="flex items-center justify-between">
                      <span class="font-bold text-gray-900">€{{ number_format($produto['preco'], 2, ',', '.') }}</span>
                      {{-- estrelas aqui, se quiser manter --}}
                  </div>
              </div>
          </div>
        @endforeach

        
      </div>
    </div>
  </main>

</x-layout>
