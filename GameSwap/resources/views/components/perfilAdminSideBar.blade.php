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
                    <a href="/perfilAdmin/denuncias" class="flex items-center gap-4 px-3 py-2 rounded-md transition-all
        {{ request()->is('perfilAdmin/denuncias') ? 'bg-gray-200 text-primary font-semibold' : 'text-sidebar-foreground hover:bg-gray-100 hover:text-blue-600' }}">
                        <i class="bi bi-flag-fill text-xl"></i>
                        <span>Denúncias</span>
                    </a>
                </li>
                <li>
                    <a href="/perfilAdmin/utilizadores" class="flex items-center gap-4 px-3 py-2 rounded-md transition-all
        {{ request()->is('perfilAdmin/utilizadores') ? 'bg-gray-200 text-primary font-semibold' : 'text-sidebar-foreground hover:bg-gray-100 hover:text-blue-600' }}">
                        <i class="bi bi-bar-chart-line text-xl"></i>
                        <span>Listagem Utilizadores</span>
                    </a>
                </li>
                <li>
                    <a href="/perfilAdmin/aprovar" class="flex items-center gap-4 px-3 py-2 rounded-md transition-all
        {{ request()->is('perfilAdmin/aprovar') ? 'bg-gray-200 text-primary font-semibold' : 'text-sidebar-foreground hover:bg-gray-100 hover:text-blue-600' }}">
                        <i class="bi bi-check-circle text-xl"></i>
                        <span>Aprovar Anúncios</span>
                    </a>
                </li>
                <li>
                    <a href="/perfilAdmin" class="flex items-center gap-4 px-3 py-2 rounded-md transition-all
        {{ request()->is('perfilAdmin') ? 'bg-gray-200 text-primary font-semibold' : 'text-sidebar-foreground hover:bg-gray-100 hover:text-blue-600' }}">
                        <i class="bi bi-person text-xl"></i>
                        <span>Gerir Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="/perfilAdmin/Edicao" class="flex items-center gap-4 px-3 py-2 rounded-md transition-all
        {{ request()->is('perfilAdmin/Edicao*') ? 'bg-gray-200 text-primary font-semibold' : 'text-sidebar-foreground hover:bg-gray-100 hover:text-blue-600' }}">
                        <i class="bi bi-gear text-xl"></i>
                        <span>Edição do Site</span>
                    </a>
                </li>
            </ul>

        </nav>

        <!-- Sair -->
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <div class="p-4 mt-auto border-t border-gray-200">
                <button href="#" class="flex items-center gap-3 px-4 py-3 bg-red-50 border  border-red-200 hover:border-red-300 text-red-600 hover:text-red-700 rounded-md transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Sair</span>
                </button>
            </div>
        </form>
    </div>
</div>
