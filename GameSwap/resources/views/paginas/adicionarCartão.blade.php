<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Adicionar Cartão</h1>

        <!-- FORMULÁRIO DE CARTÃO -->
        <form id="payment-form" method="POST" action="{{ route('cartao.store') }}">
            @csrf

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nome para o Cartão</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nome_cartaoe" class="block text-sm text-gray-600 mb-1">Nome para o Cartão</label>
                        <input type="text" id="nome_cartao" name="nome_cartao" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
            </div>

            <!-- Nome do Titular -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nome do Titular</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="card-holder-name" class="block text-sm text-gray-600 mb-1">Nome Completo</label>
                        <input type="text" id="card-holder-name" name="card_holder_name" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
            </div>

            <!-- Informações do Cartão -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Informações do Cartão</h2>

                <label class="block text-sm text-gray-600 mb-1">Número do Cartão</label>
                <div id="card-number-element" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white mb-4"></div>

                <label class="block text-sm text-gray-600 mb-1">Validade</label>
                <div id="card-expiry-element" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white mb-4"></div>

                <label class="block text-sm text-gray-600 mb-1">CVC</label>
                <div id="card-cvc-element" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white mb-4"></div>

                <div id="card-errors" class="text-red-600 text-sm mt-2"></div>
            </div>

            <!-- Botão de Submissão -->
            <div class="text-right">
                <button type="submit" id="card-button" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Cartão
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let stripe, cardNumber, cardExpiry, cardCvc;

                fetch('/stripe/setup-intent')
                    .then(res => res.json())
                    .then(data => {
                        stripe = Stripe(data.stripeKey);
                        const elements = stripe.elements();

                        // Criar os campos separados
                        cardNumber = elements.create('cardNumber');
                        cardNumber.mount('#card-number-element');

                        cardExpiry = elements.create('cardExpiry');
                        cardExpiry.mount('#card-expiry-element');

                        cardCvc = elements.create('cardCvc');
                        cardCvc.mount('#card-cvc-element');

                        const form = document.getElementById('payment-form');
                        const cardHolderName = document.getElementById('card-holder-name');

                        form.addEventListener('submit', async function (e) {
                            e.preventDefault();

                            const { setupIntent, error } = await stripe.confirmCardSetup(
                                data.clientSecret,
                                {
                                    payment_method: {
                                        card: cardNumber, // usar o cardNumber como referência
                                        billing_details: {
                                            name: cardHolderName.value
                                        }
                                    }
                                }
                            );

                            if (error) {
                                document.getElementById('card-errors').textContent = error.message;
                            } else {
                                const hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'payment_method');
                                hiddenInput.setAttribute('value', setupIntent.payment_method);
                                form.appendChild(hiddenInput);
                                form.submit();
                            }
                        });
                    });
            });
        </script>
    @endpush
</x-layout>
