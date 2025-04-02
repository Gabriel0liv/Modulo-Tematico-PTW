<x-layout>
    <!-- Chat Container -->
  <div class="flex-1 flex overflow-hidden">
    <!-- Sidebar - Conversas -->
    <div class="w-full md:w-80 bg-white border-r border-gray-200 flex flex-col">
      <div class="p-4 border-b border-gray-200 md:hidden">
        <div class="relative">
          <input type="text" placeholder="Buscar conversas..." class="w-full py-2 px-3 rounded-md bg-gray-100 text-gray-800 text-sm focus:outline-none">
          <button class="absolute right-2 top-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
        </div>
      </div>
      <div class="p-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="font-semibold text-lg">Mensagens</h2>
        <button class="text-blue-600 hover:text-blue-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </button>
      </div>
      <div class="overflow-y-auto flex-1">
        <!-- Conversa ativa -->
        <div class="p-3 flex items-center space-x-3 bg-blue-50 border-l-4 border-blue-600">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-12 w-12 rounded-full">
            <span class="absolute bottom-0 right-0 bg-green-500 rounded-full h-3 w-3 border-2 border-white"></span>
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-center">
              <h3 class="font-semibold text-gray-900 truncate">Lucas Silva</h3>
              <span class="text-xs text-gray-500">14:32</span>
            </div>
            <p class="text-sm text-gray-600 truncate">Olá! Tenho interesse no PS5 que você anunciou. Ainda está disponível?</p>
          </div>
        </div>

        <!-- Outras conversas -->
        <div class="p-3 flex items-center space-x-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-12 w-12 rounded-full">
            <span class="absolute bottom-0 right-0 bg-gray-400 rounded-full h-3 w-3 border-2 border-white"></span>
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-center">
              <h3 class="font-semibold text-gray-900 truncate">Mariana Costa</h3>
              <span class="text-xs text-gray-500">Ontem</span>
            </div>
            <p class="text-sm text-gray-600 truncate">Obrigada pela negociação! O jogo chegou perfeitamente.</p>
          </div>
        </div>

        <div class="p-3 flex items-center space-x-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-12 w-12 rounded-full">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-center">
              <h3 class="font-semibold text-gray-900 truncate">Rafael Mendes</h3>
              <span class="text-xs text-gray-500">23/03</span>
            </div>
            <p class="text-sm text-gray-600 truncate">Você aceitaria trocar por um Nintendo Switch?</p>
          </div>
        </div>

        <div class="p-3 flex items-center space-x-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-12 w-12 rounded-full">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-center">
              <h3 class="font-semibold text-gray-900 truncate">Carla Oliveira</h3>
              <span class="text-xs text-gray-500">20/03</span>
            </div>
            <p class="text-sm text-gray-600 truncate">Tem algum jogo de PS4 para vender?</p>
          </div>
        </div>

        <div class="p-3 flex items-center space-x-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-12 w-12 rounded-full">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-center">
              <h3 class="font-semibold text-gray-900 truncate">Pedro Almeida</h3>
              <span class="text-xs text-gray-500">18/03</span>
            </div>
            <p class="text-sm text-gray-600 truncate">Podemos combinar a entrega para amanhã?</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Principal -->
    <div class="hidden md:flex flex-1 flex-col bg-gray-50">
      <!-- Header do chat -->
      <div class="p-4 border-b border-gray-200 bg-white flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="relative">
            <img src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-10 w-10 rounded-full">
            <span class="absolute bottom-0 right-0 bg-green-500 rounded-full h-2.5 w-2.5 border-2 border-white"></span>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900">Lucas Silva</h3>
            <p class="text-xs text-green-600">Online agora</p>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <button class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </button>
          <button class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
          </button>
          <button class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Área de mensagens -->
      <div class="flex-1 overflow-y-auto p-4 space-y-4">
        <!-- Data -->
        <div class="text-center">
          <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full">Hoje, 14:30</span>
        </div>

        <!-- Mensagem do outro usuário -->
        <div class="flex items-end space-x-2">
          <img src="/placeholder.svg?height=32&width=32" alt="Avatar" class="h-8 w-8 rounded-full">
          <div class="max-w-md bg-white p-3 rounded-lg rounded-bl-none shadow-sm">
            <p class="text-gray-800">Olá! Tenho interesse no PS5 que você anunciou. Ainda está disponível?</p>
          </div>
          <span class="text-xs text-gray-500 self-end">14:30</span>
        </div>

        <!-- Mensagem do usuário atual -->
        <div class="flex items-end justify-end space-x-2">
          <span class="text-xs text-gray-500 self-end">14:31</span>
          <div class="max-w-md bg-blue-600 p-3 rounded-lg rounded-br-none shadow-sm">
            <p class="text-white">Olá Lucas! Sim, o PS5 ainda está disponível. É o modelo com leitor de disco, com 1 ano de uso e em perfeito estado.</p>
          </div>
        </div>

        <!-- Mensagem do outro usuário -->
        <div class="flex items-end space-x-2">
          <img src="/placeholder.svg?height=32&width=32" alt="Avatar" class="h-8 w-8 rounded-full">
          <div class="max-w-md bg-white p-3 rounded-lg rounded-bl-none shadow-sm">
            <p class="text-gray-800">Ótimo! Qual o valor que você está pedindo? Aceita alguma troca parcial?</p>
          </div>
          <span class="text-xs text-gray-500 self-end">14:32</span>
        </div>

        <!-- Indicador de digitação -->
        <div class="flex items-end space-x-2">
          <img src="/placeholder.svg?height=32&width=32" alt="Avatar" class="h-8 w-8 rounded-full">
          <div class="bg-gray-200 p-3 rounded-lg rounded-bl-none">
            <div class="flex space-x-1">
              <div class="h-2 w-2 bg-gray-500 rounded-full animate-bounce"></div>
              <div class="h-2 w-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
              <div class="h-2 w-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Área de entrada de mensagem -->
      <div class="p-4 bg-white border-t border-gray-200">
        <div class="flex items-end space-x-2">
          <button class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
          </button>
          <button class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </button>
          <div class="flex-1 relative">
            <input type="text" placeholder="Digite sua mensagem..." class="w-full py-2 px-4 rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <button class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Tela de seleção de chat (mobile) -->
    <div class="flex-1 flex flex-col items-center justify-center bg-gray-50 md:hidden">
      <img src="/placeholder.svg?height=120&width=120" alt="Chat" class="h-24 w-24 mb-4 opacity-50">
      <h3 class="text-xl font-semibold text-gray-700 mb-2">Suas mensagens</h3>
      <p class="text-gray-500 text-center max-w-xs mb-4">Selecione uma conversa à esquerda para começar a trocar mensagens</p>
      <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
        Nova mensagem
      </button>
    </div>
  </div>

  <!-- Footer para mobile - navegação rápida -->
  <div class="md:hidden bg-white border-t border-gray-200 py-2">
    <div class="flex justify-around">
      <a href="#" class="flex flex-col items-center p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-xs text-gray-500">Início</span>
      </a>
      <a href="#" class="flex flex-col items-center p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span class="text-xs text-gray-500">Explorar</span>
      </a>
      <a href="#" class="flex flex-col items-center p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <span class="text-xs text-blue-600">Mensagens</span>
      </a>
      <a href="#" class="flex flex-col items-center p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="text-xs text-gray-500">Anúncios</span>
      </a>
      <a href="#" class="flex flex-col items-center p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span class="text-xs text-gray-500">Perfil</span>
      </a>
    </div>
  </div>
</x-layout>