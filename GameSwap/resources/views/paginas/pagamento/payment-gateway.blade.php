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
                    <div class="rounded-full h-8 w-8 flex items-center justify-center bg-gray-200 text-gray-600">
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

            <!-- Details Step -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Detalhes da Assinatura</h3>
                    <p class="text-sm text-muted-foreground">Preencha suas informações para continuar</p>
                </div>
                <div class="p-6 pt-0">
                    <form id="formpay1" class="space-y-4" action="{{ route('assinatura-2') }}" method="GET" >
                        <div class="space-y-2">
                            <label for="name" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nome Completo</label>
                            <input id="name" name="name" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Email</label>
                            <input id="email" name="email" type="email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                        </div>

                        <div class="space-y-2">
                            <label for="address" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Endereço</label>
                            <input id="address" name="address" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="city" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Cidade</label>
                                <input id="city" name="city" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                            </div>

                            <div class="space-y-2">
                                <label for="zipCode" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">CEP</label>
                                <input id="zipCode" name="zipCode" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required />
                            </div>
                        </div>

                        <!--<a href="{{route('assinatura-2')}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white">
                            Continuar para Pagamento
                        </a> -->
                        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white">
                            Continuar para Pagamento
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formPay1'); // Seleciona o formulário principal
            const nameField = document.getElementById('name'); // Campo do nome completo
            const emailField = document.getElementById('email'); // Campo do email
            const addressField = document.getElementById('address'); // Campo do endereço
            const cityField = document.getElementById('city'); // Campo da cidade
            const zipCodeField = document.getElementById('zipCode'); // Campo do CEP

            // Adiciona um evento de validação ao enviar o formulário
            form.addEventListener('submit', function(event) {
                let isValid = true; // Flag para rastrear se o formulário é válido

                // Validação do nome completo
                if (nameField.value.trim() === '') {
                    alert('O nome completo é obrigatório.');
                    nameField.focus();
                    isValid = false;
                } else if (nameField.value.length < 3) {
                    alert('O nome completo deve ter pelo menos 3 caracteres.');
                    nameField.focus();
                    isValid = false;
                }

                // Validação do email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex para validar email
                if (emailField.value.trim() === '') {
                    alert('O email é obrigatório.');
                    emailField.focus();
                    isValid = false;
                } else if (!emailRegex.test(emailField.value)) {
                    alert('Insira um email válido.');
                    emailField.focus();
                    isValid = false;
                }

                // Validação do endereço
                if (addressField.value.trim() === '') {
                    alert('O endereço é obrigatório.');
                    addressField.focus();
                    isValid = false;
                } else if (addressField.value.length < 5) {
                    alert('O endereço deve ter pelo menos 5 caracteres.');
                    addressField.focus();
                    isValid = false;
                }

                // Validação da cidade
                if (cityField.value.trim() === '') {
                    alert('A cidade é obrigatória.');
                    cityField.focus();
                    isValid = false;
                }

                // Validação do CEP
                const zipCodeRegex = /^[0-9]{5}-?[0-9]{3}$/; // Regex para validar CEP (formato 12345-678 ou 12345678)
                if (zipCodeField.value.trim() === '') {
                    alert('O CEP é obrigatório.');
                    zipCodeField.focus();
                    isValid = false;
                } else if (!zipCodeRegex.test(zipCodeField.value)) {
                    // Verifica se o CEP está no formato correto
                    alert('Insira um CEP válido no formato 12345-678.');
                    zipCodeField.focus();
                    isValid = false;
                }

                // Impede o envio do formulário se alguma validação falhar
                if (!isValid) {
                    event.preventDefault();
                } else {
                    // Redireciona para a próxima página se o formulário for válido

                    window.location.href = "{{route('assinatura-2')}}"; // Substitua pela rota da próxima página
                }
            });

            // Validação em tempo real para o campo de email
            emailField.addEventListener('input', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value)) {
                    emailField.classList.add('border-red-500'); // Adiciona uma borda vermelha se o email for inválido
                } else {
                    emailField.classList.remove('border-red-500'); // Remove a borda vermelha se o email for válido
                }
            });

            // Validação em tempo real para o campo de CEP
            zipCodeField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9-]/g, ''); // Permite apenas números e o caractere "-"
            });
        });

    </script>
</x-layout>
