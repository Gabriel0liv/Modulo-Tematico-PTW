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

                <!-- Número do Cartão -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Número do Cartão</label>
                    <div class="relative">
                        <!-- Ícone (fora do Stripe container) -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect width="20" height="14" x="2" y="5" rx="2"/>
                                <line x1="2" y1="10" x2="22" y2="10"/>
                            </svg>
                        </div>

                        <!-- Container onde o Stripe vai montar o campo -->
                        <div id="card-number-element"
                             class="pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring focus:border-blue-300 transition-shadow">
                        </div>
                    </div>
                </div>

                <!-- Validade e CVC -->
                <!-- Validade -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Validade</label>
                    <div class="relative">
                        <!-- Ícone calendário -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <!-- Container para Stripe.js montar -->
                        <div id="card-expiry-element"
                             class="pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring focus:border-blue-300 transition-shadow">
                        </div>
                    </div>
                </div>

                <!-- CVC -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">CVC</label>
                    <div class="relative">
                        <!-- Ícone cadeado -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 11c0-.5304-.2107-1.0391-.5858-1.4142C11.0391 9.2107 10.5304 9 10 9s-1.0391.2107-1.4142.5858C8.2107 9.9609 8 10.4696 8 11c0 .5304.2107 1.0391.5858 1.4142C9.0391 12.7893 9.5304 13 10 13s1.0391-.2107 1.4142-.5858C11.7893 12.0391 12 11.5304 12 11z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 7h16M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7M4 7h16" />
                            </svg>
                        </div>

                        <!-- Container para Stripe.js montar -->
                        <div id="card-cvc-element"
                             class="pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring focus:border-blue-300 transition-shadow">
                        </div>
                    </div>
                </div>

                <div id="card-errors" class="text-red-600 text-sm mt-2"></div>
            </div>

            <!-- Botão de Submissão -->
            <div class="text-right">
                <button type="submit" id="card-button" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Cartão
                </button>
                @if (request('from') === 'checkout')
                    <input type="hidden" name="from" value="checkout">
                @endif
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

                        const style = {
                            base: {
                                fontSize: '16px',
                                color: '#374151', // Tailwind text-gray-700
                                fontFamily: 'inherit',
                                '::placeholder': {
                                    color: '#9ca3af' // Tailwind text-gray-400
                                },
                                padding: '12px'
                            },
                            invalid: {
                                color: '#ef4444', // Tailwind red-500
                                iconColor: '#ef4444'
                            }
                        };

                        // Criar os campos separados com estilo e placeholder
                        cardNumber = elements.create('cardNumber', {
                            placeholder: '1234 1234 1234 1234',
                            style: style
                        });
                        cardNumber.mount('#card-number-element');

                        cardExpiry = elements.create('cardExpiry', {
                            placeholder: 'MM/AA',
                            style: style
                        });
                        cardExpiry.mount('#card-expiry-element');

                        cardCvc = elements.create('cardCvc', {
                            placeholder: 'CVC',
                            style: style
                        });
                        cardCvc.mount('#card-cvc-element');

                        const form = document.getElementById('payment-form');
                        const cardHolderName = document.getElementById('card-holder-name');

                        form.addEventListener('submit', async function (e) {
                            e.preventDefault();

                            const { setupIntent, error } = await stripe.confirmCardSetup(
                                data.clientSecret,
                                {
                                    payment_method: {
                                        card: cardNumber,
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
