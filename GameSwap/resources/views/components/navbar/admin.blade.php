<div>
    <div class="flex items-center space-x-6">
        <a href="{{ route('perfilPage') }}" class="flex items-center space-x-2">
            <div class="w-8 h-8 rounded-full bg-primary-300 flex items-center justify-center text-primary-800 font-bold">
                <span id="user-initials">A</span>
            </div>
            <span class="text-white text-sm hidden md:inline-block">Admin</span>
        </a>
    
        <a href="{{ route('mensagensPage') }}" class="relative group" aria-label="Mensagens">
            <i class="bi bi-chat-dots text-white text-xl"></i>
        </a>
    </div>
</div>