<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Profile Header Section -->
        <div class="relative z-10 flex flex-col md:flex-row items-center md:items-start space-y-8 md:space-y-0 md:space-x-10 bg-white/80 border border-blue-100 p-8 rounded-2xl shadow- mb-6">
            <!-- Profile Image Section -->
            <div class="relative group animate-float">
                <div class="w-36 h-36 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 p-1 shadow-2xl">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white">
                        <img
                            src="{{ $user->imagemUser ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($user->imagemUser->imagem_url) : '/placeholder.svg' }}"
                            alt="{{ $user->username }}"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110">
                    </div>
                </div>
            </div>

            <!-- Profile Info Section -->
            <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left space-y-4">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">{{ $user->username }}</h2>
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-2 md:space-y-0 md:space-x-8 text-gray-700">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Membro desde {{ $user->created_at->format('Y') }}</span>
                    </div>
                    @if($user->cidade)
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $user->cidade }}</span>
                        </div>
                    @endif
                </div>
                <p class="text-gray-600 max-w-xl">
                    {{ $user->descricao ?? 'Usuário da plataforma GAMESWAP.' }}
                </p>
            </div>
            <!-- Action Buttons Section -->
            @if(Auth::user()->tipo === 'user')
                <div class="flex flex-col items-center justify-center w-full md:w-auto">
                    <a href="/denunciar/{{ $user->id }}" class="glass-effect bg-red-50 border border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 px-8 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 text-center">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Denunciar
                    </a>
                </div>
            @endif
            <else>
                <p class="hidden"></p>
            </else>
        </div>


        <!-- Listings Section -->
        <div class="animate-slide-up">
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">Anúncios de {{ $user->username }}</h3>
                        <p class="text-gray-600">Descubra os produtos disponíveis deste vendedor</p>
                    </div>
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <div class="relative">
                            <input type="text"
                                   placeholder="Pesquisar vendas..."
                                   class="w-full sm:w-64 pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($anuncios as $anuncio)
                    @if($anuncio->moderado == 1)
                        <a href="/produto/{{$anuncio->tipo_produto}}/{{$anuncio->id}}" class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0 shadow-md hover:shadow-lg transition-shadow group">
                            <div class="relative">
                                <img
                                    src="{{ $anuncio->imagem_capa }}"
                                    alt="{{ $anuncio->nome }}"
                                    class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform"
                                />
                                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">
                                    {{ $anuncio->console ?? '' }}
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-gray-800 truncate">{{ $anuncio->nome }}</h3>
                                <p class="text-blue-600 font-bold">€ {{ $anuncio->preco }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-12 bg-white p-6 rounded-xl shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Comentarios</h2>
                <a href="#"
                   class="border border-[#0a66c2] text-[#0a66c2] hover:bg-[#0a66c2] hover:text-white font-medium rounded-lg px-4 py-2 transition-all">
                    Ver todas
                </a>
            </div>

            <div class="grid gap-6">
                @foreach($comentarios as $comentario)
                    <div class="border-b border-gray-100 pb-6">
                        <div class="flex justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-medium">
                                    JP
                                </div>
                                <div>
                                    <div class="font-medium">{{$comentario->remetente->username}}</div>
                                    <div class="text-sm text-gray-500">{{$comentario->created_at}}</div>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">
                            {{$comentario->conteudo}}
                        </p>
                    </div>
                @endforeach

                <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Deixe um comentario</h2>

                    <form action="{{ route('comentarios.store') }}" method="POST" id="commentForm" class="space-y-4">
                        @csrf
                        <input type="hidden" name="id_destinatario" value="{{ $user->id }}">

                        <!-- Comment Input Area -->
                        <div class="relative">
                            <label for="conteudo" class="block text-sm font-medium text-gray-700 mb-1">Seu comentario</label>
                            <textarea
                                id="conteudo"
                                name="conteudo"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-none"
                                placeholder="Compartilhe sua opinião..."
                                maxlength="500"
                                required
                            >{{ old('conteudo') }}</textarea>
                            @error('conteudo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                id="submitButton"
                                class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 disabled:hover:bg-blue-600"
                            >
                                Enviar Comentario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
