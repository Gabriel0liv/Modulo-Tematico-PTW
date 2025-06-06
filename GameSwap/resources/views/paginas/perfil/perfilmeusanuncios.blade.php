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
                        <div class="bg-white border rounded-lg shadow-sm overflow-hidden relative">
                            <a href="perfil/meus_anuncios/desativar/{{$anuncio->tipo_produto}}/{{$anuncio->id}}"
                               class="absolute top-2 right-2 z-10 p-2 bg-red-500 hover:bg-red-600 text-white rounded-full shadow-lg transition duration-200 opacity-90 hover:opacity-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>

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
                                            @if($anuncio->status === "Publicado")
                                                <button type="submit"
                                                        class="px-4 py-2 text-sm font-semibold
                                                        border border-blue-500 text-blue-500 rounded-lg
                                                        hover:bg-blue-500 hover:text-white transition duration-200">
                                                    Destacar
                                                </button>
                                            @endif
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
                        <!-- Mensagem caso NÃO existam produtos relacionados -->
                        <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                            <p class="font-semibold text-lg">Nenhum anúncio feito</p>
                            <p class="text-sm">Anuncie seus jogos e consoles, para gerar aquela renda extra no fim do mês!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</x-layout>
