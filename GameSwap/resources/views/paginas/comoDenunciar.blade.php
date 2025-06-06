<x-layout>
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagem ilustrativa -->
            <div class="flex items-center justify-center">
                <img src="{{ asset('Images/comoDenunciar.png') }}" alt="Tutorial Denunciar Conteúdo"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Texto explicativo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Como Denunciar um Utilizador</h1>
                <div class="space-y-6">
                    <!-- Passo a passo para denunciar -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Passo a Passo para Denunciar</h2>
                        <ol class="list-decimal list-inside text-gray-600 space-y-2">
                            <li>
                                Navegue até o perfil do utilizador que deseja denunciar.
                                <p class="text-sm">Certifique-se de que o conteúdo publicado ou comentado pelo mesmo
                                    viola os nossos
                                    <a href="{{ route('termos') }}"
                                       class="text-blue-600 hover:text-blue-800 underline">Termos de
                                        Uso</a>
                                    .
                                </p>
                            </li>
                            <li>
                                Clique no botão <span class="text-blue-600 font-bold">Denunciar</span> disponível no seu
                                perfil.
                                <p class="text-sm">Um formulário será exibido para que você descreva o motivo da
                                    denúncia.</p>
                            </li>
                            <li>
                                Preencha os campos obrigatórios do formulário.
                                <p class="text-sm">Inclua detalhes relevantes para ajudar na análise.</p>
                            </li>
                            <li>
                                Clique em <span class="text-blue-600 font-bold">Enviar</span>.
                                <p class="text-sm">Nossa equipa administrativa irá analisar a denúncia e tomar as
                                    medidas necessárias.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
