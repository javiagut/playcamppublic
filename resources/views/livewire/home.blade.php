<div class="w-full flex-col gap-4 lg:px-4 pb-4 mt-16 lg:mt-0">
    <div class="w-full flex lg:flex-row flex-col pb-4 lg:flex-wrap">
        <div class="mt-4 text-center w-full">
            {{-- j --}}
        </div>
        <div class="w-full flex flex-wrap">
            <div id="mapa" class="w-full flex flex-wrap">
                <div class="rounded-lg w-11/12 lg:w-6/12 lg:h-[40em] h-96 mx-auto my-4" id="map"></div>
            </div>
            <div id="lista" class="w-full flex flex-wrap">
                @foreach ($categorias as $key => $item)
                    <div class="lg:p-2 w-full lg:w-1/3 h-fit {{$key=='playa' ? 'order-1' : 'order-2'}}" id="{{$key}}">
                        <div class="flex flex-col gap-4 lg:p-2 w-full">
                            <a href="{{route('tipo',['tipo' => $key])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                                <span>porque te mueve la <b class="text-2xl capitalize">{{$key}}</b></span>
                                <img src="{{asset('vectors/'.$key.'.webp')}}" alt="campings {{$key}}" class="h-12">
                            </a>
                            <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 {{$item->hasMorePages() ? 'pl-4' : 'px-4'}} lg:px-0 pt-2 pb-3 lg:pb-0 lg:py-0">
                                @forelse ($item as $empresa)
                                    <x-empresa-card :empresa="$empresa" :key="$key" :servicioTipo="$servicioTipo"></x-empresa-card>
                                @empty
                                    <div class="w-full p-4 text-center border border-red-400 text-red-400 bg-red-50 rounded-lg" style="font-family: Righteous">Nada por aquí</div>
                                @endforelse
                                @if ($item->hasMorePages())
                                    <div class="flex items-center justify-center lg:mr-0 lg:min-w-full lg:max-w-full lg:w-full">
                                        <button wire:click="loadMore('{{$key}}')" class="px-3 py-1 text-center rounded-l lg:rounded-r bg-red-400 text-white transition-all shadow-lg" style="font-family: Righteous">
                                            <span class="hidden lg:flex">Mostrar más</span>
                                            <span class="flex lg:hidden">Más</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        // MAPA
        var osmUrl = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
		osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});

        var map = L.map('map').setView([40.418, -3.702], 6).addLayer(osm);
        L.tileLayer('https://playcamp.es', {
            attribution: 'PlayCamp 2024',
            minZoom: 6,
            maxZoom: 10,
        }).addTo(map);
        var empresas = @json($empresas);
        empresas.forEach(element => {
            if (element.latitud != '' && element.longitud != '') {
                L.marker([element.latitud, element.longitud]).addTo(map)
                    .bindPopup('<b>'+element.nombre+'</b><br><small><b>'+element.provincia+'</b></small>');
                
            }
        });
        // FOTOS DE EMPRESAS
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
