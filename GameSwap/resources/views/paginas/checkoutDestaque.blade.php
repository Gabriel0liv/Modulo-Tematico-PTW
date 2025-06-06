<x-layout>
    <form action="{{ route('checkout.finalizarDestaque') }}" method="POST">
        @csrf
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Finalizar Destaque</h1>
                <p class="text-gray-600">Escolha um método de pagamento para destacar seu anúncio</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Payment Method -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl">💳</span>
                            <h2 class="text-xl font-semibold">Método de Pagamento</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="text-sm text-gray-600 mb-2">Selecione um cartão guardado ou introduza um novo:</div>

                            <div class="space-y-3">
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
                                                <a href="{{ route('cart.adicionar', ['from' => 'checkout']) }}" class="font-medium">➕ Introduzir Novo Cartão</a>
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
                            <div class="flex space-x-3">
                                <div class="w-16 h-16 bg-gray-200 rounded overflow-hidden flex items-center justify-center">
                                    <img src="{{ $item['imagem'] }}" alt="{{ $item['nome'] }}" class="object-cover h-full w-full">
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-sm">{{ $item['nome'] }}</h4>
                                    <p class="text-xs text-gray-600">Destaque por 30 dias</p>
                                    <p class="font-bold text-sm">€{{ number_format($item['preco'], 2) }}</p>
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <div class="space-y-2 mb-6">
                            <div class="flex justify-between text-sm">
                                <span>Subtotal</span>
                                <span>€{{ number_format($item['preco'], 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Envio</span>
                                <span>€0.00</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span>€{{ number_format($item['preco'], 2) }}</span>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition-colors font-medium text-lg">
                            Finalizar Pagamento
                        </button>

                        <div class="text-xs text-gray-600 text-center mt-4">
                            Ao finalizar o destaque, aceita os nossos
                            <a href="#" class="text-blue-600 hover:underline">Termos e Condições</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->has('cartao_id'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $errors->first('cartao_id') }}
            </div>
        @endif
    </form>
</x-layout>
