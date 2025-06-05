@foreach($users as $user)
    @if($user->estado == "ativo")
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{$user->id}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-gray-300"></div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{$user->nome}}</div>
                        <div class="text-sm text-gray-500">{{$user->username}}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user->username}}</td>
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
