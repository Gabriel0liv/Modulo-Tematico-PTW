
<div class="container mx-auto flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
        <div class="relative flex items-center">
            <a href="/" class="text-white font-bold text-xl tracking-tight">GAMESWAP</a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="relative max-w-xl w-full mx-4">
        <input
            type="text"
            class="w-full py-2 pl-10 pr-4 rounded-full border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 transition-all"
            placeholder="Buscar jogos, consoles, acessórios..."
        />
        <div class="absolute inset-y-0 left-3 flex items-center">
          <i class="bi bi-search text-gray-400 text-lg"></i>
        </div>
    </div>

    <!-- Navigation Icons and Anunciar Produto Button -->
    <div class="flex items-center space-x-6">
        <button id='user-profile-btn' class="relative group" aria-label="Perfil">
            <i class="bi bi-person-circle text-white text-xl"></i>
        </button>
        <!-- User Profile Button (Mobile) -->
        <button id="user-profile-btn-mobile" class="md:hidden p-2 rounded-md text-white hover:bg-primary-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </button>
        <!-- User Profile Info (Hidden until logged in) -->

        <a href="{{ route('perfilPage') }}" id="user-profile-info" class="items-center space-x-2">
            <span class="text-white text-sm font-semibold">
                {{ Auth::user()->username }}
            </span>
        </a>
        <div class="relative group">
            <button id="notificationBtn" class="relative group z-50" aria-label="Notificações">
                <i class="bi bi-bell text-white text-xl"></i>
            </button>
            <!-- notification modal -->
            <div id="notificationModal" class="modal absolute top-full left-1/2 -translate-x-1/2 mt-2 w-64 bg-white shadow-lg rounded-lg p-4 z-40 active">
                  <p>Sem novas notificações.</p>
            </div>
        </div>
        <a href="{{route('carrinhoPage')}}" class="relative group" aria-label="Carrinho">
            <i class="bi bi-cart text-white text-xl"></i>

        </a>
        <a href="{{route('anunciarPage')}}"
           class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium bg-amber-400 hover:bg-amber-500 text-gray-800 px-5 py-2 transition-colors shadow-sm">
            Anunciar Produto
        </a>

    </div>
</div>
