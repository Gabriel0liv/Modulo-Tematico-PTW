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
                                <button onclick="showDeleteModal('{{ route('cartoes.desativar', $cartao->id) }}')"  class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
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
    <!-- Modal de Confirmação com Animação -->
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div id="modalBox"
             class="bg-white rounded-2xl shadow-xl max-w-sm w-full p-6 text-center transform scale-95 opacity-0 transition-all duration-300">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmar Exclusão</h2>
            <p class="text-gray-600 mb-6">Tem certeza que deseja apagar este cartão?</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                    Cancelar
                </button>
                <form id="deleteAddressForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Apagar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function showDeleteModal(actionUrl) {
                const modal = document.getElementById('confirmModal');
                const modalBox = document.getElementById('modalBox');
                const form = document.getElementById('deleteAddressForm');

                form.action = actionUrl;
                modal.classList.remove('hidden');

                // Reset animação antes de aplicar
                modalBox.classList.remove('scale-95', 'opacity-0');
                modalBox.classList.add('scale-100', 'opacity-100');
            }

            function closeModal() {
                const modal = document.getElementById('confirmModal');
                const modalBox = document.getElementById('modalBox');

                // Reverte a animação
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');

                // Aguarda o fim da animação para esconder
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        </script>
    @endpush
</x-layout>
