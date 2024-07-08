<div class="w-full p-4 flex">
    @if (!$valid)
        <div class="lg:w-3/12 mx-auto p-4 flex justify-center items-center flex-col gap-4">
            <p class="text-3xl" style="font-family: Righteous">Introducir código</p>
            <input type="password" wire:keydown.enter="isValid()" wire:model="code" class="px-4 py-2 outline-none rounded bg-red-400 text-white shadow mx-auto">
        </div>
    @else
        <div class="w-3/12 my-8 flex flex-col items-center">
            <p class="text-2xl font-bold mb-4 w-full text-center" style="font-family: Righteous">Buscar empresa ({{count($empresasAll)}})</p>
            <div class="bg-white flex items-center px-2 rounded shadow-lg justify-between mb-4">
                <span class="material-symbols-outlined text-red-400">search</span>
                <input type="text" wire:model.live.debounce.250ms="search" placeholder="Buscar por Nombre" class="w-full lg:w-56 py-1 px-2 outline-none">
                <span wire:click="$set('search','')" class="text-base material-symbols-outlined text-red-400 ml-2 hover:text-black transition-all cursor-pointer">close</span>
            </div>
            <div class="flex flex-col gap-2 w-full items-center">
                @foreach ($empresasAll as $item)
                    <div class="flex gap-2">
                        <p class="cursor-pointer hover:text-red-400 {{$empresa['code']==$item->code ? 'text-red-400' : ''}}" wire:click="cargarEmpresa('{{$item->id}}')">{{$item->nombre}}</p>
                        @if ($item->puntuacion)
                            <div class="h-7 w-fit px-2 text-white rounded-r-lg rounded-tl-lg p-1  flex items-center justify-center" style="background: #00367F">
                                <span class=" font-bold flex flex-col">
                                    <span class="text-sm">{{$item->puntuacion}}</span>
                                </span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-6/12">
            <p class="w-full my-4 font-bold text-3xl text-center flex justify-center items-center" style="font-family: Righteous">
                @if ($edit)
                    Modificar
                @else
                    Crar nueva 
                @endif
                    empresa
                <span class="ml-2 material-symbols-rounded cursor-pointer hover:text-red-400" wire:click="resetForm()">close</span></p>
            <form wire:submit.prevent="{{$edit ? 'guardarEmpresa' :'añadirEmpresa'}}" class="w-full lg:w-9/12 mx-auto bg-white rounded shadow  p-4 flex flex-wrap justify-around">
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Nombre</p>
                    <p class="w-full text-red-400 font-bold">Provincia</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model="empresa.nombre" type="text" class="px-3 py-1 outline-none w-full border shadow">
                    <x-province defer="empresa.provincia" class="px-3 py-1 w-full border shadow"></x-province>
                </div>
                @error('empresa.nombre') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
                @error('empresa.provincia') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Servicios</p>
                </div>
                <div class="w-full flex gap-2 mb-4 flex-wrap py-2">
                    @foreach ($servicioTipo as $tipo)
                        <p class="{{in_array($tipo->id, $servicios) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="servicio('{{$tipo->id}}')">{{$tipo->nombre}}</p>
                    @endforeach
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Etiquetas</p>
                </div>
                <div class="w-full flex gap-2 mb-4 flex-wrap py-2">
                    <p class="{{in_array('montana', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('montana')">montana</p>
                    <p class="{{in_array('playa', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('playa')">playa</p>
                    <p class="{{in_array('relax', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('relax')">relax</p>
                    <p class="{{in_array('fiesta', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('fiesta')">fiesta</p>
                    <p class="{{in_array('deporte', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('deporte')">deporte</p>
                    <p class="{{in_array('familia', $empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('familia')">familia</p>
                </div>
                @error('empresa.etiquetas') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Dirección</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="empresa.direccion" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Email</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="empresa.email" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                @error('empresa.email') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Teléfonos <small>separados por comas</small></p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="phones" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Web de la empresa</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="empresa.web" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Booking</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="empresa.booking" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">Valoración Booking</p>
                </div>
                <div class="w-full flex gap-2 mb-4">
                    <input wire:model.defer="empresa.puntuacion" type="text" class="px-3 py-1 outline-none w-full border shadow">
                </div>
                <div class="w-full flex gap-2">
                    <p class="w-full text-red-400 font-bold">5 Fotos</p>
                </div>
                @if ($edit)
                    <table>
                        <tr>
                            @for ($i = 0; $i < 5; $i++)
                                <td class="w-1/5 px-2"><img src="{{asset('storage/'.$empresa['code'].'/'.$i.'.webp')}}"></td>
                            @endfor
                        </tr>
                        <tr>
                            @for ($i = 0; $i < 5; $i++)
                            <td class="w-1/5 px-2"><input type="file" wire:model="files[{{$i}}]" class="px-3 py-1 outline-none w-full border shadow" multiple></td>
                            @endfor
                        </tr>
                        @if (count($files)>0)
                            <tr>
                                @for ($i = 0; $i < 5; $i++)
                                    <td class="w-1/5 px-2"><img src="{{$files[$i]->temporaryUrl()}}"></td>
                                @endfor
                            </tr>
                            
                        @endif
                    </table>
                @else
                    <div class="w-full flex flex-col gap-2 mb-4"
                        x-data="{ isUploading: false, progress: 5 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <input wire:model="files" type="file" class="px-3 py-1 outline-none w-full border shadow" multiple>
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress" class="w-full"></progress>
                        </div>
                    </div>
                    @error('files') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
                    @if ($files && count($files)==5)
                        <div class="flex justify-around w-full">
                            @foreach ($files as $file)
                                @if ($file->getMimeType() != 'image/avif')
                                    <img class="px-2 w-1/5" src="{{ $file->temporaryUrl() }}">
                                @else
                                    <div class="border px-2 w-1/5 flex justify-center items-center">{{$file->getClientOriginalName()}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endif
                <button type="submit" class="transition-all px-4 py-1 rounded bg-red-400 border border-red-400 hover:bg-white hover:text-red-400 text-white w-full mt-8">
                    @if ($edit)
                        Guardar
                    @else
                        Crear
                    @endif
                </button>
                </div>
            </form>
        </div>
        
    @endif
</div>
