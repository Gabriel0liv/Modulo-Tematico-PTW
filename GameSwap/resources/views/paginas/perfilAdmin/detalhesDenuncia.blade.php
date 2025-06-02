<x-layout>
    <div class="max-w-6xl mx-auto p-5">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Informações do Utilizador</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- User Details Card -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-6">
                        <div class="h-16 w-16 rounded-full bg-gray-300 flex items-center justify-center mr-4">
                            <i data-lucide="user" class="w-8 h-8 text-gray-600"></i>
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
                            Banimentos (0)
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
                            <div class="p-6 text-center text-gray-500">
                                <i data-lucide="check-circle" class="w-8 h-8 mx-auto mb-2 text-green-500"></i>
                                <p class="text-sm">Nenhum banimento ativo no momento</p>
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
