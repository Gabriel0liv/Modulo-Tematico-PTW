<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
  <header class="bg-gradient-to-r from-blue-600 to-blue-500 py-3 px-4 shadow-md">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <div class="relative flex items-center">
                <div class="relative mr-2">
                    <div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center shadow-inner">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 12H10" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                            <path d="M8 10V14" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-white font-bold text-xl tracking-tight">GAMESWAP</div>
            </div>
        </div>
        
        <!-- Search Bar -->
        <div class="relative max-w-xl w-full mx-4">
            <input
                type="text"
                class="w-full py-2 pl-10 pr-4 rounded-full border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 transition-all"
                placeholder="Buscar jogos, consoles, acessórios..."
            />
            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                <i class="bi bi-search text-gray-400"></i>
            </div>
        </div>

        <!-- Navigation Icons and Anunciar Produto Button -->
        <div class="flex items-center space-x-6">
            <button class="relative group" aria-label="Perfil">
                <i class="bi bi-person-circle text-white text-xl"></i>
            </button>
            <button class="relative group" aria-label="Notificações">
                <i class="bi bi-bell text-white text-xl"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
            </button>
            <button class="relative group" aria-label="Mensagens">
                <i class="bi bi-chat-dots text-white text-xl"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">2</span>
            </button>
            <button class="relative group" aria-label="Carrinho">
                <i class="bi bi-cart text-white text-xl"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">1</span>
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium bg-amber-400 hover:bg-amber-500 text-gray-800 px-5 py-2 transition-colors shadow-sm">
                Anunciar Produto
            </button>
        </div>
    </div>
</header>

   <main class="container mx-auto py-8 px-4">
    {{ $slot }}
   </main>

   <footer>
    <h2>Termos e condições</h2>
   </footer>

  
</body>
</html>