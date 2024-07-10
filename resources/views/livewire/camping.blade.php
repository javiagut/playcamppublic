<div class="w-full flex-col lg:flex-row mt-16 lg:w-5/12 mx-auto lg:min-h-[80vh]">
    <div class="h-[10em] lg:h-[20em] mb-2 shadow">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @for ($i = 0; $i < 5; $i++)
                    <div class="carousel-item {{$i==0 ? 'active' : ''}} h-[10em] lg:h-[20em] bg-center bg-cover" data-bs-interval="3000" style="background-image: url('{{asset('storage/'.$camping->code.'/'.$i.'.webp')}}')">
                    </div>
                @endfor
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class=" py-2 flex flex-col">
        <div class="px-4 flex justify-between">
            <h1 class=" text-2xl font-bold lg:text-3xl" style="font-family: Righteous">{{$camping->nombre}}</h1>
            <div class="flex gap-3">
                @if ($camping->booking)
                    <a href="{{$camping->booking}}" title="Ver página de booking del camping" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/booking.webp')}}" alt="Reservar bungalow o parcela"></a>
                @endif
                @if ($camping->web)
                    <a href="{{$camping->web}}" title="Ver web oficial de reservas,servicios y actividades del camping" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.webp')}}" alt="{{$camping->nombre}}"></a>
                @endif
            </div>
        </div>
        @if ($camping->descripcion)
            <div class="px-4 text-sm my-1">
                {{$camping->descripcion}}
            </div>
        @endif
        @if (count($camping->servicios)>0)
            <h2 class="px-4 text-lg font-bold mt-2" style="font-family: Righteous">Servicios</h2>
            <div class="flex px-4 my-2 w-full flex-wrap gap-2">
                @foreach ($camping->servicios as $servicio)
                    <p class="flex gap-2 mr-2">
                        <span class="material-symbols-rounded text-red-400">{{$servicioTipo[$servicio->tipo]['icon']}}</span>
                        {{$servicioTipo[$servicio->tipo]['nombre']}}
                    </p>
                    {{-- <span class="material-symbols-outlined min-w-24 min-h-24 mr-2 bg-red-400 text-white rounded" style="font-size: 2.2em !important;">{{$servicioTipo[$servicio->tipo]['icon']}}</span> --}}
                @endforeach
            </div>
        @endif
        @if ($camping->puntuacion)
            <h2 class="px-4 text-lg font-bold mt-2" style="font-family: Righteous">Valoraciones</h2>
            <div class="px-4 flex gap-2 my-2 items-center">
                @if ($camping->booking)
                    <a href="{{$camping->booking}}" target="_blank" class="bg-blue-900 font-bold px-2 py-1 rounded text-white hover:scale-105">booking.com</a>
                @else
                    <span class="bg-rose-400 font-bold px-2 py-1 rounded text-white">Google Maps/Tripadvisor</span>
                @endif
                <span class="font-bold text-xl tracking-wider" style="font-family: Righteous">{{$camping->puntuacion}}/10</span>
            </div>
        @endif
        @if ($camping->email || count($camping->telefono)>0)
            <h2 class="px-4 text-lg font-bold mt-2" style="font-family: Righteous">Contacto</h2>
            <div class="px-4 my-2 flex flex-col gap-2">
                <div class="flex gap-3 items-start">
                    <a href="mailto:{{$camping->email}}" class="material-symbols-outlined text-red-400">email</a>
                    <p>{{$camping->email}}</p>
                </div>
                @foreach ($camping->telefono as $phone)
                    <div class="flex gap-3 items-center">
                        @if ($phone[0]==6 || str_contains($phone,'+346') || str_contains($phone,'634 6'))
                            <a title="Contactar con el camping por whatsapp para reservar bungalow" href="https://wa.me/{{str_replace(' ','',$phone)}}" class="w-6 hover:scale-105"><img src="{{asset('vectors/whatsapp.webp')}}" alt=""></a>
                        @else
                            <a href="tel:{{str_replace(' ','',$phone)}}" class="material-symbols-rounded text-red-400">call</a>
                        @endif
                        <span>{{$phone}}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
