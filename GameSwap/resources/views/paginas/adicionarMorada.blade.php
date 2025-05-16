
<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Adicionar Morada</h1>



        <!-- FORMULÁRIO PARA SALVAR MORADA (POST) -->
        <form action="{{ route('moradas.adicionar') }}" method="POST">
            @csrf

            <!-- Nome da Morada -->
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
                        @error('codigo_postal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="distrito_id" class="block text-sm text-gray-600 mb-1">Distrito</label>
                        <select id="distrito" name="distrito_id"  class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                            <option value="">Selecione um distrito</option>
                            @foreach($distritos as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="concelho_id" class="block text-sm text-gray-600 mb-1">Concelho</label>
                        <select id="localidade" name="concelho_id"  class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                            <option value="">Selecione um concelho</option>
                        </select>
                    </div>



                </div>
            </div>

            <!-- Botão de submissão -->
            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Morada
                </button>
            </div>

        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const distritoSelect = document.getElementById('distrito');
                const concelhoSelect = document.getElementById('localidade');

                distritoSelect.addEventListener('change', function () {
                    const distritoId = this.value;
                    concelhoSelect.innerHTML = '<option value="">Carregando...</option>';

                    if (!distritoId) {
                        concelhoSelect.innerHTML = '<option value="">Selecione um concelho</option>';
                        return;
                    }

                    fetch(`/concelhos/${distritoId}`)
                        .then(response => response.json())
                        .then(data => {
                            concelhoSelect.innerHTML = '<option value="">Selecione um concelho</option>';
                            data.forEach(concelho => {
                                concelhoSelect.innerHTML += `<option value="${concelho.id}">${concelho.nome}</option>`;
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao carregar concelhos:', error);
                            concelhoSelect.innerHTML = '<option value="">Erro ao carregar concelhos</option>';
                        });
                });
            });
        </script>
    @endpush
</x-layout>
