<x-layout>
  <div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
      <x-perfilSideBar>
      </x-perfilSideBar>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
      <div class="container mx-auto py-8 px-6 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Moradas Adicionadas</h1>
          <a href="{{route('moradas.adicionar.form')}}" id="addAdressBtn" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary-hover h-10 px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Adicionar Morada
          </a>
        </div>

        <div class="space-y-4">
            <!-- Form to add new address -->
            <div id="moradaFormContainer" class="space-y-4 mt-4">

            </div>


            <div id="moradas-guardadas">

            </div>
          <!-- Moradas -->

            @foreach ($moradas as $morada)
                <div class="rounded-lg border bg-card text-card-foreground shadow-card">
                    <div class="flex flex-row items-center justify-between p-6 pb-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="text-lg font-semibold leading-none tracking-tight">{{$morada -> nome_morada}}</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{route('moradas.editar.form', $morada->id)}}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-gray-500 bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            <form action="{{route('moradas.apagar', $morada->id)}}"  method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta morada?');">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium text-destructive bg-transparent hover:bg-gray-100 h-8 w-8 p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="space-y-1 text-gray-700">
                            <p>{{$morada->morada}}</p>
                            <p>{{$morada->codigo_postal}},{{$morada->concelho->nome ?? 'N/A'}}</p>
                            <p>{{$morada ->distrito->nome ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </main>
  </div>
</x-layout>
