<x-layout>
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <x-perfilSideBar></x-perfilSideBar>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <div class="container mx-auto py-8 px-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Minhas Compras</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($compras as $compra)
                        @foreach ($compra->produtos as $item)
                            <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                                <!-- Imagem do produto -->
                                <div class="relative h-48 bg-gray-100">
                                    <img src="{{ $item->imagem }}" alt="{{ $item->nome }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Detalhes do produto -->
                                <div class="p-4">
                                    <h3 class="font-bold text-lg text-gray-800">{{ $item->nome }}</h3>
                                    <p class="text-sm text-gray-600">{{ ucfirst($item->tipo_produto) }}</p>
                                    <p class="text-sm text-gray-600">Vendido por:
                                        <span class="font-medium text-gray-800">
                                            {{ $item->vendedor->username ?? 'Vendedor não encontrado' }}
                                        </span>
                                    </p>
                                    <p class="text-gray-800 font-semibold mt-2">
                                        {{ number_format($item->preco_unitario, 2) }}€
                                    </p>
                                    <p class="text-sm text-gray-500">Pedido #{{ $compra->id }}</p>
                                </div>

                                <!-- Informações adicionais -->
                                <div class="p-4 bg-gray-50 flex items-center justify-between">
                                    <p class="text-sm text-gray-500">Data: {{ $compra->created_at->format('d/m/Y') }}</p>
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                                        Pago
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @empty
                        <p class="text-gray-500">Você ainda não realizou nenhuma compra.</p>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</x-layout>
