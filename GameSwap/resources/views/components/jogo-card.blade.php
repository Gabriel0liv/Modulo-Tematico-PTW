@props(['jogo'])

<a href="{{ route('produto.show', ['tipo_produto' => 'jogo', 'id' => $jogo->id]) }}" class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
    <div class="relative">
        <img
            src="{{ $jogo->imagem_capa ?? '/placeholder.svg?height=180&width=180' }}"
            alt="{{ $jogo->nome }}"
            class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
        />
        <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
            {{-- Mostra o nome do modelo do console ou um texto padrão caso não esteja disponível --}}
            {{ $jogo->modelo_console->nome ?? 'Console não especificado' }}
        </div>
    </div>
    <div class="p-3">
        <h3 class="font-medium text-gray-800 truncate">{{ $jogo->nome }}</h3>
        <p class="text-blue-600 font-bold">€ {{ $jogo->preco }}</p>
    </div>
</a>
