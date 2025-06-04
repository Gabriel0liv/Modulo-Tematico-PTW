<x-layout>
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <x-perfilSideBar></x-perfilSideBar>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <div class="container mx-auto py-8 px-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Meus Anúncios</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($anuncios as $anuncio)
                        <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                            <!-- Imagem do anúncio -->
                            <div class="relative h-48 bg-gray-100">
                                <img src="{{ $anuncio->imagem_capa }}" alt="{{ $anuncio->nome }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Detalhes do produto -->
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">{{ $anuncio->nome }}</h3>
                                <p class="text-sm text-gray-600">{{ ucfirst($anuncio->tipo_produto) }}</p>
                                <p class="text-gray-800 font-semibold mt-2">{{ number_format($anuncio->preco, 2) }}€</p>

                                <!-- Estado do produto como uma tag -->
                                <p class="mt-2">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                        @if($anuncio->status === 'Publicado') bg-orange-500 text-white
                                        @elseif($anuncio->status === 'Anúncio Pendente') bg-gray-500 text-white
                                        @elseif(Str::startsWith($anuncio->status, 'Vendido')) bg-green-500 text-white
                                        @endif">
                                        {{ $anuncio->status }}
                                    </span>
                                </p>
                            </div>

                            <!-- Botões de ação (exibidos somente se o produto não foi vendido) -->
                            @if(is_null($anuncio->comprador))
                                <div class="p-4 bg-gray-50 flex justify-between items-center">
                                    <!-- Botão de destacar -->
                                    <!-- Verificar se o produto já está destacado -->
                                    @if($anuncio->destaque)
                                        <span
                                            class="inline-flex items-center rounded-md text-sm font-medium text-blue-500">
                                                        Destacado
                                                    </span>
                                    @else
                                        <form action="{{ route('destaque.adicionar') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $anuncio->id }}">
                                            <input type="hidden" name="tipo" value="{{ $anuncio instanceof \App\Models\Jogo ? 'jogo' : 'console' }}">
                                            <input type="hidden" name="tipo_produto" value="{{ $anuncio->tipo_produto }}">
                                            <button type="submit"
                                                    class="px-4 py-2 text-sm font-semibold
                                                        border border-blue-500 text-blue-500 rounded-lg
                                                        hover:bg-blue-500 hover:text-white transition duration-200">
                                                Destacar
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Botão de detalhes -->
                                    <a href="{{ route('produto.show', [$anuncio->tipo_produto, $anuncio->id]) }}"
                                       class="px-4 py-2 text-sm font-semibold border rounded-lg
                                            border-gray-500 text-gray-500 bg-transparent hover:text-blue-500 transition duration-200">
                                        Detalhes
                                    </a>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">Você ainda não tem anúncios cadastrados.</p>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</x-layout>
