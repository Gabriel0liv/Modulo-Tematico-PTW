@foreach($produtos as $produto)
    @if($produto->moderado == 0)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{$produto->id}}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="h-10 w-10 bg-gray-300 rounded"></div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{$produto->nome}}</div>
                    <div class="text-sm text-gray-500">{{$produto->tipo_produto}}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produto->id_anunciante}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produto->preco}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produto->created_at}}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <a href="/produto/{{$produto->id}}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
            <form action="{{ route('jogo.aprovar', $produto->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-green-600 hover:text-green-900 mr-3">Aprovar</button>
            </form>
            <form action="{{ route('jogo.reprovar', $produto->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-900">Rejeitar</button>
            </form>
        </td>
    </tr>
    @endif
@endforeach
