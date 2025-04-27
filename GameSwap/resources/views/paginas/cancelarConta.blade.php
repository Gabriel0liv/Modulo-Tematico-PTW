<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Cancelar Conta</h2>

            <p class="text-sm text-gray-600 mb-4">
                Ao cancelar a sua conta, todos os seus dados serão permanentemente eliminados. Esta ação não pode ser revertida.
            </p>

            <form action="{{route('user.deletar')}}" method="post">
                @csrf
                <input  type="password" name="password" placeholder="Confirme sua senha" required>
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-red-50 border border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 h-10 px-4 py-2">
                    Cancelar Conta
                </button>
            </form>
        </div>
    </div>
</x-layout>
