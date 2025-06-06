<x-layout>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Featured Section -->
        <div class="lg:col-span-3 bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl p-8 shadow-md">
            <div class="flex flex-col h-full justify-center items-center text-center">
                <h2 class="text-white text-3xl md:text-4xl font-bold mb-6">Destaque de Consoles e Jogos</h2>
                <p class="text-blue-100 max-w-2xl mb-8">
                    Encontre os melhores jogos e consoles com os melhores preços. Compre, venda ou troque com outros
                    gamers.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-white text-blue-800 hover:bg-blue-50 px-4 py-2"
                       href="/pesquisa?tipo=console"><p class="font-bold">Explorar Consoles</p></a>
                    <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-transparent border border-white text-white hover:bg-blue-800 px-4 py-2"
                       href="/pesquisa?tipo=jogo"><p class="font-bold">Ver Jogos</p></a>
                </div>
            </div>
        </div>

        <!-- Info Boxes -->
        <div class="lg:col-span-1 space-y-6">
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0">
                <div class="bg-gradient-to-r from-amber-400 to-amber-300 p-4">
                    <h3 class="text-xl font-bold text-gray-800">Destaque de Anúncios</h3>
                </div>
                <div class="p-6 pt-0 p-4">
                    <div class="mb-3">
                        <span class="text-blue-600 font-bold text-lg">€ 4,90</span>
                        <span class="text-gray-500 text-sm"> / mês</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">
                        Aumente as chances de venda do seu produto, por apenas €4,90.
                    </p>
                    <ul class="space-y-2 text-sm mb-4">
                        <li class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                            <span>Maior exposição na página inicial</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                            <span>Prioridade na área de pesquisa</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                            <span>Suporte prioritário</span>
                        </li>
                    </ul>
                    <a href="{{route('perfil-Anuncios')}}"
                       class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white w-full px-4 py-2">
                        <p class="font-bold">Destaque Agora</p>
                    </a>
                </div>
            </div>

            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden border-0">
                <div class="bg-gradient-to-r from-amber-400 to-amber-300 p-4">
                    <h3 class="text-xl font-bold text-gray-800">Como anunciar?</h3>
                </div>
                <div class="p-6 pt-0 p-4">
                    <ul class="space-y-2 text-sm mb-4">
                        <li class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-blue-600"></div>
                            <span>Crie um anúncio preenchendo os detalhes do produto e publique em poucos cliques.</span>
                        </li>
                    </ul>
                    <div class="flex gap-2">
                        <a href="{{ route('comoFazer') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition">
                            <p class="font-bold">Aprender como anunciar</p>
                        </a>
                    </div> <!-- Fechando o formulário de inscrição -->
                </div> <!-- Fechando a caixa de informação -->
            </div> <!-- Fechando a caixa de informação -->
        </div> <!-- Fechando a seção de informações -->
    </div> <!-- Fechando a seção de destaque -->

    <!-- Consoles em Destaque -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Consoles em Destaque</h2>

        @if ($consolesDestaque->isEmpty())
            <!-- Mensagem estilizada caso não haja consoles -->
            <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                <p class="font-semibold text-lg">Nenhum console em destaque encontrado</p>
                <p class="text-sm">Atualmente não temos consoles em destaque. Volte mais tarde!</p>
            </div>
        @else
            <!-- Slider -->
            <div class="relative overflow-hidden">
                <div id="consoles-slider" class="flex transition-transform duration-500 gap-4">
                    @foreach ($consolesDestaque as $console)
                        <div class="w-64 flex-shrink-0">
                            <x-console-card :console="$console" />
                        </div>
                    @endforeach
                </div>

                <!-- Botões de navegação (mostrar apenas se houver mais de 6 consoles) -->
                @if ($consolesDestaque->count() > 6)
                    <button id="prev-consoles" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="next-consoles" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endif
            </div>
        @endif
    </div>

    <!-- Jogos em Destaque -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Jogos em Destaque</h2>

        @if ($jogos->isEmpty())
            <!-- Mensagem estilizada caso não haja jogos -->
            <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                <p class="font-semibold text-lg">Nenhum jogo em destaque encontrado</p>
                <p class="text-sm">Atualmente não temos jogos em destaque. Volte mais tarde!</p>
            </div>
        @else
            <!-- Slider -->
            <div class="relative overflow-hidden">
                <div id="jogos-slider" class="flex transition-transform duration-500 gap-4">
                    @foreach ($jogos as $jogo)
                        <div class="w-64 flex-shrink-0">
                            <x-jogo-card :jogo="$jogo" />
                        </div>
                    @endforeach
                </div>

                <!-- Botões de navegação (mostrar apenas se houver mais de 6 jogos) -->
                @if ($jogos->count() > 6)
                    <button id="prev-jogos" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="next-jogos" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endif
            </div>
        @endif
    </div>


    <!-- Consoles Moderados Não Destacados -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Consoles Mais Recentes</h2>

        @if ($consolesModerados->isEmpty())
            <!-- Mensagem estilizada caso não haja consoles -->
            <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                <p class="font-semibold text-lg">Nenhum console disponível atualmente</p>
                <p class="text-sm">Verifique novamente em breve!</p>
            </div>
        @else
            <!-- Slider para Consoles Moderados -->
            <div class="relative overflow-hidden">
                <div id="consoles-moderados-slider" class="flex transition-transform duration-500 gap-4">
                    @foreach ($consolesModerados as $console)
                        <div class="w-64 flex-shrink-0">
                            <x-console-card :console="$console" />
                        </div>
                    @endforeach
                </div>

                <!-- Botões de navegação (somente se houver mais de 6 consoles) -->
                @if ($consolesModerados->count() > 6)
                    <button id="prev-consoles-moderados" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="next-consoles-moderados" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endif
            </div>
        @endif
    </div>

    <!-- Jogos Moderados Não Destacados -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Jogos Mais Recentes</h2>

        @if ($jogosModerados->isEmpty())
            <!-- Mensagem estilizada caso não haja jogos -->
            <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                <p class="font-semibold text-lg">Nenhum jogo disponível atualmente</p>
                <p class="text-sm">Verifique novamente em breve!</p>
            </div>
        @else
            <!-- Slider para Jogos Moderados -->
            <div class="relative overflow-hidden">
                <div id="jogos-moderados-slider" class="flex transition-transform duration-500 gap-4">
                    @foreach ($jogosModerados as $jogo)
                        <div class="w-64 flex-shrink-0">
                            <x-jogo-card :jogo="$jogo" />
                        </div>
                    @endforeach
                </div>

                <!-- Botões de navegação (somente se houver mais de 6 jogos) -->
                @if ($jogosModerados->count() > 6)
                    <button id="prev-jogos-moderados" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="next-jogos-moderados" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endif
            </div>
        @endif
    </div>


    <script>
        // Função genérica para configurar sliders
        function configurarSlider(sliderId, prevBtnId, nextBtnId) {
            const slider = document.getElementById(sliderId);
            const prevButton = document.getElementById(prevBtnId);
            const nextButton = document.getElementById(nextBtnId);
            const items = slider ? slider.children : [];
            const itemCount = items.length;

            // Verificar se existem itens no slider
            if (itemCount === 0) {
                slider.parentElement.innerHTML = `
            <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                <p class="font-semibold text-lg">Nenhum produto disponível</p>
                <p class="text-sm">Atualmente não temos produtos nesta categoria. Verifique novamente em breve!</p>
            </div>
        `;
                return;
            }

            // Esconder botões de navegação se houver 6 ou menos itens
            if (itemCount <= 6) {
                prevButton?.classList.add('hidden');
                nextButton?.classList.add('hidden');
                slider.classList.remove('transition-transform'); // Remove animações desnecessárias
                return;
            }

            // Variáveis para navegação
            let currentIndex = 0;
            const itemWidth = items[0].offsetWidth + 16; // Largura do item + espaçamento (gap)

            // Função para atualizar a posição do slider
            function atualizarPosicaoSlider() {
                slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
            }

            // Eventos de clique nos botões
            if (prevButton) {
                prevButton.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        atualizarPosicaoSlider();
                    }
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', () => {
                    if (currentIndex < itemCount - 6) {
                        currentIndex++;
                        atualizarPosicaoSlider();
                    }
                });
            }

            // Atualização automática apenas para sliders com mais de 6 itens
            if (itemCount > 6) {
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % itemCount; // Loop infinito
                    atualizarPosicaoSlider();
                }, 5000); // Atualiza a cada 5 segundos
            }
        }

        // Inicializar sliders na página
        document.addEventListener('DOMContentLoaded', () => {
            configurarSlider('consoles-slider', 'prev-consoles', 'next-consoles'); // Slider de consoles em destaque
            configurarSlider('jogos-slider', 'prev-jogos', 'next-jogos'); // Slider de jogos em destaque
            configurarSlider('consoles-moderados-slider', 'prev-consoles-moderados', 'next-consoles-moderados'); // Consoles moderados
        });


    </script>
</x-layout>
