<div class="fixed lg:relative w-full h-16 bg-white shadow flex items-center px-8 z-50" style="font-family: Righteous">
    <div class="hidden lg:flex lg:w-5/12 text-gray-700">
        Descubre <span class="mx-1 text-red-400">el mejor sitio </span> para pasar tus vacaciones
    </div>
    <div class="flex flex-col items-center h-16 lg:w-2/12 w-11/12">
        <a href="{{route('home')}}">
            <p style="font-family: Righteous" class="text-3xl">PlayCamp</p>
            <p style="font-family: Righteous;" class="text-red-400 mb-4 text-sm">no te pierdas nada</p>
        </a>
    </div>
    <div class="h-16 flex justify-end items-center w-1/12 lg:w-5/12">
        <div class="lg:hidden">
            <x-dropdown maintain="false">
                <x-slot name="trigger">
                    <span class="material-symbols-outlined text-red-400 text-2xl cursor-pointer hover:text-red-600">menu</span>
                </x-slot>
            
                <x-slot name="content">
                    <div class="py-1">
                        @if (env('APP_DEBUG'))
                        <a href="{{route('blog')}}" class="flex items-center justify-between px-4 py-2 text-sm text-red-400">Blog <img src="{{asset('img/blog.webp')}}" class="ml-2 h-5" alt=""></a>
                        @endif
                        <a href="{{route('tipo',['tipo' => 'playa'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700">Playa <img src="{{asset('vectors/playa.webp')}}" class="ml-2 h-5" alt=""></a>
                        <a href="{{route('tipo',['tipo' => 'montana'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700">Montaña <img src="{{asset('vectors/montana.webp')}}" class="ml-2 h-5" alt=""></a>
                        <a href="{{route('tipo',['tipo' => 'relax'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 ">Relax <img src="{{asset('vectors/relax.webp')}}" class="ml-2 h-5" alt=""></a>
                        <a href="{{route('tipo',['tipo' => 'fiesta'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 ">Fiesta <img src="{{asset('vectors/fiesta.webp')}}" class="ml-2 h-5" alt=""></a>
                        <a href="{{route('tipo',['tipo' => 'deporte'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 ">Deporte <img src="{{asset('vectors/deporte.webp')}}" class="ml-2 h-5" alt=""></a>
                        <a href="{{route('tipo',['tipo' => 'familia'])}}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700">Familia <img src="{{asset('vectors/familia.webp')}}" class="ml-2 h-5" alt=""></a>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
        <div class="hidden lg:flex justify-between gap-3 pr-8">
            @if (env('APP_DEBUG'))
            <a href="{{route('blog')}}" class="ml-4 hover:bg-red-500 transition-all text-white bg-red-400 rounded px-3 {{request()->url()==route('blog') ? 'text-red-400': ''}}">/ Blog</a>
            @endif
            <a href="{{route('tipo',['tipo' => 'montana'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'montana']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Montaña</a>
            <a href="{{route('tipo',['tipo' => 'playa'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'playa']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Playa</a>
            <a href="{{route('tipo',['tipo' => 'relax'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'relax']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Relax</a>
            <a href="{{route('tipo',['tipo' => 'fiesta'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'fiesta']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Fiesta</a>
            <a href="{{route('tipo',['tipo' => 'deporte'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'deporte']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Deporte</a>
            <a href="{{route('tipo',['tipo' => 'familia'])}}" class="ml-4 hover:text-red-400 transition-all {{request()->url()==route('tipo',['tipo' => 'familia']) ? 'text-red-400': ''}}"><span class="text-red-400">/</span> Familia</a>
        </div>
    </div>

</div>

