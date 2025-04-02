<x-layout>
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
  
            <form class="space-y-4">
              <div class="space-y-2">
                <label for="cardNumber" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Número do Cartão</label>
                <div class="relative">
                  <input
                    id="cardNumber"
                    name="cardNumber"
                    placeholder="0000 0000 0000 0000"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    required
                  />
                  <i data-lucide="credit-card" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-5 w-5"></i>
                </div>
              </div>
  
              <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                  <label for="expiryDate" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Data de Validade</label>
                  <input
                    id="expiryDate"
                    name="expiryDate"
                    placeholder="MM/AA"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    required
                  />
                </div>
  
                <div class="space-y-2">
                  <label for="cvv" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">CVV</label>
                  <input
                    id="cvv"
                    name="cvv"
                    placeholder="123"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    required
                  />
                </div>
              </div>
  
              <div class="pt-4">
                <a href="/paginas/pagamento/pagamento3" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white">
                  Finalizar Pagamento
                </a>
              </div>
            </form>
          </div>
          <div class="flex items-center p-6 pt-0 flex flex-col space-y-2 text-center text-xs text-gray-500 border-t pt-4">
            <p>Seus dados de pagamento são processados com segurança.</p>
            <p>Você pode cancelar sua assinatura a qualquer momento.</p>
          </div>
        </div>
    </div>

</x-layout>