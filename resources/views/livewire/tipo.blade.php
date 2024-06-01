<div class="mt-16 mb-8 lg:p-2 w-full lg:w-1/3 h-fit" id="{{$tipo}}">
    <div class="flex flex-col gap-4 lg:p-2 w-full">
        <a class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
            <span>porque te mueve la <b class="text-2xl capitalize">{{$tipo}}</b></span>
            <img src="{{asset('vectors/'.$tipo.'.png')}}" alt="" class="h-12">
        </a>
        <div class="w-full px-4 lg:px-0 pt-4 flex flex-col lg:flex-row gap-4 justify-center" wire:loading.class="opacity-50">
            <div class="bg-white flex items-center px-2 rounded shadow-lg justify-between">
                <span class="material-symbols-outlined text-red-400">search</span>
                <input type="text" wire:model.live.debounce.250ms="search" placeholder="Buscar por Nombre" class="w-full lg:w-56 py-1 px-2 outline-none">
                <span wire:click="$set('province',[])" class="text-base material-symbols-outlined text-red-400 ml-2 hover:text-black transition-all cursor-pointer">close</span>
            </div>
            <x-province-select :province="$province"></x-province-select>
        </div>
        <div class="w-full overflow-x-scroll flex flex-col lg:flex-row gap-4 items-center">
            @forelse ($empresas as $empresa)
                <x-empresa-card :empresa="$empresa" :key="$tipo" :servicioTipo="$servicioTipo"></x-empresa-card>
            @empty
                <div class="flex flex-col justify-center items-center">
                    <p class="text-center text-red-400 m-2 border border-red-400 bg-red-100 rounded p-2 text-sm">No se han encontrado resultados</p>
                    <span wire:click="cleanFilters()" class="animate-pulse mt-2 cursor-pointer" style="font-family:Righteous;">Limpiar filtros</span>
                </div>
            @endforelse
            @if ($empresas->hasMorePages())
                <div class="flex items-center justify-center lg:mr-0 lg:min-w-full lg:max-w-full lg:w-full">
                    <button wire:click="loadMore('{{$tipo}}')" class="px-3 py-1 text-center rounded bg-red-400 text-white transition-all shadow-lg" style="font-family: Righteous">
                        Mostrar más
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
