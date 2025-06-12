<x-layout>
    <div class="max-w-6xl mx-auto p-5">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Informações do Utilizador</h2>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- User Details Card -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-6">
                        <div class="h-16 w-16 rounded-full bg-gray-300 flex items-center justify-center mr-4">
                                <img class="h-full w-full object-cover" src="{{ \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($user->imagemUser->imagem_url ?? '') }}" alt="Foto do utilizador">
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900">{{ $user->name ?? '-' }}</h4>
                            <p class="text-gray-500">{{ $user->username ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Nome Completo</label>
                            <p class="text-gray-900">{{ $user->name ?? '-' }}</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Email</label>
                            <p class="text-gray-900">{{ $user->email ?? '-' }}</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Telefone</label>
                            <p class="text-gray-900">{{ $user->contato ?? '-' }}</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Data de Nascimento</label>
                            <p class="text-gray-900">
                                {{ $user->dataNascimento ? \Carbon\Carbon::parse($user->dataNascimento)->format('d/m/Y') : '-' }}
                            </p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Username</label>
                            <p class="text-gray-900">{{ $user->username ?? '-' }}</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            <label class="text-sm font-medium text-gray-500">Data de Criação</label>
                            <p class="text-gray-900">
                                {{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}
                            </p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Status</label>
                            <div class="mt-1">
                                @if(isset($user->estado) && $user->estado === 'ativo')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Ativo</span>
                                @elseif($user->estado === 'banido')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Banido</span>
                                @elseif($user->estado === 'suspenso')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-orange-800">Suspenso</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Desconhecido</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Denuncia, Advertisements and Bans Section -->
            <div class="lg:col-span-2">
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button onclick="showTab('denuncia')" id="denunciaTab"
                                class="tab-button border-b-2 border-blue-500 py-2 px-1 text-sm font-medium text-blue-600 hover:text-gray-700 hover:border-gray-300">
                            Denuncia
                        </button>
                        <button onclick="showTab('advertisements')" id="advertisementsTab"
                                class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Anúncios ({{ $produtos->count() ?? 0 }})
                        </button>
                        <button onclick="showTab('bans')" id="bansTab"
                                class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Banimentos ({{$banimentos->count() ?? 0}})
                        </button>
                        <button onclick="showTab('commentary')" id="commentaryTab"
                                class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Comentários ({{$comentarios->count() ?? 0}})
                        </button>
                    </nav>
                </div>

                <!-- Denuncia Tab -->
                <div id="denunciaContent" class="tab-content">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h5 class="text-lg font-medium text-gray-900">Detalhes da Denuncia</h5>
                        </div>
                        <div class="space-y-4 p-6">
                            <div class="border-b border-gray-200 pb-3">
                                <label class="text-sm font-medium text-gray-500">Id</label>
                                <p class="text-gray-900">#{{ $denuncia->id ?? '-' }}</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3">
                                <label class="text-sm font-medium text-gray-500">Denunciado</label>
                                <p class="text-gray-900">#{{$user->id ?? '-'}} - {{ $user->username ?? '-' }}</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3">
                                <label class="text-sm font-medium text-gray-500">Data de Criação</label>
                                <p class="text-gray-900">
                                    {{ $denuncia->created_at ? $denuncia->created_at->format('d/m/Y H:i') : '-' }}</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3">
                                <label class="text-sm font-medium text-gray-500">Tipo</label>
                                <p class="text-gray-900">{{ $denuncia->tipo ?? '-' }}</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3">
                                <label class="text-sm font-medium text-gray-500">Motivo</label>
                                <p class="text-gray-900">{{ $denuncia->motivo ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advertisements Tab -->
                <div id="advertisementsContent" class="tab-content hidden">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h5 class="text-lg font-medium text-gray-900">Anúncios do Usuário</h5>
                        </div>
                        <div class="divide-y divide-gray-200">
                            @forelse($produtos as $produto)
                                <div class="p-6 hover:bg-gray-50">
                                    <a href="/produto/{{$produto->tipo_produto}}/{{$produto->id}}" class="flex items-start space-x-4">
                                        <div
                                            class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i data-lucide="image" class="w-8 h-8 text-gray-400"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h6 class="text-sm font-medium text-gray-900">{{ $produto->nome }}</h6>
                                            <p class="text-sm text-gray-500 mt-1">{{ $produto->descricao }}</p>
                                            <div class="flex items-center mt-2 space-x-4">
                                                <span
                                                    class="text-lg font-bold text-green-600">€ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                                <span
                                                    class="text-xs text-gray-500">Publicado em {{ $produto->created_at->format('d/m/Y') }}</span>
                                                @if($produto->id_comprador != 0)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Vendido</span>
                                                @else
                                                    @if($produto->ativo === 1)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Ativo</span>
                                                    @else
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Inativo</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="p-6 text-center text-gray-500">
                                    <i data-lucide="info" class="w-8 h-8 mx-auto mb-2 text-gray-400"></i>
                                    <p class="text-sm">Nenhum anúncio encontrado.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Bans Tab -->
                <div id="bansContent" class="tab-content hidden">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h5 class="text-lg font-medium text-gray-900">Histórico de Banimentos</h5>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    @foreach($banimentos as $banimento)
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2">
                                            @if($banimento->data_reativacao != '9999-12-31 23:59:59')
                                            <h6 class="text-sm font-medium text-yellow-900">Banimento Temporário</h6>
                                            @else
                                            <h6 class="text-sm font-medium text-red-900">Banimento Permanente</h6>
                                            @endif
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expirado</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Motivo: {{$banimento->motivo}}</p>
                                        <div class="flex items-center mt-2 space-x-4 text-xs text-gray-500">
                                            <span>Início: {{$banimento->resolvido_em}}</span>
                                            @if($banimento->data_reativacao != '9999-12-31 23:59:59')
                                                <span>Fim: {{$banimento->data_reativacao}}</span>@else
                                                <span>Fim: Permanente</span>
                                            @endif

                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="ml-4">
                                        <i data-lucide="alert-triangle" class="w-5 h-5 text-red-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Commentary Tab -->
                <div id="commentaryContent" class="tab-content hidden">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h5 class="text-lg font-medium text-gray-900">Histórico de Comentarios</h5>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-6 text-center text-gray-500">
                                @foreach($comentarios as $comentario)
                                    <div class="border-b border-gray-100 pb-6">
                                        <div class="flex justify-between mb-2">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-medium">
                                                    JP
                                                </div>
                                                <div>
                                                    <p class="font-medium">{{$comentario->remetente->username}}</p>                                    <div class="text-sm text-gray-500">{{$comentario->created_at}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-gray-700">
                                            {{$comentario->conteudo}}
                                        </p>
                                    </div>
                                @endforeach
                                {{$comentarios->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resolver Menu Template (positioned absolutely to extend beyond boundaries) -->
            <div id="resolverMenuTemplate" class="lg:col-span-1 resolver-menu bg-white rounded-lg border border-gray-200"
                 style="width: 380px; z-index: 9999;">
                <div class="menu-content">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h4 id="menuTitle" class="text-lg font-semibold text-gray-900">Resolver Denúncia</h4>
                            <button onclick="closeResolverMenu()" class="text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100">
                                <i data-lucide="x" class="w-5 h-5"></i>
                            </button>
                        </div>

                        <!-- Menu Options -->
                        <div class="space-y-3">
                            <!-- Marcar como falso -->
                            <form action="{{route('utilizador.resolver', $denuncia->id)}}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="w-full flex items-center p-3 rounded-lg border-2 border-green-200 bg-green-50 hover:bg-green-100 transition-all duration-200 group hover:shadow-md">
                                    <div class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full mr-3 group-hover:bg-green-600 transition-colors">
                                        <i data-lucide="check" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <div class="text-left">

                                        <div class="font-medium text-green-800">Marcar como falso</div>
                                        <div class="text-sm text-green-600">A denúncia é infundada</div>
                                    </div>
                                </button>
                            </form>

                            <!-- Avisar usuário -->
                            <div class="border-2 border-yellow-200 bg-yellow-50 rounded-lg p-3 hover:shadow-md transition-shadow duration-200">
                                <button onclick="resolveReport('warn')" class="w-full flex items-center p-3 rounded-lg bg-yellow-50 hover:bg-yellow-100 transition-all duration-200 group hover:shadow-md">
                                    <div class="flex items-center justify-center w-8 h-8 bg-yellow-500 rounded-full mr-3 group-hover:bg-yellow-600 transition-colors">
                                        <i data-lucide="alert-triangle" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="font-medium text-yellow-800">Avisar usuário</div>
                                        <div class="text-sm text-yellow-600">Enviar aviso sobre comportamento</div>
                                    </div>

                                </button>

                                <div id="message" class="message mt-3 p-3 bg-white rounded-md border border-yellow-300">
                                    <label class="block text-sm font-medium text-yellow-800 mb-2">Mensagem</label>
                                    <div class="flex space-x-2">
                                        <input type="string" name="aviso" min="1" max="555" placeholder="Escreva aqui a mensagem" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"></div>
                                </div>
                            </div>

                            <!-- Suspender -->
                            <div class="border-2 border-yellow-200 bg-yellow-50 rounded-lg p-3 hover:shadow-md transition-shadow duration-200">
                                <form action="{{route('utilizador.suspender', $denuncia->id)}}" method="POST" class="mt-3">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-between mb-3 hover:bg-yellow-100 rounded-lg p-2 transition-colors">
                                        <div class="flex items-center">
                                            <div class="flex items-center justify-center w-8 h-8 bg-yellow-500 rounded-full mr-3">
                                                <i data-lucide="clock" class="w-4 h-4 text-white"></i>
                                            </div>
                                            <div class="text-left">
                                                <div class="font-medium text-yellow-800">Suspender</div>
                                                <div class="text-sm text-yellow-600">Suspender temporariamente</div>
                                            </div>
                                        </div>
                                        <i data-lucide="chevron-down" class="w-4 h-4 text-yellow-600 suspend-chevron transition-transform duration-200"></i>
                                    </button>

                                    <!-- Suspension Duration Options -->
                                    <!-- Custom Duration Input -->
                                    <div id="customDuration" class="custom-duration mt-3 p-3 bg-white rounded-md border border-yellow-300">
                                        <label class="block text-sm font-medium text-yellow-800 mb-2">Duração</label>
                                        <div class="flex space-x-2">
                                            <input type="number" id="customDays" name="duracao" min="1" max="365" placeholder="Dias" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"></div>
                                    </div>
                                </form>
                            </div>

                            <!-- Banir -->
                            <form action="{{route('utilizador.banir', $denuncia->id)}}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="w-full flex items-center p-3 rounded-lg border-2 border-red-200 bg-red-50 hover:bg-red-100 transition-all duration-200 group hover:shadow-md">
                                    <div class="flex items-center justify-center w-8 h-8 bg-red-500 rounded-full mr-3 group-hover:bg-red-600 transition-colors">
                                        <i data-lucide="user-x" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="font-medium text-red-800">Banir</div>
                                        <div class="text-sm text-red-600">Banimento permanente</div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backdrop for menu -->
            <div id="menuBackdrop" class="fixed inset-0 bg-black bg-opacity-25 hidden" style="z-index: 9998;" onclick="closeResolverMenu()"></div>

            <!-- Confirmation Modal -->
            <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" style="z-index: 10000;">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div id="confirmIcon" class="mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-4">
                            <i id="confirmIconLucide" class="w-6 h-6"></i>
                        </div>
                        <h3 id="confirmTitle" class="text-lg font-medium text-gray-900 mb-2"></h3>
                        <p id="confirmMessage" class="text-sm text-gray-500 mb-4"></p>
                        <div class="flex justify-center space-x-3">
                            <button onclick="closeConfirmation()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                                Cancelar
                            </button>
                            <button id="confirmButton" onclick="executeAction()" class="px-4 py-2 rounded-md text-white transition-colors">
                                Confirmar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Toast -->
            <div id="successToast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hidden transform transition-all duration-300" style="z-index: 10001;">
                <div class="flex items-center">
                    <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                    <span id="successMessage">Ação executada com sucesso!</span>
                </div>
            </div>

        </div>
    </div>

    <script>
        lucide.createIcons();

        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            document.getElementById(tabName + 'Content').classList.remove('hidden');
            const activeTab = document.getElementById(tabName + 'Tab');
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-blue-500', 'text-blue-600');
        }

        document.addEventListener('DOMContentLoaded', function () {
            showTab('advertisements');
        });
    </script>
</x-layout>
