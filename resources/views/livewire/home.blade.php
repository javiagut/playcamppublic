<div class="w-full flex-col gap-4 lg:px-4 pb-4 mt-16 lg:mt-0">
    <div class="w-full flex lg:flex-row flex-col pb-4 lg:flex-wrap">
        <div class="w-full px-4 lg:px-0 pt-8 flex flex-col lg:flex-row gap-4 justify-center">
            <div class="bg-white flex items-center px-2 rounded shadow-lg justify-between">
                <span class="material-symbols-outlined text-red-400">search</span>
                <input type="text" wire:model.live.debounce.100ms="search" placeholder="Buscar por Nombre" class="w-full lg:w-56 py-1 px-2 outline-none">
                <span wire:click="$set('province',[])" class="text-base material-symbols-outlined text-red-400 ml-2 hover:text-black transition-all cursor-pointer">close</span>
            </div>
            <div class="bg-white flex justify-between items-center px-2 rounded shadow-lg py-1">
                <span class="material-symbols-outlined text-red-400">location_city</span>
                <x-dropdown maintain="true" align="left" w="w-full">
                    <x-slot name="trigger">
                        <div class="w-full lg:w-56 flex gap-2 items-center px-2 cursor-pointer text-gray-400 hover:text-black transition-all whitespace-nowrap overflow-hidden">
                            @if (count($province) == 0)
                                Buscar por Provincia
                            @elseif(count($province) > 3)
                                {{$province[0]}}, {{$province[0]}}, {{$province[0]}}...
                            @else
                                @foreach ($province as $item)
                                    {{$item}}{{!$loop->last ? ',' : ''}}
                                @endforeach
                            @endif
                        </div>
                    </x-slot>
                
                    <x-slot name="content">
                        <div class="px-4 py-2">
                            <p class="text-xs mb-1"><span class="text-red-400">{{count($province)}}</span> {{count($province)>1 ? 'provincias' : 'provincia'}} seleccionadas</p>
                            
                            <p style="font-family: Righteous">Andalucía</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Almería',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Almería')">
                                    Almería
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Almería',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Cádiz',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Cádiz')">
                                    Cádiz
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Cádiz',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Córdoba',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Córdoba')">
                                    Córdoba
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Córdoba',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Granada',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Granada')">
                                    Granada
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Granada',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Huelva',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Huelva')">
                                    Huelva
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Huelva',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Jaén',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Jaén')">
                                    Jaén
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Jaén',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Málaga',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Málaga')">
                                    Málaga
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Málaga',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Sevilla',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Sevilla')">
                                    Sevilla
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Sevilla',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Aragón</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Huesca',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Huesca')">
                                    Huesca
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Huesca',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Teruel',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Teruel')">
                                    Teruel
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Teruel',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Zaragoza',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Zaragoza')">
                                    Zaragoza
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Zaragoza',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Asturias</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Asturias',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Asturias')">
                                    Asturias
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Asturias',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Baleares</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Islas Baleares',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Islas Baleares')">
                                    Islas Baleares
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Islas Baleares',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Canarias</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Las Palmas',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Las Palmas')">
                                    Las Palmas
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Las Palmas',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Santa Cruz de Tenerife',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Santa Cruz de Tenerife')">
                                Santa Cruz de Tenerife
                                <span class="material-symbols-outlined text-red-400">{{in_array('Santa Cruz de Tenerife',$province) ? 'check' : ''}}</span>
                                  </p>
                            </div>

                            <p style="font-family: Righteous">Cantabria</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Cantabria',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Cantabria')">
                                    Cantabria
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Cantabria',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Castilla y León</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Ávila',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Ávila')">
                                    Ávila
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Ávila',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Burgos',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Burgos')">
                                    Burgos
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Burgos',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('León',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('León')">
                                    León
                                    <span class="material-symbols-outlined text-red-400">{{in_array('León',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Palencia',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Palencia')">
                                    Palencia
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Palencia',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Salamanca',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Salamanca')">
                                    Salamanca
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Salamanca',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Segovia',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Segovia')">
                                    Segovia
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Segovia',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Soria',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Soria')">
                                    Soria
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Soria',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Valladolid',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Valladolid')">
                                    Valladolid
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Valladolid',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Zamora',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Zamora')">
                                    Zamora
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Zamora',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Castilla-La Mancha</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Albacete',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Albacete')">
                                    Albacete
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Albacete',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Ciudad Real',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Ciudad Real')">
                                    Ciudad Real
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Ciudad',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Cuenca',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Cuenca')">
                                    Cuenca
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Cuenca',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Guadalajara',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Guadalajara')">
                                    Guadalajara
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Guadalajara',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Toledo',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Toledo')">
                                    Toledo
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Toledo',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Cataluña</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Barcelona',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Barcelona')">
                                    Barcelona
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Barcelona',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Girona',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Girona')">
                                    Girona
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Girona',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Lleida',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Lleida')">
                                    Lleida
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Lleida',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Tarragona',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Tarragona')">
                                    Tarragona
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Tarragona',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Extremadura</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Badajoz',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Badajoz')">
                                    Badajoz
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Badajoz',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Cáceres',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Cáceres')">
                                    Cáceres
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Cáceres',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Galicia</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('A Coruña',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('A Coruña')">
                                    A Coruña
                                    <span class="material-symbols-outlined text-red-400">{{in_array('A Coruña',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Lugo',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Lugo')">
                                    Lugo
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Lugo',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Ourense',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Ourense')">
                                    Ourense
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Ourense',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Pontevedra',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Pontevedra')">
                                    Pontevedra
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Pontevedra',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Madrid</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Madrid',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Madrid')">
                                    Madrid
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Madrid',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Murcia</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Murcia',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Murcia')">
                                    Murcia
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Murcia',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Navarra</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Navarra',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Navarra')">
                                    Navarra
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Navarra',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">País Vasco</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Álava',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Álava')">
                                    Álava
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Álava',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Gipuzkoa',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Gipuzkoa')">
                                    Gipuzkoa
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Gipuzkoa',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Bizkaia',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Bizkaia')">
                                    Bizkaia
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Bizkaia',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">La Rioja</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('La Rioja',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('La Rioja')">
                                    La Rioja
                                    <span class="material-symbols-outlined text-red-400">{{in_array('La Rioja',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Comunidad Valenciana</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Alicante',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Alicante')">
                                    Alicante
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Alicante',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Castellón',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Castellón')">
                                    Castellón
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Castellón',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Valencia',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Valencia')">
                                    Valencia
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Valencia',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>

                            <p style="font-family: Righteous">Ceuta y Melilla</p>
                            <div class="pb-3 pl-4">
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Ceuta',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Ceuta')">
                                    Ceuta
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Ceuta',$province) ? 'check' : ''}}</span>
                                </p>
                                <p class="cursor-pointer flex items-center gap-2 {{in_array('Melilla',$province) ? 'text-red-400' : ''}}" wire:click="setProvinceFilter('Melilla')">
                                    Melilla
                                    <span class="material-symbols-outlined text-red-400">{{in_array('Melilla',$province) ? 'check' : ''}}</span>
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
                <span wire:click="$set('province',[])" class="text-base material-symbols-outlined text-red-400 ml-2 hover:text-black transition-all cursor-pointer">close</span>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3 order-1 lg:order-none" id="montana">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'montana'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Montaña</b></span>
                    <img src="{{asset('vectors/montaña.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0">
                    @foreach ($montanas as $montana)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="montana-{{$montana->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$montana->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->code}}','{{asset('storage/'.$montana->code.'/'.$i.'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$montana->nombre}}</p>
                                    <p class="text-base">{{$montana->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($montana->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($montana->tripadvisor && $montana->tripadvisor!='')
                                        <a href="{{$montana->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($montana->web && $montana->web!='')
                                        <a href="{{$montana->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $montanas->links() }}
                </div>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3" id="playa">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'playa'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Playa</b></span>
                    <img src="{{asset('vectors/playa.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0">
                    @foreach ($playas as $playa)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="playa-{{$playa->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$playa->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->code}}','{{asset('storage/'.$playa->code.'/'.$i.'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div style="font-family: Righteous">
                                    <p class="text-xl font-bold cursor-pointer">{{$playa->nombre}}</p>
                                    <p class="">{{$playa->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($playa->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($playa->tripadvisor && $playa->tripadvisor!='')
                                        <a href="{{$playa->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($playa->web && $playa->web!='')
                                        <a href="{{$playa->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $playas->links() }}
                </div>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3" id="relax">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'relax'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve el <b class="text-2xl">Relax</b></span>
                    <img src="{{asset('vectors/relax.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0">
                    @foreach ($relaxs as $relax)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="relax-{{$relax->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$relax->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->code}}','{{asset('storage/'.$relax->code.'/'.$i.'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$relax->nombre}}</p>
                                    <p class="text-base">{{$relax->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($relax->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($relax->tripadvisor && $relax->tripadvisor!='')
                                        <a href="{{$relax->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($relax->web && $relax->web!='')
                                        <a href="{{$relax->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $relaxs->links() }}
                </div>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3" id="fiesta">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'fiesta'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Fiesta</b></span>
                    <img src="{{asset('vectors/fiesta.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0 ">
                    @foreach ($fiestas as $fiesta)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="fiesta-{{$fiesta->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$fiesta->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->code}}','{{asset('storage/'.$fiesta->code.'/'.($i).'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$fiesta->nombre}}</p>
                                    <p class="text-base">{{$fiesta->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($fiesta->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($fiesta->tripadvisor && $fiesta->tripadvisor!='')
                                        <a href="{{$fiesta->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($fiesta->web && $fiesta->web!='')
                                        <a href="{{$fiesta->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $fiestas->links() }}
                </div>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3" id="deporte">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'deporte'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous" >
                    <span>porque te mueve el <b class="text-2xl">Deporte</b></span>
                    <img src="{{asset('vectors/deporte.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0">
                    @foreach ($deportes as $deporte)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="deporte-{{$deporte->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$deporte->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->code}}','{{asset('storage/'.$deporte->code.'/'.$i.'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$deporte->nombre}}</p>
                                    <p class="text-base">{{$deporte->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($deporte->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($deporte->tripadvisor && $deporte->tripadvisor!='')
                                        <a href="{{$deporte->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($deporte->web && $deporte->web!='')
                                        <a href="{{$deporte->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $deportes->links() }}
                </div>
            </div>
        </div>
        <div class="lg:p-2 w-full lg:w-1/3" id="familia">
            <div class="flex flex-col gap-4 lg:p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'familia'])}}" class="px-4 pt-4 lg:p-0 text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Familia</b></span>
                    <img src="{{asset('vectors/familia.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full overflow-x-scroll flex lg:flex-col lg:gap-4 px-4 lg:px-0">
                    @foreach ($familias as $familia)
                        <div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all hover:cursor-pointer">
                            <div id="familia-{{$familia->code}}" class="w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$familia->code.'/0.jpg')}}')">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->code}}','{{asset('storage/'.$familia->code.'/'.$i.'.jpg')}}')"></div>                            
                                @endfor
                            </div>
                            <div class="lg:w-1/2 h-36 lg:h-auto p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$familia->nombre}}</p>
                                    <p class="text-base">{{$familia->provincia}}</p>
                                </div>
                                <div class="flex py-1">
                                    @foreach ($familia->servicios as $servicio)
                                        <span class="material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded flex items-center justify-center">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 items-center justify-end w-full">
                                    @if ($familia->tripadvisor && $familia->tripadvisor!='')
                                        <a href="{{$familia->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                                    @endif
                                    @if ($familia->web && $familia->web!='')
                                        <a href="{{$familia->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $familias->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImage(id, url){
            document.getElementById(id).style.backgroundImage = `url(${url})`;
        }
    </script>
</div>
