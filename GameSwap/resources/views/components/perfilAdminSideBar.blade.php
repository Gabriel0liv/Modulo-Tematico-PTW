<!-- Sidebar -->
<div class="w-64 bg-sidebar border-r border-gray-200 h-full flex flex-col">
    <div class="border border-gray-300 rounded-xl p-2 bg-white h-full flex flex-col">
        <!-- Título -->
        <div class="p-6 border-b border-gray-200">
            <h2 class="font-semibold text-lg text-gray-800">Utilizador</h2>
        </div>

        <!-- Navegação -->
        <nav class="flex-1 p-4">
            <ul class="space-y-1 pl-1">
                <li>
                    <a href="{{route('perfilAdmin-Denuncias')}}" class="flex items-center gap-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all">
                        <i class="bi bi-flag-fill text-xl"></i>
                        <span>Denúncias</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('perfilAdmin-Estatisticas')}}" class="flex items-center gap-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all">
                        <i class="bi bi-bar-chart-line text-xl"></i>
                        <span>Estatísticas do Site</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('perfilAdmin-Aprovar')}}" class="flex items-center gap-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all">
                        <i class="bi bi-check-circle text-xl"></i>
                        <span>Aprovar Anúncios</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('perfil-AdminPage')}}" class="flex items-center gap-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all">
                        <i class="bi bi-person text-xl"></i>
                        <span>Gerir Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('perfilAdmin-Edição')}}" class="flex items-center gap-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all">
                        <i class="bi bi-gear text-xl"></i>
                        <span>Edição do Site</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sair -->
        <div class="p-4 border-t border-gray-200">
            <a href="#" class="flex items-center gap-4 px-3 py-2 text-gray-600 hover:bg-gray-100 hover:text-red-500 rounded-md transition-all">
                <i class="bi bi-box-arrow-right text-xl"></i>
                <span>Sair</span>
            </a>
        </div>
    </div>
</div>