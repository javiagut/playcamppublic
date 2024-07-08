<div class="mt-16 lg:mt-0 mb-8 lg:p-2 w-full lg:w-7/12 h-fit lg:min-h-[35em] mx-auto" id="{{$tipo}}">
    <div class="flex flex-col gap-4 lg:p-2 w-full">
        <a class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
            <span>porque te mueve la <b class="text-2xl capitalize">{{$tipo}}</b></span>
            <img src="{{asset('vectors/'.$tipo.'.webp')}}" alt="camping de {{$tipo}}" class="h-12">
        </a>
        <div class="w-full px-4 lg:px-0 pt-3 flex flex-col lg:flex-row gap-4 justify-center" wire:loading.class="opacity-50">
            <div class="bg-white flex items-center px-2 rounded shadow-lg justify-between">
                <span class="material-symbols-outlined text-red-400">search</span>
                <input type="text" wire:model.live.debounce.250ms="search" placeholder="Buscar por Nombre" class="w-full lg:w-56 py-1 px-2 outline-none">
                <span wire:click="$set('province',[])" class="text-base material-symbols-outlined text-red-400 ml-2 hover:text-black transition-all cursor-pointer">close</span>
            </div>
            <x-province-select :province="$province"></x-province-select>
        </div>
        <div class="w-full overflow-x-scroll flex flex-col gap-4 items-center">
            @forelse ($empresas as $empresa)
                <x-empresa-card :empresa="$empresa" :key="$tipo" :servicioTipo="$servicioTipo"></x-empresa-card>
            @empty
                <div class="flex flex-col justify-center items-center" style="font-family:Righteous;">
                    <p class="text-center text-red-400 m-2 border border-red-400 bg-red-50 rounded-lg p-2 text-sm">Nada por aquí</p>
                    <span wire:click="cleanFilters()" class="animate-pulse mt-2 cursor-pointer" >Limpiar filtros</span>
                </div>
            @endforelse
            @if ($empresas->hasMorePages())
                <div class="flex items-center justify-center lg:mr-0 lg:min-w-full lg:max-w-full lg:w-full">
                    <button wire:click="loadMore()" class="px-3 py-1 text-center rounded bg-red-400 text-white transition-all shadow-lg" style="font-family: Righteous">
                        Mostrar más
                    </button>
                </div>
            @endif
        </div>
    </div>
    <script>
        function changeImage(id, i, empresa, url){
            document.getElementById(id).style.backgroundImage = `url(${url})`;
            var btn = document.getElementById('btn-bg-'+i+'-'+empresa);
            for (let e = 0; e < 5; e++) {
                if (i==e) {
                    document.getElementById('btn-bg-'+e+'-'+empresa).style.backgroundColor = '#1e293b';
                }else{
                    document.getElementById('btn-bg-'+e+'-'+empresa).style.backgroundColor = 'white';
                }
            }
        }
        function getElementsByPrefix(prefix) {
            return document.querySelectorAll(`[id^='${prefix}']`);
        }

        var elementsWithBg1 = getElementsByPrefix('btn-bg-0-');
        elementsWithBg1.forEach(function(element) {
            element.style.backgroundColor = '#1e293b';
        });
    </script>
</div>
