<div class="mr-4 lg:mr-0 min-w-[80vw] max-w-[80vw] lg:min-w-full lg:max-w-full  lg:w-full flex flex-col lg:flex-row bg-white rounded-lg min-h-40 shadow  hover:shadow-red-200 transition-all">
    <div id="{{$key}}-{{$empresa->code}}" onmouseleave="changeImage('{{$key}}-{{$empresa->code}}','0','{{$empresa->code}}','{{asset('storage/'.$empresa->code.'/0.webp')}}')" class="p-2 w-full h-40 lg:h-auto lg:w-1/2 bg-center bg-cover flex rounded-t-lg lg:rounded-tr-none lg:rounded-l-lg" style="background-image: url('{{asset('storage/'.$empresa->code.'/0.webp')}}')">
        @for ($i = 0; $i < 5; $i++)
            <div class="w-1/5 flex items-end justify-center pb-2" onmouseover="changeImage('{{$key}}-{{$empresa->code}}','{{$i}}','{{$empresa->code}}','{{asset('storage/'.$empresa->code.'/'.$i.'.webp')}}')">
                <span id="btn-bg-{{$i}}-{{$empresa->code}}" class="shadow opacity-50 lg:hidden rounded-full p-1" style="background-color: white"></span>
            </div>
        @endfor
        @if ($empresa->puntuacion)
            <div class="h-10 min-w-8 w-fit px-2 text-white rounded-r-lg rounded-tl-lg p-1  flex items-center justify-center" style="background: #00367F">
                <span class=" font-bold flex flex-col">
                    <span class="text-xl">{{$empresa->puntuacion}}</span>
                </span>
            </div>
        @endif
    </div>
    <div class="lg:w-1/2 h-44 lg:h-auto p-2 grid content-between">
        <div style="font-family: Righteous">
            <p class="pl-1 text-xl font-bold cursor-pointer">{{$empresa->nombre}}</p>
            <p class="pl-1 text-base">{{$empresa->provincia}}</p>
        </div>
        <div class="flex py-1 gap-2 lg:gap-0">
            @foreach ($empresa->servicios as $servicio)
                <span class="mr-2 lg:mr-0 material-symbols-outlined w-6 h-6 lg:w-8 lg:h-8 roudned text-red-400 hover:bg-red-400 hover:text-white transition-all rounded">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
            @endforeach
        </div>
        <p class="text-sm px-1 pt-1 flex items-center" style="font-family:Righteous">Más info<span class="ml-1 material-symbols-rounded">keyboard_arrow_down</span></p>
        <div class="px-1 flex gap-2 items-center justify-between w-full">
            <div class="flex gap-2 items-center justify-start w-full">
                @if ($empresa->email && $empresa->email!='')
                    <a href="mailto:{{$empresa->email}}" class="material-symbols-outlined">email</a>
                @endif
                @if ($empresa->telefono && count($empresa->telefono)>0)
                    @for ($i = 0; $i < 3; $i++)
                        @if (isset($empresa->telefono[$i]))
                            @if ($empresa->telefono[$i][0]==6 || str_contains($empresa->telefono[$i],'+346') || str_contains($empresa->telefono[$i],'634 6'))
                                <a title="Contactar con el camping por whatsapp para reservar bungalow" href="https://wa.me/{{str_replace(' ','',$empresa->telefono[$i])}}" class="w-8 hover:scale-105"><img src="{{asset('vectors/whatsapp.webp')}}" alt=""></a>
                            @else
                                <a href="tel:{{str_replace(' ','',$empresa->telefono[$i])}}" class="material-symbols-rounded">call</a>
                            @endif
                        @endif
                    @endfor
                @endif
            </div>
            <div class="flex gap-2 items-center justify-end w-full">
                @if ($empresa->booking && $empresa->booking!='')
                    <a href="{{$empresa->booking}}" title="Ver página de booking del camping" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/booking.webp')}}" alt="Reservar bungalow o parcela"></a>
                @endif
                @if ($empresa->web && $empresa->web!='')
                    <a href="{{$empresa->web}}" title="Ver web oficial de reservas,servicios y actividades del camping" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.webp')}}" alt="{{$empresa->nombre}}"></a>
                @endif
            </div>
        </div>
    </div>
</div>