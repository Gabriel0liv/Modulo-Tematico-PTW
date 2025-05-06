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

   <footer class="bg-blue-600 text-white">
    <!-- Seção principal do footer -->
    <div class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Coluna 1: Logo e Sobre -->
        <div class="mb-6 md:mb-0">
          <h2 class="text-2xl font-bold mb-4">GAMESWAP</h2>
          <p class="text-blue-100 mb-4">
            A maior plataforma de compra, venda e troca de jogos e consoles de Portugal.
          </p>
          <div class="flex space-x-4 mt-4">
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497-3.753C20.18 7.773 21.692 5.25 22 4.009z"></path></svg>
            </a>
            <a href="#" class="text-white hover:text-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
            </a>
          </div>
        </div>

        <!-- Coluna 2: Links Rápidos -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-lg font-semibold mb-4">Links Rápidos</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-blue-100 hover:text-white">Início</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Explorar Consoles</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Ver Jogos</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Como Funciona</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Anunciar Produto</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Assinar Premium</a></li>
          </ul>
        </div>

        <!-- Coluna 3: Categoria -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-lg font-semibold mb-4">Categorias</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-blue-100 hover:text-white">PlayStation 5</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Xbox Series X</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Nintendo Switch</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">PlayStation 4</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Acessórios</a></li>
            <li><a href="#" class="text-blue-100 hover:text-white">Jogos Retro</a></li>
          </ul>
        </div>

        <!-- Coluna 4: Contato e Newsletter -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Fique por dentro</h3>
          <p class="text-blue-100 mb-4">Receba notificações sobre novos jogos e ofertas especiais.</p>
          <form class="flex flex-col sm:flex-row gap-2">
            <input placeholder="Seu email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-sm" />
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-medium px-4 py-2 rounded-md whitespace-nowrap">
              Inscrever
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Barra inferior com copyright -->
    <div class="bg-blue-700 py-4">
      <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <p class="text-sm text-blue-100 text-center md:text-left">
          &copy; 2025 GAMESWAP. Todos os direitos reservados.
        </p>
        <div class="mt-4 md:mt-0">
          <ul class="flex space-x-6 justify-center">
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Termos de Uso</a></li>
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Política de Privacidade</a></li>
            <li><a href="#" class="text-sm text-blue-100 hover:text-white">Ajuda</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>



</body>
</html>
