@foreach($denuncias as $denuncia)
    @if($denuncia->status == 0)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{$denuncia->id}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-gray-300">
                        <img class="h-full w-full object-cover" src="{{ \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($denuncia->denunciado->imagemUser->imagem_url ?? '') }}" alt="Foto do utilizador">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{$denuncia->denunciado->nome}}</div>
                        <div class="text-sm text-gray-500">{{$denuncia->denunciado->username}}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$denuncia->tipo}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$denuncia->created_at}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="/perfilAdmin/denuncias/detalhes/{{$denuncia->id}}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                <a href="#" class="text-red-600 hover:text-red-900">Excluir</a>
            </td>
        </tr>
    @endif
@endforeach
