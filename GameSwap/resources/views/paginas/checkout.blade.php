<x-layout>
    <div class="max-w-6xl mx-auto p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Moradas -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded shadow-sm border">
                    <h2 class="text-xl font-semibold mb-4">Escolha uma Morada</h2>

                    @foreach ($moradas as $morada)
                        <div class="rounded-lg border bg-card text-card-foreground shadow-card">
                            <div class="flex flex-row items-center justify-between p-6 pb-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <h3 class="text-lg font-semibold leading-none tracking-tight">{{ $morada->nome_morada }}</h3>
                                </div>
                            </div>
                            <div class="p-6 pt-0 text-gray-700 text-sm space-y-1">
                                <p>{{ $morada->morada }}</p>
                                <p>{{ $morada->codigo_postal }}, {{ $morada->concelho->nome ?? 'N/A' }}</p>
                                <p>{{ $morada->distrito->nome ?? 'N/A' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cartões -->
                <div class="bg-white p-6 rounded shadow-sm border">
                    <h2 class="text-xl font-semibold mb-4">Escolha um Cartão</h2>

                    @forelse ($cartoes as $cartao)
                        <label class="block bg-white border border-gray-300 rounded-lg p-4 shadow-sm mb-4 cursor-pointer">
                            <div class="flex items-start justify-between">
                                <div>
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
                                <input type="radio" name="cartao_id" value="{{ $cartao->id }}" class="mt-1" {{ $loop->first ? 'checked' : '' }}>
                            </div>
                        </label>
                    @empty
                        <p class="text-sm text-gray-500">Nenhum cartão disponível.</p>
                    @endforelse
                </div>
            </div>

            <!-- Resumo -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded shadow-sm border sticky top-4">
                    <h2 class="text-xl font-semibold mb-4">Resumo do Pedido</h2>

                    <div class="space-y-4 mb-4">
                        @forelse($carrinho as $item)
                            <div class="flex space-x-3">
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-xl">🕹️</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-sm">{{ $item['nome'] }}</h4>
                                    <p class="text-xs text-gray-600">Qtd: {{ $item['quantidade'] }}</p>
                                    <p class="font-bold text-sm">€{{ number_format($item['preco'], 2, ',', '.') }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Carrinho vazio.</p>
                        @endforelse
                    </div>

                    <hr class="my-4">

                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>€{{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Envio</span>
                            <span>€0,00</span>
                        </div>
                        <div class="flex justify-between font-bold text-lg">
                            <span>Total</span>
                            <span>€{{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                    </div>

                    <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Finalizar Compra
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
