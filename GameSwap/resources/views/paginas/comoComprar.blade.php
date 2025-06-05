<x-layout>
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagem ilustrativa -->
            <div class="flex items-center justify-center">
                <img src="{{ asset('Images/comoComprar1.png') }}" alt="Tutorial Comprar Produto"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Texto explicativo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Como Comprar um Produto</h1>
                <div class="space-y-6">
                    <!-- Passo a passo para comprar -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Passo a Passo para Comprar</h2>
                        <ol class="list-decimal list-inside text-gray-600 space-y-2">
                            <li>
                                Acesse a página do produto desejado.
                                <p class="text-sm">Clique no produto que deseja comprar para visualizar os detalhes.</p>
                            </li>
                            <li>
                                Clique no botão <span class="text-blue-600 font-bold">Adicionar ao Carrinho</span>.
                                <p class="text-sm">O produto será adicionado ao seu carrinho de compras.</p>
                            </li>
                            <li>
                                Acesse o carrinho clicando no ícone de carrinho no topo da página.
                                <p class="text-sm">Revise os produtos adicionados e ajuste as quantidades, se necessário.</p>
                            </li>
                            <li>
                                Clique no botão <span class="text-blue-600 font-bold">Finalizar Compra</span>.
                                <p class="text-sm">Você será redirecionado para a página de checkout.</p>
                            </li>
                            <li>
                                Preencha os dados de pagamento e endereço de entrega.
                                <p class="text-sm">Certifique-se de que todas as informações estão corretas.</p>
                            </li>
                            <li>
                                Confirme o pagamento clicando em <span class="text-blue-600 font-bold">Confirmar Pagamento</span>.
                                <p class="text-sm">Após a confirmação, você verá uma mensagem de sucesso ou erro.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
            <!-- Imagem ilustrativa -->
            <div class="flex items-center justify-center">
                <img src="{{ asset('Images/comoComprar2.png') }}" alt="Tutorial Finalizar Compra"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Texto explicativo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Finalizar no Checkout</h1>
                <div class="space-y-6">
                    <!-- Passo a passo para finalizar -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Passo a Passo para Finalizar</h2>
                        <ol class="list-decimal list-inside text-gray-600 space-y-2">
                            <li>
                                Revise os itens no checkout.
                                <p class="text-sm">Certifique-se de que os produtos e valores estão corretos.</p>
                            </li>
                            <li>
                                Escolha o método de pagamento.
                                <p class="text-sm">Selecione entre cartão de crédito, débito ou outro método disponível.</p>
                            </li>
                            <li>
                                Insira os dados do cartão ou método de pagamento escolhido.
                                <p class="text-sm">Preencha os campos obrigatórios com atenção.</p>
                            </li>
                            <li>
                                Clique em <span class="text-blue-600 font-bold">Confirmar Pagamento</span>.
                                <p class="text-sm">Aguarde a confirmação do pagamento.</p>
                            </li>
                            <li>
                                Após o pagamento, você será redirecionado para a página de sucesso.
                                <p class="text-sm">Uma mensagem de confirmação será exibida.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
