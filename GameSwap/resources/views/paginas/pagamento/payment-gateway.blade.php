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

    </script>
</x-layout>
