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
            @if (count($cartoes) === 0)
                <!-- Mensagem caso NÃO existam produtos relacionados -->
                <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                    <p class="font-semibold text-lg">Nenhum cartão adicionado</p>
                    <p class="text-sm">Adicione cartões, para que facilite suas compras!</p>
                </div>
            @else
                @foreach ($cartoes as $cartao)
                    <label class="block bg-white border border-gray-300 rounded-lg p-4 shadow-sm mb-4 cursor-pointer hover:border-blue-500">
                        <div class="flex items-center gap-2">
                            <form action="{{route('cartoes.desativar', $cartao->id)}}"  method="POST" onsubmit="return confirm('Tem certeza que deseja apagar o cartão');">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                            <div>
                                <p class="font-semibold text-gray-800">
                                    Cartão: {{ ucfirst($cartao->brand) }} **** **** **** {{ $cartao->last4 }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Validade: {{ $cartao->exp_month }}/{{ $cartao->exp_year }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Titular do Cartão: {{ $cartao->nome_titular ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </label>
                @endforeach
            @endif
        </div>
      </div>
    </main>
  </div>
</x-layout>
