@foreach($users as $user)
    @if($user->estado == "ativo")
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{$user->id}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="h-10 w-10 rounded-full bg-gray-300 overflow-hidden">
                    <img class="h-full w-full object-cover" src="{{ \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($user->imagemUser->imagem_url ?? '') }}" alt="Foto do utilizador">
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left">{{$user->name}}</td>            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user->username}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user->email}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Ativo</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="/perfilAdmin/utilizadores/{{$user->id}}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
            </td>
        </tr>
    @endif
@endforeach
