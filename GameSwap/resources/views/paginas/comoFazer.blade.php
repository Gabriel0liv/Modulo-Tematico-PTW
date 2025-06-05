<x-layout>
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagem ilustrativa -->
            <div class="flex items-center justify-center">
                <img src="{{ asset('Images/comoAnunciar1.png') }}" alt="Tutorial Anunciar Produto"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Texto explicativo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Como Anunciar um Produto</h1>
                <div class="space-y-6">
                    <!-- Passo a passo para anunciar -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Passo a Passo para Anunciar</h2>
                        <ol class="list-decimal list-inside text-gray-600 space-y-2">
                            <li>Acesse a página de <a href="{{ route('anunciarPage') }}"
                                                      class="text-blue-500 hover:underline">Anunciar Produto</a>.
                            </li>
                            <li>
                                No <span class="text-blue-600 font-bold">1.1</span> escolha o tipo de produto (Jogo ou
                                Console).
                                <p class="text-sm">O formulário de anúncio será adaptado automaticamente ao tipo de
                                    produto escolhido.</p>
                            </li>
                            <li> No <span class="text-blue-600 font-bold">1.2</span> ao carregar no <span
                                    class="text-lg font-bold">+</span> para adicionar imagens
                                <p class="text-sm"> Selecione até 6 imagens de uma vez e elas aparecerão em ordem <br>
                                    como as representações das <span class="text-amber-600 font-semibold">caixas laranjas</span>.
                                </p>
                            </li>
                            <li>
                                No <span class="text-blue-600 font-bold">1.3</span> preencha os detalhes do produto
                                <p class="text-sm">Inclua nome e preço obrigatóriamente</p>
                            </li>
                            <li>
                                No <span class="text-blue-600 font-bold">1.4</span> Selecione o estado do produto
                                <p class="text-sm">
                                    Escolha entre Novo, Usado ou Eecondicionado. <br>
                                    Sempre adicione uma descrição detalhada do estado do produto abaixo.
                                </p>
                            </li>
                            <li>
                                No <span class="text-blue-600 font-bold">1.5</span> preencha mais detalhes sobre o produto
                                <p class="text-sm">Se for um jogo selecione a categoria do mesmo e a região</p>
                                <p class="text-sm">Descreva o estado, características e qualquer informação relevante.</p>
                                <p class="text-sm">Selecione o tipo de console</p>
                            </li>
                            <li>
                                No <span class="text-blue-600 font-bold">1.6</span> clique para anunciar seu produto
                                <p class="text-sm">Se todos os campos estiverem preenchidos perfeitamente seu anuncio será enviado para um administrador aprová-lo </p>
                        </ol>
                    </div>


                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagem ilustrativa -->
            <div class="flex items-center justify-center">
                <img src="{{ asset('Images/comoAnunciar2.png') }}" alt="Tutorial Anunciar Produto"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Texto explicativo -->
            <div>
                <div class="space-y-6">



                </div>
            </div>
        </div>


    </div>
</x-layout>
