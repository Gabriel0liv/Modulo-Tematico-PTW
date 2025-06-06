<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body class="flex flex-col min-h-screen">

  <header class="bg-gradient-to-r from-blue-600 to-blue-500 py-3 px-4 shadow-md">
    @auth
      @if(Auth::user()->isAdmin())
          <x-navbar.admin />
      @else
          <x-navbar.user />
      @endif
    @else
      <x-navbar.guest />
    @endauth
  </header>

   <main class="container mx-auto py-8 px-4 flex-1">
    {{ $slot }}
   </main>

  <footer class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white relative overflow-hidden">
      <!-- Background Pattern -->
      <div class="absolute inset-0 opacity-5 pointer-events-none">
          <div class="absolute top-10 left-10 w-20 h-20 border border-white/20 rounded-full"></div>
          <div class="absolute top-32 right-20 w-16 h-16 border border-white/20 rounded-full"></div>
          <div class="absolute bottom-20 left-1/4 w-12 h-12 border border-white/20 rounded-full"></div>
          <div class="absolute bottom-32 right-1/3 w-8 h-8 border border-white/20 rounded-full"></div>
      </div>

      <!-- Main Footer Content -->
      <div class="container mx-auto px-4 py-12 relative z-10">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">

              <!-- Company Info -->
              <div class="lg:col-span-1">
                  <div class="flex items-center mb-6">
                      <i class="bi bi-controller text-2xl mr-3 text-blue-200"></i>
                      <h2 class="text-3xl font-bold bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                          GAMESWAP
                      </h2>
                  </div>
                  <p class="text-blue-100 mb-6 leading-relaxed">
                      A maior plataforma de compra, venda de jogos e consoles de Portugal.
                  </p>

                  <!-- Contact Info -->
                  <div class="space-y-3">
                      <div class="flex items-center text-blue-100 hover:text-white transition-colors duration-200">
                          <i class="bi bi-envelope w-4 h-4 mr-3"></i>
                          <span class="text-sm">santananunesj32@gmail.com</span>
                      </div>
                      <div class="flex items-center text-blue-100 hover:text-white transition-colors duration-200">
                          <i class="bi bi-telephone w-4 h-4 mr-3"></i>
                          <span class="text-sm">+351 911 058 352</span>
                      </div>
                      <div class="flex items-center text-blue-100 hover:text-white transition-colors duration-200">
                          <i class="bi bi-geo-alt w-4 h-4 mr-3"></i>
                          <span class="text-sm">Aveiro, Portugal</span>
                      </div>
                  </div>
              </div>

              <!-- Quick Links -->
              <div>
                  <div class="flex items-center mb-6">
                      <i class="bi bi-people text-lg mr-2 text-blue-200"></i>
                      <h3 class="text-lg font-semibold text-white">Links Rápidos</h3>
                  </div>
                  <ul class="space-y-3">
                      <li>
                          <a href="{{route('pagina_inicial')}}" class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                              <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                              Início
                          </a>
                      </li>
                      <li>
                          <a href="/pesquisa?tipo=console" class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                              <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                              Explorar Consoles
                          </a>
                      </li>
                      <li>
                          <a href="/pesquisa?tipo=jogo" class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                              <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                              Explorar Jogos
                          </a>
                      </li>
                      <li>
                          <a href="{{route('anunciarPage')}}" class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                              <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                              Anunciar Produto
                          </a>
                      </li>
                      <li>
                          <a href="{{route('perfil-Anuncios')}}" class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                              <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                              <i class="bi bi-star mr-1"></i>
                              Destacar Produto
                          </a>
                      </li>
                  </ul>
              </div>

              <!-- Categories -->
              <div>
                  <div class="flex items-center mb-6">
                      <i class="bi bi-display text-lg mr-2 text-blue-200"></i>
                      <h3 class="text-lg font-semibold text-white">Consoles</h3>
                  </div>
                  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4">
                      @foreach($modelo_consoles->chunk(6) as $chunk)
                          <ul class="space-y-3">
                              @foreach($chunk as $modelo)
                                  <li>
                                      <a href="/pesquisa?query=&genero=&modelo={{ $modelo->id }}"
                                         class="text-blue-100 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                          <span class="w-1 h-1 bg-blue-300 rounded-full mr-3 group-hover:bg-white transition-colors"></span>
                                          {{ $modelo->nome }}
                                      </a>
                                  </li>
                              @endforeach
                          </ul>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>

      <!-- Bottom Bar -->
      <div class="bg-gradient-to-r from-blue-800 to-blue-900 py-6 border-t border-blue-600/30">
          <div class="container mx-auto px-4">
              <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                  <div class="flex items-center space-x-2">
                      <i class="bi bi-shield-check text-blue-200"></i>
                      <p class="text-sm text-blue-100">&copy; 2025 GAMESWAP. Todos os direitos reservados.</p>
                  </div>
                  <div class="flex flex-wrap justify-center md:justify-end space-x-6">
                      <a href="{{route('termos')}}" class="text-sm text-blue-100 hover:text-white transition-colors duration-200 hover:underline">
                          Termos de Uso
                      </a>
                      <a href="{{route('privacidade')}}" class="text-sm text-blue-100 hover:text-white transition-colors duration-200 hover:underline">
                          Política de Privacidade
                      </a>
                      <a href="{{route('ajuda')}}" class="text-sm text-blue-100 hover:text-white transition-colors duration-200 hover:underline">
                          Ajuda
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>



  @stack('scripts')
  @if (session('success') || session('error'))
      <div
          id="toast"
          class="fixed bottom-5 right-5 z-50 px-5 py-3 rounded-md shadow-lg text-white text-base max-w-md w-full animate-fade-in-out transition-all duration-500"
          style="background-color: {{ session('success') ? '#4ade80' : '#f87171' }};" {{-- verde claro e vermelho claro --}}
      >
          {{ session('success') ?? session('error') }}
      </div>

      <script>
          setTimeout(() => {
              const toast = document.getElementById('toast');
              if (toast) toast.style.opacity = '0';
          }, 3000);
      </script>
  @endif
</body>
</html>
