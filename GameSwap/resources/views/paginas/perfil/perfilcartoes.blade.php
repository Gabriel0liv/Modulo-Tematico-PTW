<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Cartões Adicionados</h1>
            <a href="{{route('cart.adicionar')}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium border border-blue-600 text-blue-600 hover:bg-blue-50 transition h-10 px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Adicionar Cartão
          </a>
        </div>

        <div class="space-y-4">
          <!-- Card 1 - Primary -->
            @foreach ($cartoes as $cartao)
                <div class="rounded-lg border border-primary/50 bg-primary-light/30 text-card-foreground shadow-card">
                    <div class="flex flex-row items-center justify-between p-6 pb-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <h3 class="text-lg font-semibold leading-none tracking-tight">
                                {{ $cartao->nome_cartao}}
                            </h3>
                        </div>
                    </div>
                    <div class="p-6 pt-0 text-sm text-gray-600">
                        <p>ID Stripe: {{ $cartao->stripe_payment_method_id }}</p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </main>
  </div>
</x-layout>
