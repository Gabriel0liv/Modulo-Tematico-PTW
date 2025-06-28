<x-layout>
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-6 pt-6 pb-2">
        <div class="flex items-center text-sm text-gray-500">
            <a href="/" class="hover:text-[#0a66c2] hover:underline">Home</a>
            <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="/pesquisa?tipo={{$produto->tipo_produto}}" class="hover:text-[#0a66c2] hover:underline">{{$produto->tipo_produto}}</a>
            <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="/pesquisa?query=&genero=&modelo={{$produto->modelo_console->id}}" class="hover:text-[#0a66c2] hover:underline">{{$produto->modelo_console->nome}}</a>
            <svg class="h-3 w-3 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-700 font-medium">{{$produto->nome}}</span>
        </div>
    </div>

    <!-- Product Content -->
    <main class="max-w-7xl mx-auto px-6 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">

                <!-- Image Gallery with CSS-only functionality -->

                <div class="relative overflow-hidden">
                    @if (!empty($imagens))
                        <div id="image-slider" class="flex transition-transform duration-500">
                            @foreach ($imagens as $index => $imagem)
                                <img
                                    src="{{ $imagem }}"
                                    alt="{{ $produto->nome }}"
                                    class="w-full h-auto object-contain flex-shrink-0"
                                />
                            @endforeach
                        </div>
                    @else
                        <!-- Placeholder caso nenhuma imagem seja encontrada -->
                        <img
                            src="/placeholder.svg"
                            alt="Imagem indisponível"
                            class="w-full h-auto object-contain"
                        />
                    @endif


                    <!-- Navigation Arrows -->
                    <button id="prev-image"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button id="next-image"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Thumbnails -->
                <div class="flex gap-3 overflow-x-auto pb-2 mt-4">
                    @foreach ($imagens as $index => $imagem)
                        <label for="thumb-{{ $index }}"
                               class="relative min-w-[80px] h-[80px] rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 cursor-pointer">
                            <img
                                src="{{ $imagem }}"
                                alt="Thumbnail {{ $index + 1 }}"
                                class="w-full h-full object-cover thumbnail"
                                data-index="{{ $index }}"
                            />
                        </label>
                    @endforeach
                </div>
            </div> <!-- End of Product Images -->

            <!-- Product Info -->
            <div class="space-y-8">
                <div class="space-y-4">

                    <div>
                        <div class="flex items-center gap-2 mb-1">
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900">{{$produto->nome}}</h1>
                        <p class="text-gray-500 mt-1">{{$produto->modelo_console->nome}}</p>
                    </div>

                    <div class="flex items-end gap-3">
                        <span class="text-3xl font-bold text-gray-900">€{{$produto->preco}}</span>
                    </div>

                    <div class="flex items-center gap-1 text-gray-600">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Vendido por <a href="/perfil/{{$produto->id_anunciante}}" class="font-medium text-[#0a66c2] hover:underline">{{$produto->anunciante->username}}</a></span>
                    </div>
                </div>

                <form action="{{ route('carrinho.adicionar') }}" method="POST" class="flex-1">
                    @csrf
                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                    <input type="hidden" name="quantidade" value="1">
                    <input type="hidden" name="tipo_produto" value="{{ $produto->tipo_produto }}">

                    @if (auth()->check() && auth()->id() === $produto->id_anunciante)

                        <div class="w-full bg-blue-500 text-white font-medium rounded-lg py-6 text-center transition-all">
                            Anuncio do Utilizador
                        </div>
                    @else
                        <!-- Botão adicionar ao carrinho padrão -->
                        <form method="POST" action="{{ route('carrinho.adicionar', $produto->id) }}">
                            @csrf
                            <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-gray-800 font-medium rounded-lg py-6 text-base transition-all">
                                Adicionar ao Carrinho
                            </button>
                        </form>
                    @endif
                </form>

                <!-- CSS-only Tabs -->
                <div class="relative">
                    <label for="description" class="text-1xl font-bold block text-gray-900 mb-1">Descrição:</label>
                    <textarea
                        id="description"
                        class="w-full px-2 py-2 border border-gray-900 rounded-lg focus:ring-2 transition-all resize-none"
                        rows="4"
                        readonly
                    >{{$produto->descricao}}</textarea>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
                            <div class="p-2 rounded-full bg-[#e7f5ff]">
                                <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <span>Garantia de 7 dias</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-white shadow-sm">
                            <div class="p-2 rounded-full bg-[#e7f5ff]">
                                <svg class="h-5 w-5 text-[#0a66c2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <span>Pagamento seguro</span>
                        </div>
                    </div>

                    <div id="details" class="tab-content mt-4">
                        <div class="bg-white rounded-lg p-4 space-y-3">
                            <div class="grid grid-cols-2 gap-x-1 gap-y-2 text-sm">
                                <div class="text-gray-500">Plataforma:</div>
                                <div class="font-medium">{{$produto->modelo_console->nome}}</div>

                                @if($produto->tipo_produto === 'jogo')
                                <div class="text-gray-500">Gênero:</div>
                                <div class="font-medium">{{$produto->categoria->nome}}</div>
                                @endif

                                <!-- Região exibida apenas para JOGOS -->
                                @if($produto->tipo_produto === 'jogo')
                                    <div class="text-gray-500">Região:</div>
                                    <div class="font-medium">{{$produto->regiao}}</div>
                                @endif


                                <div class="text-gray-500">Estado:</div>
                                <div class="font-medium">{{$produto->estado}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outras Publicações do Vendedor -->
        <div class="mt-8 relative">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Outras publicações do vendedor</h2>

            @if(auth()->check() && auth()->id() === $produto->id_anunciante)
                <!-- Mensagem caso NÃO existam outras publicações -->
                <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                    <p class="font-semibold text-lg">Publicação do Utilizador</p>
                    <p class="text-sm">Explore o site e procure produtos incríveis de outros utilizadores.</p>
                </div>
                @elseif ($outrasPublicacoes->isEmpty())

                    <!-- Mensagem caso NÃO existam outras publicações -->
                    <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                        <p class="font-semibold text-lg">Nenhuma outra publicação encontrada</p>
                        <p class="text-sm">Este vendedor ainda não possui outras publicações disponíveis. Volte mais tarde!</p>
                    </div>
                @else
                    <!-- Slider -->
                    <div class="overflow-hidden relative">
                        <div id="vendedor-slider" class="flex gap-4 transition-transform duration-500">
                            @foreach ($outrasPublicacoes as $publicacao)
                                <div class="w-64 flex-shrink-0">
                                    @if ($publicacao instanceof \App\Models\Console)
                                        <x-console-card :console="$publicacao" />
                                    @elseif ($publicacao instanceof \App\Models\Jogo)
                                        <x-jogo-card :jogo="$publicacao" />
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Nav Buttons (apenas se houver mais de um item) -->
                        @if ($outrasPublicacoes->count() > 1)
                            <button id="prev-vendedor" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button id="next-vendedor" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        @endif
                    </div>

            @endif
        </div>

        <!-- Produtos Relacionados -->
        <div class="mt-12 relative">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Produtos Relacionados</h2>

            @if ($produtosRelacionados->isEmpty())
                <!-- Mensagem caso NÃO existam produtos relacionados -->
                <div class="bg-gray-100 p-6 rounded-md text-center text-gray-600">
                    <p class="font-semibold text-lg">Nenhum produto relacionado encontrado</p>
                    <p class="text-sm">Não há produtos relacionados disponíveis no momento. Explore outras categorias!</p>
                </div>
            @else
                <!-- Slider -->
                <div class="overflow-hidden relative">
                    <div id="relacionados-slider" class="flex gap-4 transition-transform duration-500">
                        @foreach ($produtosRelacionados as $relacionado)
                            <div class="w-64 flex-shrink-0">
                                @if ($relacionado instanceof \App\Models\Console)
                                    <x-console-card :console="$relacionado" />
                                @elseif ($relacionado instanceof \App\Models\Jogo)
                                    <x-jogo-card :jogo="$relacionado" />
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Nav Buttons (apenas se houver mais de um item) -->
                    @if ($produtosRelacionados->count() > 1)
                        <button id="prev-relacionados" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button id="next-relacionados" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    @endif
                </div>
            @endif
        </div>

    </main>

    <script>



        function initInfiniteCarousel(sliderId, prevButtonId, nextButtonId) {
            const slider = document.getElementById(sliderId);
            const prevButton = document.getElementById(prevButtonId);
            const nextButton = document.getElementById(nextButtonId);

            const items = Array.from(slider.children);
            const itemWidth = items[0].offsetWidth + 16; // A largura + gap entre itens
            const totalItems = items.length;
            let currentIndex = totalItems;
            let isTransitioning = false; // Evita transições múltiplas
            let lastInteractionTime = 0; // Tempo da última interação do usuário
            let autoSlide = true; // Controle do movimento automático

            // Clonar itens no início e no fim
            items.forEach(item => {
                slider.append(item.cloneNode(true));
                slider.prepend(item.cloneNode(true));
            });

            slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;

            function updatePosition() {
                // Previne múltiplas transições ao mesmo tempo
                if (isTransitioning) return;

                slider.style.transition = 'transform 0.5s ease';
                slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
                isTransitioning = true; // Sinaliza que está fazendo a transição
            }

            function resetPosition() {
                slider.style.transition = 'none';
                if (currentIndex <= 0) {
                    currentIndex = totalItems;
                    slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
                }
                if (currentIndex >= totalItems * 2) {
                    currentIndex = totalItems;
                    slider.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
                }
                isTransitioning = false; // Permite novas transições
            }

            function handleUserInteraction() {
                lastInteractionTime = Date.now(); // Registra o clique do usuário
                autoSlide = false; // Pausa o auto-slide temporariamente

                setTimeout(() => {
                    if (Date.now() - lastInteractionTime >= 5000) {
                        autoSlide = true; // Retoma o auto-slide após 5 segundos
                    }
                }, 5000);
            }

            // Gerencia o movimento automático
            function startAutoSlide() {
                setInterval(() => {
                    if (autoSlide && !isTransitioning && Date.now() - lastInteractionTime > 5000) {
                        currentIndex++;
                        updatePosition();
                    }
                }, 3000); // Move automaticamente a cada 3 segundos
            }

            nextButton.addEventListener('click', () => {
                if (isTransitioning) return; // Ignora se estiver no meio de uma transição
                currentIndex++;
                updatePosition();
                handleUserInteraction();
            });

            prevButton.addEventListener('click', () => {
                if (isTransitioning) return; // Ignora se estiver no meio de uma transição
                currentIndex--;
                updatePosition();
                handleUserInteraction();
            });

            slider.addEventListener('transitionend', resetPosition);

            startAutoSlide();
        }



        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('image-slider');
            const images = slider.children;
            const thumbnails = document.querySelectorAll('.thumbnail');
            const prevButton = document.getElementById('prev-image');
            const nextButton = document.getElementById('next-image');
            let currentIndex = 0;

            const updateSlider = () => {
                const offset = -currentIndex * slider.clientWidth;
                slider.style.transform = `translateX(${offset}px)`;

                // Atualiza a classe `active` nas thumbnails
                thumbnails.forEach((thumbnail, index) => {
                    thumbnail.classList.toggle('active', index === currentIndex);
                });
            };

            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateSlider();
            });

            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateSlider();
            });

            thumbnails.forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', () => {
                    currentIndex = index;
                    updateSlider();
                });
            });

            window.addEventListener('resize', updateSlider);

            // Inicializa o slider na primeira imagem
            updateSlider();

            // Inicializar os sliders
            initInfiniteCarousel('vendedor-slider', 'prev-vendedor', 'next-vendedor');
            initInfiniteCarousel('relacionados-slider', 'prev-relacionados', 'next-relacionados');

        });
    </script>
</x-layout>
