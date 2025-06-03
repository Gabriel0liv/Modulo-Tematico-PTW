<x-layout>
    <main class="max-w-6xl mx-auto p-6">
        <div class="flex items-start justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Seu Carrinho
                @if(!empty($itens))
                    <span class="text-primary-light">({{ count($itens) }} itens)</span>
                @else
                    <span class="text-primary-light">(0 itens)</span>
                @endif</h1>
            <a href="{{ route('pagina_inicial') }}" class="text-primary hover:text-primary-dark text-sm font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Continuar Comprando
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-5">
                @forelse($itens as $item)
                    <div class="bg-white rounded-xl shadow-soft p-5 hover:shadow-medium transition-all duration-300">
                        <div class="flex flex-col sm:flex-row">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mb-4 sm:mb-0 sm:mr-5">
                                <img src="{{ $item['imagem'] }}" alt="{{ $item['nome'] }}" class="h-full w-full object-contain">
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row justify-between">
                                    <div>
                                        <h3 class="font-semibold text-gray-800 text-lg">{{ $item['nome'] }}</h3>
                                        <p class="text-sm text-gray-500 mb-1">{{ ucfirst($item['tipo_produto']) }}</p>
                                    </div>
                                    <div class="text-right mt-2 sm:mt-0">
                                        <div class="font-bold text-lg text-gray-800">€{{ number_format($item['preco'], 2, ',', '.') }}</div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-2 pt-3 border-t border-gray-100">
                                    <div class="text-sm text-gray-500">Quantidade: {{ $item['quantidade'] }}</div>
                                    <form method="POST" action="{{ route('carrinho.remover', $item['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-gray-400 hover:text-red-500 transition-all" title="Remover">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Seu carrinho está vazio.</p>
                @endforelse
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-soft p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Resumo do Pedido</h2>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">€{{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Frete</span>
                            <span class="font-medium">€0,00</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 my-4"></div>
                    <div class="flex justify-between mb-6">
                        <span class="font-bold text-lg text-gray-800">Total</span>
                        <span class="font-bold text-lg text-gray-800">€{{ number_format($subtotal, 2, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 text-center rounded-lg shadow-soft transition-all">
                        Finalizar Compra
                    </a>
                </div>
            </div>
        </div>
    </main>
</x-layout>
