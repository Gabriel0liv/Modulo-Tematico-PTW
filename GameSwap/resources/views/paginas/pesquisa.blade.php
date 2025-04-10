<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marketplace de Jogos</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            primary: {
              DEFAULT: '#2563EB',
              light: '#3B82F6',
              dark: '#1E40AF',
              50: '#EFF6FF',
              100: '#DBEAFE',
              200: '#BFDBFE',
              300: '#93C5FD',
              400: '#60A5FA',
              500: '#3B82F6',
              600: '#2563EB',
              700: '#1D4ED8',
              800: '#1E40AF',
              900: '#1E3A8A',
            },
            secondary: {
              DEFAULT: '#FBBF24',
              light: '#FCD34D',
              50: '#FFFBEB',
              100: '#FEF3C7',
              200: '#FDE68A',
              300: '#FCD34D',
              400: '#FBBF24',
              500: '#F59E0B',
              600: '#D97706',
              700: '#B45309',
              800: '#92400E',
              900: '#78350F',
            },
            gray: {
              50: '#F9FAFB',
              100: '#F3F4F6',
              200: '#E5E7EB',
              300: '#D1D5DB',
              400: '#9CA3AF',
              500: '#6B7280',
              600: '#4B5563',
              700: '#374151',
              800: '#1F2937',
              900: '#111827',
              950: '#020817',
            },
            muted: '#8F96A3',
          }
        }
      }
    }
  </script>
  <style>
    /* Custom range slider styling */
    .price-slider {
      -webkit-appearance: none;
      width: 100%;
      height: 6px;
      border-radius: 5px;
      background: #E5E7EB;
      outline: none;
    }

    .price-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #2563EB;
      cursor: pointer;
      border: 2px solid white;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .price-slider::-moz-range-thumb {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #2563EB;
      cursor: pointer;
      border: 2px solid white;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Custom select styling */
    .custom-select {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%234B5563'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 0.5rem center;
      background-size: 1.5em 1.5em;
    }

    /* Hover effect for game cards */
    .game-card {
      transition: all 0.3s ease;
    }

    .game-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .game-card .quick-actions {
      opacity: 0;
      transition: opacity 0.3s ease, transform 0.3s ease;
      transform: translateY(10px);
    }

    .game-card:hover .quick-actions {
      opacity: 1;
      transform: translateY(0);
    }

    /* Mobile menu toggle */
    #mobile-filter-toggle:checked ~ .mobile-filter-menu {
      display: block;
    }

    /* Custom checkbox styling */
    .custom-checkbox {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .custom-checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    .checkmark {
      height: 18px;
      width: 18px;
      background-color: #fff;
      border: 2px solid #D1D5DB;
      border-radius: 4px;
      position: relative;
    }

    .custom-checkbox:hover input ~ .checkmark {
      border-color: #2563EB;
    }

    .custom-checkbox input:checked ~ .checkmark {
      background-color: #2563EB;
      border-color: #2563EB;
    }

    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    .custom-checkbox input:checked ~ .checkmark:after {
      display: block;
    }

    .custom-checkbox .checkmark:after {
      left: 5px;
      top: 2px;
      width: 6px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #F3F4F6;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: #BFDBFE;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #93C5FD;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen font-sans">
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
            <select class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
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
            <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</h3>
            <div class="space-y-2">
              <label class="custom-checkbox flex items-center">
                <input type="checkbox" class="sr-only">
                <span class="checkmark mr-2"></span>
                <span class="text-sm text-gray-700">Novo</span>
              </label>
              <label class="custom-checkbox flex items-center">
                <input type="checkbox" class="sr-only">
                <span class="checkmark mr-2"></span>
                <span class="text-sm text-gray-700">Usado</span>
              </label>
              <label class="custom-checkbox flex items-center">
                <input type="checkbox" class="sr-only">
                <span class="checkmark mr-2"></span>
                <span class="text-sm text-gray-700">Digital</span>
              </label>
              <label class="custom-checkbox flex items-center">
                <input type="checkbox" class="sr-only">
                <span class="checkmark mr-2"></span>
                <span class="text-sm text-gray-700">Pré-venda</span>
              </label>
            </div>
          </div>

          <!-- Region Filter -->
          <div class="space-y-3">
            <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Região</h3>
            <select class="custom-select w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
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
                <span class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500 text-sm">€</span>
                <input type="number" placeholder="Min" class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded-md text-sm">
              </div>
              <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500 text-sm">€</span>
                <input type="number" placeholder="Max" class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded-md text-sm">
              </div>
            </div>
          </div>

          <hr class="border-gray-100">

          <!-- Apply Filters Button -->
          <div class="space-y-2">
            <button class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2.5 px-4 rounded-lg font-medium transition-colors flex items-center justify-center">
              <i class="fas fa-filter mr-2 text-sm"></i>
              Aplicar Filtros
            </button>
            <button class="w-full text-gray-500 hover:text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors text-sm">
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
        <label for="mobile-filter-toggle" class="w-full flex items-center justify-between border border-gray-200 rounded-lg px-4 py-2.5 cursor-pointer bg-white">
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

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
              @foreach ($produtos as $produto)
                  <div class="game-card bg-white rounded-xl shadow-sm overflow-hidden flex flex-col h-full">
                      <div class="relative">
                          <div class="bg-gray-200 aspect-square relative overflow-hidden">
                              <div class="absolute inset-0 bg-gradient-to-br from-gray-300 to-gray-100 flex items-center justify-center text-gray-400">
                                  <i class="fas fa-gamepad text-4xl"></i>
                              </div>
                          </div>

                          <!-- Badges -->
                          <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                    <span class="inline-flex items-center rounded-full bg-green-500 px-2.5 py-0.5 text-xs font-semibold text-white">
                        Novo
                    </span>
                          </div>

                          <!-- Quick actions -->
                          <div class="quick-actions absolute inset-0 bg-black/40 flex items-center justify-center gap-3">
                              <button class="bg-white text-gray-800 rounded-full p-2.5 hover:bg-gray-100 shadow-md">
                                  <i class="fas fa-shopping-cart text-sm"></i>
                              </button>
                              <button class="bg-white text-gray-800 rounded-full p-2.5 hover:bg-gray-100 shadow-md">
                                  <i class="fas fa-star text-sm"></i>
                              </button>
                          </div>
                      </div>

                      <div class="p-4 flex flex-col justify-between flex-grow">
                          <div>
                              <div class="flex items-start justify-between">
                                  <div>
                                      <h3 class="font-medium text-gray-800 hover:text-primary-600 transition-colors">{{$produto['nome']}}</h3>
                                      <p class="text-sm text-muted mt-0.5">{{$produto['console']}}</p>
                                  </div>
                                  <div class="flex items-center gap-1 text-secondary-400">
                                      <i class="fas fa-star text-xs"></i>
                                      <span class="text-xs font-medium">4.5</span>
                                  </div>
                              </div>
                          </div>

                          <div class="mt-3 flex items-center justify-between">
                              <p class="font-bold text-gray-900">R$ {{$produto['preco']}}</p>
                              <a href="/produto/{{$produto['id']}}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                                  Ver detalhes
                              </a>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
          <nav class="flex items-center gap-1">
            <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-400 bg-white cursor-not-allowed" disabled>
              <i class="fas fa-chevron-left mr-1 text-xs"></i>
              Anterior
            </button>
            <button class="w-9 h-9 flex items-center justify-center border border-primary-600 rounded-lg text-sm bg-primary-50 text-primary-700 font-medium">1</button>
            <button class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">2</button>
            <button class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">3</button>
            <span class="px-2 text-gray-500">...</span>
            <button class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">10</button>
            <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
              Próximo
              <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </button>
          </nav>
        </div>
      </main>
    </div>
  </div>

  <script>
    // Simple script for price range slider
    document.addEventListener('DOMContentLoaded', function() {
      const priceSliders = document.querySelectorAll('.price-slider');

      priceSliders.forEach(slider => {
        slider.addEventListener('input', function() {
          const value = this.value;
          const min = this.min ? this.min : 0;
          const max = this.max ? this.max : 100;
          const percentage = ((value - min) * 100) / (max - min);

          this.style.background = `linear-gradient(to right, #2563EB ${percentage}%, #e5e7eb ${percentage}%)`;
        });

        // Trigger the input event to set initial gradient
        const event = new Event('input');
        slider.dispatchEvent(event);
      });

      // Custom checkbox functionality
      const checkboxes = document.querySelectorAll('.custom-checkbox input');
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
          // Additional functionality can be added here if needed
        });
      });
    });
  </script>
</body>
</html>
