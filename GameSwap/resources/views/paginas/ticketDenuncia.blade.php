<x-layout>
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Submeter uma Denuncia</h1>
                <p class="text-gray-600">Por favor, forneça abaixo os detalhes da sua reclamação.</p>
            </div>

            <form id="complaintForm" class="space-y-6" method="POST" action="{{ route('denuncias.store') }}">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Usuario sendo denunciado</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        required
                        value="{{$denunciado->username}}"
                        readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label for="motivo" class="block text-sm font-medium text-gray-700 mb-1">Motivo da Denuncia</label>
                    <textarea
                        id="motivo"
                        name="motivo"
                        rows="5"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Por favor descreva em detalhes seu problema..."
                    ></textarea>
                    <p class="mt-1 text-xs text-gray-500">Por favor, forneça detalhes específicos sobre o incidente.</p>
                </div>

                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Categoria da Denuncia</label>
                    <select
                        id="tipo"
                        name="tipo"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="" disabled selected>Select a category</option>
                        <option value="harassment">Harassment</option>
                        <option value="spam">Spam</option>
                        <option value="inappropriate">Inappropriate content</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        required
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    >
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        Confirmo que esta denúncia é verdadeira e feita de boa fé.
                    </label>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Submeter Denuncia
                    </button>
                </div>
            </form>

            @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-md">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</x-layout>
