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
            <a href="{{route('cart.adicionar')}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 transition h-10 px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Adicionar Cartão
          </a>
        </div>

        <div class="space-y-4">
          <!-- Card 1 - Primary -->
            @foreach ($cartoes as $cartao)
                <div class="bg-white border border-gray-300 rounded-lg p-4 shadow-sm mb-4">
                    <p class="font-semibold text-gray-800">
                        Cartão: {{ ucfirst($cartao->brand) }} **** **** **** {{ $cartao->last4 }}
                    </p>
                    <p class="text-sm text-gray-600">
                        Validade: {{ $cartao->exp_month }}/{{ $cartao->exp_year }}
                    </p>
                    <p class="text-sm text-gray-600">
                        Nome no cartão: {{ $cartao->nome_cartao ?? 'N/A' }}
                    </p>
                    @if ($cartao->is_default)
                        <span class="text-xs font-semibold px-2 py-1 bg-blue-500 text-white rounded-full">Principal</span>
                    @endif
                </div>
            @endforeach
        </div>
      </div>
    </main>
  </div>
</x-layout>
