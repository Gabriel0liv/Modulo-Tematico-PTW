<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Finalizar Compra</h1>
            <p class="text-gray-600">Complete os dados para finalizar a sua compra</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <form action="{{route('checkout.finalizar')}}" method="POST" >
                @csrf
                <div class="lg:col-span-2 space-y-6">

                    <!-- Delivery Address -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl">📍</span>
                            <h2 class="text-xl font-semibold">Morada de Entrega</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="text-sm text-gray-600 mb-2">Selecione uma morada guardada ou introduza uma nova:</div>

                            <!-- Address Selection -->
                            <div class="space-y-3">
                                <!-- Saved Address 1 -->
                                @foreach ($moradas as $morada)
                                    <label class="block cursor-pointer">
                                        <input type="radio" name="morada_id" value="{{ $morada->id }}" class="sr-only peer" {{ $loop->first ? 'checked' : '' }}>
                                        <div class="rounded-lg border bg-card text-card-foreground shadow-card peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-300">
                                            <div class="flex flex-row items-center justify-between p-6 pb-2">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    <h3 class="text-lg font-semibold leading-none tracking-tight">{{ $morada->nome_morada }}</h3>
                                                </div>

                                                @if ($morada->is_default ?? false)

                                                    <span class="text-xs font-semibold px-2 py-1 bg-blue-500 text-white rounded-full">Principal</span>
                                                @endif
                                            </div>

                                            <div class="p-6 pt-0">
                                                <div class="space-y-1 text-gray-700">
                                                    <p>{{ $morada->morada }}</p>
                                                    <p>{{ $morada->codigo_postal }}, {{ $morada->concelho->nome ?? 'N/A' }}</p>
                                                    <p>{{ $morada->distrito->nome ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach


                                <!-- New Address Option -->
                                <div class="flex items-start space-x-3 p-3 border rounded-lg hover:bg-gray-50 border-dashed">
                                    <label for="address-new" class="flex-1 cursor-pointer">
                                        <div class="flex items-center">
                                            <div>
                                                <a href="{{route('moradas.adicionar.form', ['from' => 'checkout']) }}" class="font-medium">➕ Introduzir Nova Morada</a>
                                                <div class="text-sm text-gray-600">
                                                    Preencher os dados de uma nova morada
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl">💳</span>
                            <h2 class="text-xl font-semibold">Método de Pagamento</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="text-sm text-gray-600 mb-2">Selecione um cartão guardado ou introduza um novo:</div>

                            <!-- Payment Selection -->
                            <div class="space-y-3">
                                <!-- Saved Card 1 -->
                                @foreach ($cartoes as $cartao)
                                    <label class="block bg-white border border-gray-300 rounded-lg p-4 shadow-sm mb-4 cursor-pointer hover:border-blue-500">
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
                                                    <span class="text-xs font-semibold px-2 py-1 bg-blue-500 text-white rounded-full mt-2 inline-block">Principal</span>
                                                @endif
                                            </div>
                                            <input type="radio" name="cartao_id" value="{{ $cartao->id }}" required>
                                        </div>
                                    </label>
                                @endforeach

                                <!-- New Card Option -->
                                <div class="flex items-center space-x-3 p-3 border rounded-lg hover:bg-gray-50 border-dashed">
                                    <label for="card-new" class="flex-1 cursor-pointer">
                                        <div class="flex items-center">
                                            <div>
                                                <a href="{{route('cart.adicionar', ['from' => 'checkout'])}}" class="font-medium">➕ Introduzir Novo Cartão</a>
                                                <div class="text-sm text-gray-600">
                                                    Preencher os dados de um novo cartão
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border p-6 sticky top-4">
                        <h2 class="text-xl font-semibold mb-4">Resumo do Pedido</h2>

                        <div class="space-y-4 mb-6">
                            @forelse ($carrinho as $produto)
                                <div class="flex space-x-3">
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                        <span class="text-2xl">🎮</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-sm">{{ $produto['nome'] }}</h4>
                                        <p class="text-xs text-gray-600">{{ $produto['plataforma'] ?? 'Plataforma não especificada' }}</p>
                                        <p class="font-bold text-sm">€{{ number_format($produto['preco'], 2) }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">Nenhum produto no carrinho.</p>
                            @endforelse
                        </div>

                        <hr class="mb-4">
                        <div class="space-y-2 mb-6">
                            <div class="flex justify-between text-sm">
                                <span>Subtotal</span>
                                <span>€{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Envio</span>
                                <span>€{{ number_format($envio, 2) }}</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span>€{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition-colors font-medium text-lg">
                            Finalizar Compra
                        </button>

                        <div class="text-xs text-gray-600 text-center mt-4">
                            Ao finalizar a compra, aceita os nossos
                            <a href="#" class="text-blue-600 hover:underline">Termos e Condições</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
