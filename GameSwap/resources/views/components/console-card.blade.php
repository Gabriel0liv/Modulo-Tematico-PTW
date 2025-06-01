@props(['console'])
<a href="{{ route('produto.show', ['tipo_produto' => 'console', 'id' => $console->id]) }}"
   class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
    <div class="relative">
        <img
                src="{{ $console->imagem_capa }}"
                alt="{{ $console->nome }}"
                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
        />
        <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
            {{ $console->publicador ?? 'Anunciante' }}
        </div>
    </div>
    <div class="p-3">
        <h3 class="font-medium text-gray-800 truncate">{{ $console->nome }}</h3>
        <p class="text-blue-600 font-bold">€ {{ $console->preco }}</p>
    </div>
</a>
