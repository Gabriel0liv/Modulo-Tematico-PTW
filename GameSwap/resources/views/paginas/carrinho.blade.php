<x-layout>
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2 md:mb-0">Seu Carrinho <span class="text-primary-light">(3 itens)</span></h1>
            <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Continuar Comprando
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items - 2/3 width on desktop -->
            <div class="lg:col-span-2 space-y-5">
                <!-- Cart Item 1 -->
                <div class="bg-white rounded-xl shadow-soft p-5 hover:shadow-medium transition-all duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mb-4 sm:mb-0 sm:mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-lg">Jogo 1</h3>
                                    <p class="text-sm text-gray-500 mb-1">Plataforma 1</p>
                                    <div class="flex items-center mb-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-50 text-primary-dark">
                                            Digital
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 ml-2">
                                            Em estoque
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right mt-2 sm:mt-0">
                                    <div class="font-bold text-lg text-gray-800">€29,99</div>
                                    <div class="text-xs text-gray-500 line-through">€39,99</div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-2 pt-3 border-t border-gray-100">
                                <div class="flex items-center mb-3 sm:mb-0">
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-l-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <span class="w-10 h-8 flex items-center justify-center border-t border-b border-gray-200 text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-r-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex space-x-3">
                                    <button class="text-primary hover:text-primary-dark transition-all text-sm font-medium">
                                        Salvar para depois
                                    </button>
                                    <button class="text-gray-400 hover:text-red-500 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="bg-white rounded-xl shadow-soft p-5 hover:shadow-medium transition-all duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mb-4 sm:mb-0 sm:mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-lg">Jogo 2</h3>
                                    <p class="text-sm text-gray-500 mb-1">Plataforma 1</p>
                                    <div class="flex items-center mb-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-50 text-secondary-700">
                                            Físico
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 ml-2">
                                            Envio em 24h
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right mt-2 sm:mt-0">
                                    <div class="font-bold text-lg text-gray-800">€49,99</div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-2 pt-3 border-t border-gray-100">
                                <div class="flex items-center mb-3 sm:mb-0">
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-l-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <span class="w-10 h-8 flex items-center justify-center border-t border-b border-gray-200 text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-r-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex space-x-3">
                                    <button class="text-primary hover:text-primary-dark transition-all text-sm font-medium">
                                        Salvar para depois
                                    </button>
                                    <button class="text-gray-400 hover:text-red-500 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 3 -->
                <div class="bg-white rounded-xl shadow-soft p-5 hover:shadow-medium transition-all duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mb-4 sm:mb-0 sm:mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-lg">Jogo 3</h3>
                                    <p class="text-sm text-gray-500 mb-1">Plataforma 1</p>
                                    <div class="flex items-center mb-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-50 text-primary-dark">
                                            Digital
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 ml-2">
                                            Promoção
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right mt-2 sm:mt-0">
                                    <div class="font-bold text-lg text-gray-800">€19,99</div>
                                    <div class="text-xs text-gray-500 line-through">€24,99</div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-2 pt-3 border-t border-gray-100">
                                <div class="flex items-center mb-3 sm:mb-0">
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-l-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <span class="w-10 h-8 flex items-center justify-center border-t border-b border-gray-200 text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-r-md bg-gray-50 hover:bg-gray-100 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex space-x-3">
                                    <button class="text-primary hover:text-primary-dark transition-all text-sm font-medium">
                                        Salvar para depois
                                    </button>
                                    <button class="text-gray-400 hover:text-red-500 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Products -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Recomendados para você</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl shadow-soft p-4 hover:shadow-medium transition-all duration-300 flex">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">Jogo Recomendado 1</h3>
                                <p class="text-xs text-gray-500 mb-1">Plataforma 1</p>
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">€24,99</span>
                                    <button class="text-xs bg-primary text-white px-2 py-1 rounded hover:bg-primary-dark transition-all">
                                        Adicionar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-soft p-4 hover:shadow-medium transition-all duration-300 flex">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">Jogo Recomendado 2</h3>
                                <p class="text-xs text-gray-500 mb-1">Plataforma 2</p>
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">€34,99</span>
                                    <button class="text-xs bg-primary text-white px-2 py-1 rounded hover:bg-primary-dark transition-all">
                                        Adicionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary - 1/3 width on desktop -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-soft p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Resumo do Pedido</h2>

                    <!-- Coupon Code -->
                    <div class="mb-6">
                        <div class="flex">
                            <input type="text" placeholder="Código promocional"
                                class="flex-1 py-2.5 px-3 rounded-l-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-gray-700 placeholder-gray-400 text-sm">
                            <button class="bg-primary hover:bg-primary-dark text-white font-medium px-4 py-2.5 rounded-r-lg text-sm transition-all">
                                Aplicar
                            </button>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal (3 itens)</span>
                            <span class="font-medium">€99,97</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Desconto</span>
                            <span class="font-medium text-green-600">-€15,00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Frete</span>
                            <span class="font-medium">€4,99</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Impostos</span>
                            <span class="font-medium">€10,00</span>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-4"></div>

                    <!-- Total -->
                    <div class="flex justify-between mb-6">
                        <span class="font-bold text-lg text-gray-800">Total</span>
                        <span class="font-bold text-lg text-gray-800">€99,96</span>
                    </div>

                    <!-- Checkout Button -->
                    <button class="w-full bg-secondary hover:bg-secondary-light text-gray-900 font-bold py-3.5 rounded-lg shadow-soft transition-all mb-4">
                        Finalizar Compra
                    </button>

                    <!-- Payment Methods -->
                    <div class="mb-4">
                        <p class="text-xs text-gray-500 mb-2 text-center">Métodos de pagamento aceitos</p>
                        <div class="flex justify-center space-x-2">
                            <div class="w-10 h-6 bg-gray-200 rounded"></div>
                            <div class="w-10 h-6 bg-gray-200 rounded"></div>
                            <div class="w-10 h-6 bg-gray-200 rounded"></div>
                            <div class="w-10 h-6 bg-gray-200 rounded"></div>
                        </div>
                    </div>

                    <!-- Secure Checkout -->
                    <div class="flex items-center justify-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Pagamento seguro e criptografado
                    </div>

                    <!-- Delivery Information -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="font-semibold text-gray-800 mb-2">Informações de Entrega</h3>
                        <div class="bg-gray-50 rounded-lg p-3 text-sm">
                            <p class="text-gray-600 mb-1">Entrega estimada:</p>
                            <p class="font-medium text-gray-800">3-5 dias úteis</p>
                            <div class="mt-2 pt-2 border-t border-gray-200">
                                <div class="flex items-center text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs font-medium">Mais informações</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-4">GameStore</h3>
                    <p class="text-sm">A melhor loja de jogos online com os melhores preços e promoções exclusivas.</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Links Rápidos</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-all">Início</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Jogos</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Plataformas</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Promoções</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Suporte</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-all">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Contato</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Política de Privacidade</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Termos de Uso</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Newsletter</h3>
                    <p class="text-sm mb-2">Receba novidades e promoções exclusivas.</p>
                    <div class="flex">
                        <input type="email" placeholder="Seu e-mail" class="flex-1 py-2 px-3 rounded-l-lg text-gray-800 text-sm">
                        <button class="bg-primary hover:bg-primary-dark text-white font-medium px-4 py-2 rounded-r-lg text-sm transition-all">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center">
                &copy; 2025 GameStore. Todos os direitos reservados.
            </div>
        </div>
    </footer>
</x-layout>
