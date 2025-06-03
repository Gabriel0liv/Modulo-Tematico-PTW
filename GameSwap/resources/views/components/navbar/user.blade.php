
<div class="container mx-auto flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
        <div class="relative flex items-center">
            <a href="/" class="text-white font-bold text-xl tracking-tight">GAMESWAP</a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="relative max-w-xl w-full mx-4">
        <form action="{{ route('pesquisaPage') }}" method="GET" class="relative">
            <input
                type="text"
                id="search-input"
                name="query"
                class="w-full py-2 pl-10 pr-4 rounded-full border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 transition-all"
                placeholder="Buscar jogos, consoles, acessórios..."
                value="{{ request('query') }}"
            />
            <div class="absolute inset-y-0 left-3 flex items-center">
                <i class="bi bi-search text-gray-400 text-lg"></i>
            </div>
        </form>
        <!-- Autocomplete Suggestions -->
        <div id="autocomplete-results" class="absolute w-full bg-white shadow-lg rounded-lg mt-2 hidden z-50"></div>
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
            <div id="notificationModal" class="modal absolute top-full left-1/2 -translate-x-1/2 mt-2 w-64 bg-white shadow-lg rounded-lg p-4 z-40">
                  <p>Sem novas notificações.</p>
            </div>
        </div>
        <a href="{{ route('carrinho.index') }}" class="relative group" aria-label="Carrinho">
            <i class="bi bi-cart text-white text-xl"></i>

        </a>
        <a href="{{route('anunciarPage')}}"
           class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium bg-amber-400 hover:bg-amber-500 text-gray-800 px-5 py-2 transition-colors shadow-sm">
            Anunciar Produto
        </a>

    </div>
    <!-- Notificação reativa com Alpine.js -->

</div>

@push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-input');
            const resultsContainer = document.getElementById('autocomplete-results');

            searchInput.addEventListener('input', function () {
                const query = searchInput.value;

                if (query.length > 2) {
                    fetch(`/api/search-suggestions?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            resultsContainer.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    const suggestion = document.createElement('div');
                                    suggestion.classList.add('p-2', 'hover:bg-gray-100', 'cursor-pointer');
                                    suggestion.innerHTML = `<strong>${item.nome}</strong> - ${item.console}`;
                                    suggestion.addEventListener('click', () => {
                                        searchInput.value = item.nome;
                                        resultsContainer.classList.add('hidden');
                                    });
                                    resultsContainer.appendChild(suggestion);
                                });
                                resultsContainer.classList.remove('hidden');
                            } else {
                                resultsContainer.classList.add('hidden');
                            }
                        });
                } else {
                    resultsContainer.classList.add('hidden');
                }
            });

            document.addEventListener('click', function (e) {
                if (!resultsContainer.contains(e.target) && e.target !== searchInput) {
                    resultsContainer.classList.add('hidden');
                }
            });
        });
    </script>
@endpush
