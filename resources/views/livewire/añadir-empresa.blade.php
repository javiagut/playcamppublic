<div class="w-full p-4">
    @if (!$valid)
        <div class="lg:w-3/12 mx-auto p-4 flex justify-center items-center flex-col gap-4">
            <p class="text-3xl" style="font-family: Righteous">Introducir código</p>
            <input type="text" wire:keydown.enter="isValid()" wire:model="code" class="px-4 py-2 outline-none rounded bg-red-400 text-white shadow mx-auto">
        </div>
    @else
        <p class="w-full my-4 font-bold text-3xl text-center" style="font-family: Righteous">Añadir nueva empresa</p>
        <form wire:submit.prevent="añadirEmpresa" class="w-full lg:w-4/12 mx-auto bg-white rounded shadow  p-4 flex flex-wrap justify-around">
            <div class="w-full flex gap-2">
                <p class="w-full text-red-400 font-bold">Nombre</p>
                <p class="w-full text-red-400 font-bold">Provincia</p>
            </div>
            <div class="w-full flex gap-2 mb-4">
                <input wire:model.defer="empresa.nombre" type="text" class="px-3 py-1 outline-none w-full border shadow">
                <select wire:model.defer="empresa.provincia" class="px-3 py-1 outline-none w-full border shadow">
                    <option value=""></option>
                    <optgroup label="Andalucía">
                        <option value="Almería">Almería</option>
                        <option value="Cádiz">Cádiz</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Granada">Granada</option>
                        <option value="Huelva">Huelva</option>
                        <option value="Jaén">Jaén</option>
                        <option value="Málaga">Málaga</option>
                        <option value="Sevilla">Sevilla</option>
                    </optgroup>
                    <optgroup label="Aragón">
                        <option value="Huesca">Huesca</option>
                        <option value="Teruel">Teruel</option>
                        <option value="Zaragoza">Zaragoza</option>
                    </optgroup>
                    <optgroup label="Asturias">
                        <option value="Asturias">Asturias</option>
                    </optgroup>
                    <optgroup label="Baleares">
                        <option value="Islas Baleares">Islas Baleares</option>
                    </optgroup>
                    <optgroup label="Canarias">
                        <option value="Las Palmas">Las Palmas</option>
                        <option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
                    </optgroup>
                    <optgroup label="Cantabria">
                        <option value="Cantabria">Cantabria</option>
                    </optgroup>
                    <optgroup label="Castilla y León">
                        <option value="Ávila">Ávila</option>
                        <option value="Burgos">Burgos</option>
                        <option value="León">León</option>
                        <option value="Palencia">Palencia</option>
                        <option value="Salamanca">Salamanca</option>
                        <option value="Segovia">Segovia</option>
                        <option value="Soria">Soria</option>
                        <option value="Valladolid">Valladolid</option>
                        <option value="Zamora">Zamora</option>
                    </optgroup>
                    <optgroup label="Castilla-La Mancha">
                        <option value="Albacete">Albacete</option>
                        <option value="Ciudad Real">Ciudad Real</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Toledo">Toledo</option>
                    </optgroup>
                    <optgroup label="Cataluña">
                        <option value="Barcelona">Barcelona</option>
                        <option value="Girona">Girona</option>
                        <option value="Lleida">Lleida</option>
                        <option value="Tarragona">Tarragona</option>
                    </optgroup>
                    <optgroup label="Extremadura">
                        <option value="Badajoz">Badajoz</option>
                        <option value="Cáceres">Cáceres</option>
                    </optgroup>
                    <optgroup label="Galicia">
                        <option value="A Coruña">A Coruña</option>
                        <option value="Lugo">Lugo</option>
                        <option value="Ourense">Ourense</option>
                        <option value="Pontevedra">Pontevedra</option>
                    </optgroup>
                    <optgroup label="Madrid">
                        <option value="Madrid">Madrid</option>
                    </optgroup>
                    <optgroup label="Murcia">
                        <option value="Murcia">Murcia</option>
                    </optgroup>
                    <optgroup label="Navarra">
                        <option value="Navarra">Navarra</option>
                    </optgroup>
                    <optgroup label="País Vasco">
                        <option value="Álava">Álava</option>
                        <option value="Gipuzkoa">Gipuzkoa</option>
                        <option value="Bizkaia">Bizkaia</option>
                    </optgroup>
                    <optgroup label="La Rioja">
                        <option value="La Rioja">La Rioja</option>
                    </optgroup>
                    <optgroup label="Comunidad Valenciana">
                        <option value="Alicante">Alicante</option>
                        <option value="Castellón">Castellón</option>
                        <option value="Valencia">Valencia</option>
                    </optgroup>
                    <optgroup label="Ceuta y Melilla">
                        <option value="Ceuta">Ceuta</option>
                        <option value="Melilla">Melilla</option>
                    </optgroup>
                </select>
            </div>
            @error('empresa.nombre') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
            @error('empresa.provincia') <span class="error text-xs text-red-400">{{ $message }}</span> @enderror
            <div class="w-full flex gap-2">
                <p class="w-full text-red-400 font-bold">Etiquetas</p>
            </div>
            <div class="w-full flex gap-2 mb-4 flex-wrap py-2">
                <p class="{{in_array('montana', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('montana')">montana</p>
                <p class="{{in_array('playa', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('playa')">playa</p>
                <p class="{{in_array('relax', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('relax')">relax</p>
                <p class="{{in_array('fiesta', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('fiesta')">fiesta</p>
                <p class="{{in_array('deporte', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('deporte')">deporte</p>
                <p class="{{in_array('familia', $this->empresa['etiquetas']) ? 'bg-red-400 text-white' : 'border  text-red-400 hover:bg-red-400 hover:text-white'}} border border-red-400 transition-all py-1 px-2 text-xs rounded cursor-pointer" wire:click="etiqueta('familia')">familia</p>
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
                <p class="w-full text-red-400 font-bold">Tripadvisor</p>
            </div>
            <div class="w-full flex gap-2 mb-4">
                <input wire:model.defer="empresa.tripadvisor" type="text" class="px-3 py-1 outline-none w-full border shadow">
            </div>
            <div class="w-full flex gap-2">
                <p class="w-full text-red-400 font-bold">5 Fotos</p>
            </div>
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
                        <img class="px-2 w-1/5" src="{{ $file->temporaryUrl() }}">
                    @endforeach
                </div>
            @endif
            <button type="submit" class="px-4 py-1 rounded bg-red-400 border border-red-400 hover:bg-white hover:text-red-400 text-white w-full mt-8">Añadir</button>
            </div>
        </form>
    @endif
</div>
