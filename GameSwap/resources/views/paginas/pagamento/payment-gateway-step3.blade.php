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
          <div class="h-1 w-12 bg-blue-600"></div>
        </div>

        <div class="flex items-center">
          <div class="rounded-full h-8 w-8 flex items-center justify-center bg-blue-600 text-white">
            3
          </div>
        </div>
      </div>

      <!-- Confirmation Step -->
      <div class="rounded-lg border bg-card text-card-foreground shadow-sm text-center">
        <div class="p-6 pt-6">
          <div class="flex justify-center mb-4">
            <div class="rounded-full bg-green-100 p-3">
              <i data-lucide="check-circle" class="h-12 w-12 text-green-600"></i>
            </div>
          </div>

          <h2 class="text-2xl font-bold text-gray-800 mb-2">Pagamento Confirmado!</h2>
          <p class="text-gray-600 mb-6">
            Sua assinatura Premium foi ativada com sucesso. Aproveite todos os benefícios!
          </p>

          <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 mb-6 max-w-sm mx-auto">
            <div class="text-left">
              <div class="flex justify-between mb-2">
                <span class="text-gray-600">Plano:</span>
                <span class="font-medium">Premium Mensal</span>
              </div>
              <div class="flex justify-between mb-2">
                <span class="text-gray-600">Valor:</span>
                <span class="font-medium">R$ 19,90/mês</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Status:</span>
                <span class="text-green-600 font-medium">Ativo</span>
              </div>
            </div>
          </div>

          <a href="/" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full max-w-sm bg-blue-600 hover:bg-blue-700 text-white">
            Voltar para a Página Inicial
          </a>
        </div>
        <div class="flex items-center p-6 pt-0 flex flex-col space-y-2 text-center text-xs text-gray-500 border-t pt-4">
          <p>Um email de confirmação foi enviado para seu endereço de email.</p>
          <p>Você pode gerenciar sua assinatura a qualquer momento nas configurações da sua conta.</p>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Initialize Lucide icons
    lucide.createIcons();
  </script>
</x-layout>
