<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Minhas Compras</h1>
          <div class="relative w-64">
            <input
              type="text"
              class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
              placeholder="Pesquisar compras..."
            />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>

        <div class="space-y-4">
            @forelse($compras as $compra)
                @foreach ($compra->produtos as $item)
                    <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
                        <div class="flex items-center p-4 md:p-6">
                            <div class="relative h-20 w-20 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
                                <img src="{{ $item->imagem }}" class="w-full h-full object-cover" alt="{{ $item->nome }}">
                            </div>
                            <div class="ml-6 flex-1">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ $item->nome }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ ucfirst($item->tipo_produto) }}</p>
                                    </div>
                                    <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end">
                                        <p class="text-lg font-medium text-gray-900">{{ number_format($item->preco_unitario, 2) }}€</p>
                                        <p class="text-sm text-gray-500">Pedido #{{ $compra->id }}</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <p class="text-sm text-gray-500">Data: {{ $compra->created_at->format('d/m/Y') }}</p>
                                    <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors bg-yellow-500 text-white">
                            Pago
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-gray-500">Nenhuma compra encontrada.</p>
            @endforelse






        </div>
      </div>
    </main>
  </div>
</x-layout>
