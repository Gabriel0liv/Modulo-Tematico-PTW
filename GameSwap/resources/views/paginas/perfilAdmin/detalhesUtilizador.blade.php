<x-layout>
    <div class="max-w-6xl mx-auto p-5">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Informações do Utilizador</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
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
            <div class="lg:col-span-2">
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
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
                        <button onclick="showTab('purchases')" id="purchasesTab"
                                class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Compras ({{$compras->count() ?? 0}})
                        </button>
                    </nav>
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
                                                    <span>Fim: {{$banimento->data_reativacao}}</span>
                                                    <span>Duração: {{ \Carbon\Carbon::parse($banimento->resolvido_em)->diffInDays(\Carbon\Carbon::parse($banimento->data_reativacao)) }}</span>
                                                @else
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

                <!-- Purchases Tab -->
                <div id="purchasesContent" class="tab-content hidden">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h5 class="text-lg font-medium text-gray-900">Histórico de Compras</h5>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 gap-4">
                                @foreach($compras as $compra)
                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center space-x-3">
                                                <div>
                                                    <h6 class="text-sm font-semibold text-gray-900">Compra #{{$compra->id}}</h6>
                                                    <p class="text-xs text-gray-500">{{$compra->created_at}}</p>
                                                </div>
                                            </div>
                                            @if($compra->status == "pago")
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Pago</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                                            @endif
                                        </div>
                                        <div class="space-y-2 mb-4">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-500">Comprador:</span>
                                                <span class="text-gray-900 font-medium">{{$user->nome}}</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-500">Total:</span>
                                                <span class="text-lg font-bold text-green-600">€ {{$compra->total}}</span>
                                            </div>
                                        </div>
                                        <a href="/detalhesDaCompra/{{$compra->id}}" class="w-full bg-blue-600 text-white text-sm py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                            Detalhes da Compra
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
