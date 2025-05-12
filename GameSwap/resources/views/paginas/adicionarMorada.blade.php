
<x-layout>

    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Adicionar Morada</h1>

        <form action="{{ route('moradas.adicionar') }}" method="POST">
            @csrf

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nome da Morada</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nome_morada" class="block text-sm text-gray-600 mb-1">Nome</label>
                        <input type="text" id="nome_morada" name="nome_morada" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                </div>
            </div>

            <!-- Informações da Morada -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nova Morada</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="morada" class="block text-sm text-gray-600 mb-1">Morada</label>
                        <input type="text" id="morada" name="morada" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="codigo_postal" class="block text-sm text-gray-600 mb-1">Código Postal</label>
                        <input type="text" id="codigo_postal" name="codigo_postal" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="distrito" class="block text-sm text-gray-600 mb-1">Distrito</label>
                        <input type="text" id="distrito" name="distrito" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="localidade" class="block text-sm text-gray-600 mb-1">Localidade</label>
                        <input type="text" id="localidade" name="localidade" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold rounded-lg shadow-md">
                    Salvar Morada
                </button>
            </div>
        </form>
    </div>
</x-layout>
