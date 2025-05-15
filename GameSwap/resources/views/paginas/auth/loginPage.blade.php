<x-layout>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-600 py-4">
            <h2 class="text-center text-white text-2xl font-bold">Entrar na sua conta</h2>
        </div>
        <div class="p-6">
            <form  action="{{route('login')}}" method="POST" >
                @csrf
                <div class="mb-6">
                    <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">username</label>
                    <input type="text" id="username" name="username"
                           class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="username" required>
                    @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                           placeholder="********" required>
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-600 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Lembrar-me</label>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Esqueceu a senha?</a>
                </div>
                <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-4 rounded-md transition duration-300 shadow-md">
                    Entrar
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-gray-600">Não tem uma conta?
                    <a href="{{route('registoPage')}}" class="text-blue-600 font-semibold hover:underline">Registre-se</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
