<x-layout>
    <main class="container mx-auto py-8 px-4 flex-1">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Centro de Ajuda</h1>

            <div class="space-y-8">
                <section>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Perguntas Frequentes</h4>
                    <ul class="space-y-4 text-gray-700 leading-relaxed">
                        <li>
                            <strong>Como crio uma conta?</strong> Vá até "Registar", preencha os dados obrigatórios e confirme via
                            email, se necessário.
                        </li>
                        <li>
                            <strong>Como adiciono um produto?</strong> Aceda à sua conta, clique em "Adicionar Produto", preencha
                            os campos obrigatórios como nome, categoria, imagens e preço, e submeta.
                        </li>
                        <li>
                            <strong>Como adiciono produtos ao carrinho?</strong> No detalhe de um produto, clique em "Adicionar ao
                            carrinho".
                        </li>
                        <li>
                            <strong>Como removo um produto do carrinho?</strong> Aceda ao carrinho e clique em "Remover" junto ao
                            item internamente.
                        </li>
                        <li>
                            <strong>Como faço o checkout?</strong> No carrinho, clique em "Finalizar Compra". A aplicação
                            redireciona para a view de checkout, onde é feita a integração com a Stripe.
                        </li>
                        <li>
                            <strong>Como sei se meu pagamento foi confirmado?</strong> Após o pagamento via Stripe, será exibida
                            uma confirmação de sucesso ou erro.
                        </li>
                    </ul>
                </section>

                <section>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Denúncias e Segurança</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Se encontrar um anúncio enganoso ou um comentário ofensivo, utilize a funcionalidade de denúncia. A
                        equipa administrativa irá analisar o conteúdo e, caso aplicável, aplicar sanções conforme descrito nos
                        nossos{" "}
                        <Link href="/termos" class="text-blue-600 hover:text-blue-800 underline">
                        Termos de Uso
                        </Link>
                        .
                    </p>
                </section>

                <section>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Contactar Suporte</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Não encontrou o que procurava? Envie um email para: <strong>santananunesj32@gmail.com</strong>
                    </p>
                </section>

                <section>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Guias Rápidos</h4>
                    <ul class="space-y-2 text-gray-700 leading-relaxed">
                        <li>
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">
                                Como publicar um novo produto
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">
                                Como comprar um produto com Stripe
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">
                                Como denunciar um utilizador ou conteúdo
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </main>
</x-layout>
