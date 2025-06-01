<x-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Adicionar Morada</h1>

        <form id="moradaForm" action="{{ route('moradas.adicionar') }}" method="POST" novalidate>
            @csrf

            <!-- Nome da Morada -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nome da Morada</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nome_morada" class="block text-sm text-gray-600 mb-1">Nome</label>
                        <input type="text" id="nome_morada" name="nome_morada" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        <p id="error-nome" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>
            </div>

            <!-- Informações da Morada -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Nova Morada</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="morada" class="block text-sm text-gray-600 mb-1">Morada</label>
                        <input type="text" id="morada" name="morada" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        <p id="error-morada" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <div>
                        <label for="codigo_postal" class="block text-sm text-gray-600 mb-1">Código Postal</label>
                        <input type="text" id="codigo_postal" name="codigo_postal" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="3800-000">
                        <p id="error-codigo_postal" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <div>
                        <label for="distrito" class="block text-sm text-gray-600 mb-1">Distrito</label>
                        <select id="distrito" name="distrito_id" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="">Selecione um distrito</option>
                            @foreach($distritos as $distrito)
                            <option value="{{ $distrito->id }}">{{ $distrito->nome }}</option>
                            @endforeach
                        </select>
                        <p id="error-distrito" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <div>
                        <label for="localidade" class="block text-sm text-gray-600 mb-1">Concelho</label>
                        <select id="localidade" name="concelho_id" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="">Selecione um concelho</option>
                        </select>
                        <p id="error-concelho" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>
            </div>

            <!-- Botão -->
            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                    Salvar Morada
                </button>
                @if (request('from') === 'checkout')
                    <input type="hidden" name="from" value="checkout">
                @endif
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('moradaForm');

            const fields = {
                nome_morada: document.getElementById('nome_morada'),
                morada: document.getElementById('morada'),
                codigo_postal: document.getElementById('codigo_postal'),
                distrito: document.getElementById('distrito'),
                concelho: document.getElementById('localidade'),
            };

            const errors = {
                nome_morada: document.getElementById('error-nome'),
                morada: document.getElementById('error-morada'),
                codigo_postal: document.getElementById('error-codigo_postal'),
                distrito: document.getElementById('error-distrito'),
                concelho: document.getElementById('error-concelho'),
            };

            function validateField(name) {
                const field = fields[name];
                const error = errors[name];
                let isValid = true;

                if (field.value.trim() === '') {
                    isValid = false;
                    error.textContent = 'Este campo é obrigatório.';
                } else if (name === 'codigo_postal' && !/^\d{4}-\d{3}$/.test(field.value.trim())) {
                    isValid = false;
                    error.textContent = 'O código postal deve estar no formato 0000-000.';
                }

                if (!isValid) {
                    field.classList.add('border-red-500');
                    error.classList.remove('hidden');
                } else {
                    field.classList.remove('border-red-500');
                    error.classList.add('hidden');
                }

                return isValid;
            }

            Object.keys(fields).forEach(name => {
                fields[name].addEventListener('blur', () => validateField(name));
            });

            form.addEventListener('submit', function (e) {
                let isFormValid = true;
                Object.keys(fields).forEach(name => {
                    const valid = validateField(name);
                    if (!valid) isFormValid = false;
                });

                if (!isFormValid) e.preventDefault();
            });

            // AJAX para carregar concelhos
            const distritoSelect = fields.distrito;
            const concelhoSelect = fields.concelho;

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
