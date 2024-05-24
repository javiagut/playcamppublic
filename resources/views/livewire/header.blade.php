<div class="w-full h-16 bg-white shadow flex items-center px-8" style="font-family: Righteous">
    <div class="lg:w-5/12 text-gray-700">
        Todos los <b>Campings</b> de España en un mismo lugar
    </div>
    <div class="flex flex-col items-center h-16 lg:w-2/12 w-11/12">
        <a href="{{route('home')}}">
            <p style="font-family: Righteous" class="text-3xl">PlayCamp</p>
            <p style="font-family: Righteous;" class="text-red-400 mb-4 text-sm">no te pierdas nada</p>
        </a>
    </div>
    <div class="h-16 flex justify-end items-center w-1/12 lg:w-5/12">
        <div class="lg:hidden">
            <x-dropdown>
                <x-slot name="trigger">
                    <span class="material-symbols-outlined text-red-400 text-2xl cursor-pointer hover:text-red-600">menu</span>
                </x-slot>
            
                <x-slot name="content">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Montaña</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Playa</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relax</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Fiesta</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Deporte</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Familia</a>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
        <div class="hidden lg:flex justify-between gap-3 pr-8">
            <a href="{{route('tipo',['tipo' => 'montana'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'montana']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Montaña</a>
            <a href="{{route('tipo',['tipo' => 'playa'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'playa']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Playa</a>
            <a href="{{route('tipo',['tipo' => 'relax'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'relax']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Relax</a>
            <a href="{{route('tipo',['tipo' => 'fiesta'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'fiesta']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Fiesta</a>
            <a href="{{route('tipo',['tipo' => 'deporte'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'deporte']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Deporte</a>
            <a href="{{route('tipo',['tipo' => 'familia'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'familia']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Familia</a>
        </div>
    </div>

</div>

