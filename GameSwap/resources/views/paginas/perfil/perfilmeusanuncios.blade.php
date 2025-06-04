<x-layout>
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <x-perfilSideBar>
        </x-perfilSideBar>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <div class="container mx-auto py-8 px-6">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Meus Anúncios</h1>
                    <div class="flex items-center gap-4">
                        <div class="relative w-64">
                            <input
                                type="text"
                                class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="Pesquisar vendas..."
                            />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    @foreach($anuncios as $anuncio)
                        @if($anuncio->moderado == 1)
                            <!-- Sale Item -->
                            <div class="rounded-lg border bg-card text-card-foreground shadow-card overflow-hidden">
                                <div class="flex items-center p-4 md:p-6">
                                    <div
                                        class="relative h-20 w-20 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
                                        <img
                                            src="{{ $anuncio->imagens->isNotEmpty()
                                                ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($anuncio->imagens->first()->path ?? $anuncio->imagens->first()->caminho)
                                                : '/images/placeholder.jpg' }}"
                                            alt="{{ $anuncio->nome }}"
                                            class="w-full h-full object-cover"
                                        >
                                    </div>

                                    <div class="ml-6 flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h3 class="font-medium text-gray-900">{{ $anuncio->nome }}</h3>
                                                @if($anuncio->tipo_produto == 'Jogo')
                                                    <p class="mt-1 text-sm text-gray-500">{{ $anuncio->console }}</p>
                                                @else
                                                    <p class="mt-1 text-sm text-gray-500">{{ $anuncio->tipo_console }}</p>
                                                @endif
                                            </div>
                                            <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end">
                                                <p class="text-lg font-medium text-gray-900">
                                                    R$ {{ number_format($anuncio->preco, 2, ',', '.') }}</p>
                                                <p class="text-sm text-gray-500">Venda: VND-2023-5678</p>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex flex-wrap items-center justify-between gap-2">
                                            <div class="flex flex-col">
                                                <p class="text-sm text-gray-500">
                                                    Data: {{ $anuncio->created_at->format('d/m/Y') }}</p>

                                                @if($anuncio->comprador)
                                                    <p class="text-sm text-gray-500 text-green-500 font-medium">
                                                        Vendido
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        Comprador: {{ $anuncio->comprador->name }}
                                                    </p>
                                                @else
                                                    <p class="text-sm text-gray-500 text-blue-500 font-medium">
                                                        Publicado
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="flex items-center gap-2">
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
                                                        <button type="submit" class="btn btn-warning">Destacar Anúncio</button>
                                                    </form>
                                                @endif

                                                <a href="/produto/{{ $anuncio->tipo_produto }}/{{ $anuncio->id }}"
                                                   class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-md px-3">
                                                    Detalhes
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</x-layout>
