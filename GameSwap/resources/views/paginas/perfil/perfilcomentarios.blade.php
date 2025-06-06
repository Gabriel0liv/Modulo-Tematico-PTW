<x-layout>
    <div class="flex flex-1 overflow-hidden">

        <!-- Sidebar -->
        <x-perfilSideBar>
        </x-perfilSideBar>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto mx-auto py-8 px-6 ">
            <h1 class="text-2xl font-bold mb-6">Comentários No Meu Perfil</h1>
            @if ($comentarios->isEmpty())
                <!-- Mensagem caso NÃO existam produtos relacionados -->
                <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                    <p class="font-semibold text-lg">Nenhum comentário feito</p>
                    <p class="text-sm">Ajude seu utilizador favorito e comente seu perfil!</p>
                </div>
            @else
                @foreach($comentarios as $comentario)
                    <div class="mb-4 p-4 bg-white rounded shadow">
                        <a href="/perfil/{{$comentario->remetente->id}}" class="text-gray-700 mb-2">
                            <strong>De:</strong> {{ $comentario->remetente->username ?? 'Desconhecido' }}
                            <span class="text-sm text-gray-400 ml-2">{{ $comentario->created_at }}</span>
                        </a>
                        <div>{{ $comentario->conteudo }}</div>
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $comentarios->links() }}
                </div>
            @endif

        </div>
    </div>
</x-layout>
