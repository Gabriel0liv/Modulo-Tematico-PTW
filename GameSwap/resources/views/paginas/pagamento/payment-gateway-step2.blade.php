<x-layout>
    <main class="container mx-auto py-8 px-4">
        <div class="max-w-2xl mx-auto">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Assinatura Premium</h1>
                <p class="text-gray-600">Complete seu pagamento para acessar todos os benefícios premium</p>
            </div>

            <!-- Progress Steps -->
            <div class="flex items-center justify-center mb-8">
                <div class="flex items-center">
                    <div class="rounded-full h-8 w-8 flex items-center justify-center bg-blue-600 text-white">
                        1
                    </div>
                    <div class="h-1 w-12 bg-blue-600"></div>
                </div>

                <div class="flex items-center">
                    <div class="rounded-full h-8 w-8 flex items-center justify-center bg-blue-600 text-white">
                        2
                    </div>
                    <div class="h-1 w-12 bg-gray-200"></div>
                </div>

                <div class="flex items-center">
                    <div class="rounded-full h-8 w-8 flex items-center justify-center bg-gray-200 text-gray-600">
                        3
                    </div>
                </div>
            </div>

            <!-- Payment Step -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Informações de Pagamento</h3>
                    <p class="text-sm text-muted-foreground">Insira os dados do seu cartão de crédito</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 mb-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-medium text-gray-800">Plano Premium</h3>
                                <p class="text-sm text-gray-600">Cobrança mensal</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-blue-600 text-lg">R$ 19,90</p>
                                <p class="text-xs text-gray-500">por mês</p>
                            </div>
                        </div>
                    </div>

                    <form id="formPay2" class="space-y-4" action="{{ route('assinatura-3') }}" method="GET">
                        <div class="space-y-2">
                            <label for="cardNumber" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Número do Cartão</label>
                            <div class="relative">
                                <input id="cardNumber" name="cardNumber" placeholder="0000 0000 0000 0000" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                                <i data-lucide="credit-card" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-5 w-5"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="expiryDate" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Data de Validade</label>
                                <input id="expiryDate" name="expiryDate" placeholder="MM/AA" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                            </div>

                            <div class="space-y-2">
                                <label for="cvv" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">CVV</label>
                                <input id="cvv" name="cvv" placeholder="123" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                            </div>
                        </div>
                        <!--
                        <div class="pt-4">
                            <a href="{{route('assinatura-3')}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white">
                                Finalizar Pagamento
                            </a> -->
                        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white">
                            Finalizar Pagamento
                        </button>
                </div>
                </form>
            </div>
            <div class="flex items-center p-6 pt-0 flex flex-col space-y-2 text-center text-xs text-gray-500 border-t pt-4">
                <p>Seus dados de pagamento são processados com segurança.</p>
                <p>Você pode cancelar sua assinatura a qualquer momento.</p>
            </div>
        </div>
        </div>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM completamente carregado e analisado');
            const form = document.getElementById('formPay2'); // Seleciona o formulário principal
            const cardNumberField = document.getElementById('cardNumber'); // Campo do número do cartão
            const expiryDateField = document.getElementById('expiryDate'); // Campo da data de validade
            const cvvField = document.getElementById('cvv'); // Campo do CVV

            // Verifica se os elementos existem no DOM
            if (!form || !cardNumberField || !expiryDateField || !cvvField) {
                console.error('Erro: Formulário ou campos não encontrados no DOM.');
                return;
            }

            // Adiciona um evento de validação ao enviar o formulário
            form.addEventListener('submit', function(event) {
                let isValid = true; // Flag para rastrear se o formulário é válido

                // Validação do número do cartão
                const cardNumberRegex = /^[0-9]{16}$/; // Regex para validar 16 dígitos
                const cardNumberValue = cardNumberField.value.replace(/\s+/g, ''); // Remove espaços
                if (cardNumberValue === '') {
                    alert('O número do cartão é obrigatório.');
                    cardNumberField.focus();
                    isValid = false;
                } else if (!cardNumberRegex.test(cardNumberValue)) {
                    alert('Insira um número de cartão válido com 16 dígitos.');
                    cardNumberField.focus();
                    isValid = false;
                }

                // Validação da data de validade
                const expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/; // Regex para validar formato MM/AA
                const expiryDateValue = expiryDateField.value.trim(); // Remove espaços extras
                if (expiryDateValue === '') {
                    alert('A data de validade é obrigatória.');
                    expiryDateField.focus();
                    isValid = false;
                } else if (!expiryDateRegex.test(expiryDateValue)) {
                    alert('Insira uma data de validade válida no formato MM/AA.');
                    expiryDateField.focus();
                    isValid = false;
                } else {
                    // Verifica se a data de validade não está no passado
                    const [month, year] = expiryDateValue.split('/');
                    const currentDate = new Date();
                    const expiryDate = new Date(`20${year}`, month - 1); // Converte para formato de data
                    if (expiryDate < currentDate) {
                        alert('A data de validade não pode estar no passado.');
                        expiryDateField.focus();
                        isValid = false;
                    }
                }

                // Validação do CVV
                const cvvRegex = /^[0-9]{3}$/; // Regex para validar 3 dígitos
                const cvvValue = cvvField.value.trim(); // Remove espaços extras
                if (cvvValue === '') {
                    alert('O CVV é obrigatório.');
                    cvvField.focus();
                    isValid = false;
                } else if (!cvvRegex.test(cvvValue)) {
                    alert('Insira um CVV válido com 3 dígitos.');
                    cvvField.focus();
                    isValid = false;
                }

                // Impede o envio do formulário se alguma validação falhar
                if (!isValid) {
                    event.preventDefault(); // Bloqueia o envio do formulário
                } else {
                    console.log('Formulário enviado com sucesso!');
                }
            });

            // Validação em tempo real para o campo do número do cartão
            cardNumberField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, ''); // Permite apenas números
                if (this.value.length > 16) {
                    this.value = this.value.slice(0, 16); // Limita a 16 dígitos
                }
            });

            // Validação em tempo real para o campo da data de validade
            expiryDateField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9/]/g, ''); // Permite apenas números e "/"
                if (this.value.length > 5) {
                    this.value = this.value.slice(0, 5); // Limita ao formato MM/AA
                }
            });

            // Validação em tempo real para o campo do CVV
            cvvField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, ''); // Permite apenas números
                if (this.value.length > 3) {
                    this.value = this.value.slice(0, 3); // Limita a 3 dígitos
                }
            });
        });

    </script>
</x-layout>
