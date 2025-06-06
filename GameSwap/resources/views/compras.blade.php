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
        function initInfiniteCarousel(sliderId, prevButtonId, nextButtonId) {
            const slider = document.getElementById(sliderId);
            const prevButton = document.getElementById(prevButtonId);
            const nextButton = document.getElementById(nextButtonId);

            if (!slider) {
                console.warn(`O slider com ID "${sliderId}" não foi encontrado.`);
                return;
            }

            const items = Array.from(slider.children);
            const itemWidth = items[0]?.offsetWidth + 16 || 0; // Largura do item + gap
            const totalItems = items.length;

            // Verificar se há menos ou igual a 6 itens no slider
            if (totalItems <= 6) {
                console.log(`Slider com ID "${sliderId}" desativado por ter 6 ou menos itens.`);
                prevButton?.classList.add('hidden'); // Ocultar botão "anterior"
                nextButton?.classList.add('hidden'); // Ocultar botão "próximo"
                return;
            }

            let currentIndex = totalItems; // Posição inicial no meio (após clonar)
            let isTransitioning = false;

            // Clonar items nos dois extremos (para suportar looping infinito)
            items.forEach(item => {
                slider.appendChild(item.cloneNode(true));
                slider.insertBefore(item.cloneNode(true), slider.firstChild);
            });

            // Definir a posição inicial para centralizar os itens clonados
            slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;

            /** Atualiza a posição do slider ao clicar nos botões */
            function updateSliderPosition() {
                if (isTransitioning) return; // Evitar múltiplas transições simultâneas
                isTransitioning = true;

                slider.style.transition = 'transform 0.5s ease';
                slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;

                slider.addEventListener('transitionend', () => {
                    isTransitioning = false;

                    // Verificar se estamos no início ou no final para ajustar o looping
                    if (currentIndex <= 0) {
                        slider.style.transition = 'none'; // Remove a transição
                        currentIndex = totalItems; // Reseta para o outro extremo
                        slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
                    }

                    if (currentIndex >= totalItems * 2) {
                        slider.style.transition = 'none';
                        currentIndex = totalItems; // Reseta para o outro extremo
                        slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
                    }
                }, { once: true });
            }

            /** Configura os botões de navegação */
            prevButton?.addEventListener('click', () => {
                if (!isTransitioning) {
                    currentIndex--;
                    updateSliderPosition();
                }
            });

            nextButton?.addEventListener('click', () => {
                if (!isTransitioning) {
                    currentIndex++;
                    updateSliderPosition();
                }
            });

            /** Configura o auto-slide */
            let autoSlide = setInterval(() => {
                if (!isTransitioning) {
                    currentIndex++;
                    updateSliderPosition();
                }
            }, 3000); // Tempo entre slides

            /** Pausar o auto-slide na interação do usuário */
            slider.addEventListener('mouseenter', () => {
                clearInterval(autoSlide);
            });

            slider.addEventListener('mouseleave', () => {
                autoSlide = setInterval(() => {
                    if (!isTransitioning) {
                        currentIndex++;
                        updateSliderPosition();
                    }
                }, 3000);
            });

            // Ajustar o slider de forma responsiva
            window.addEventListener('resize', () => {
                slider.style.transition = 'none'; // Remove transições durante resize
                slider.style.transform = `translateX(${-currentIndex * (items[0].offsetWidth + 16)}px)`;
            });
        }


        document.addEventListener('DOMContentLoaded', () => {
            initInfiniteCarousel('consoles-slider', 'prev-consoles', 'next-consoles');
            initInfiniteCarousel('jogos-slider', 'prev-jogos', 'next-jogos');
            initInfiniteCarousel('consoles-moderados-slider', 'prev-consoles-moderados', 'next-consoles-moderados');
            initInfiniteCarousel('jogos-moderados-slider', 'prev-jogos-moderados', 'next-jogos-moderados');
        });





    </script>
</x-layout>
