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
        <h1 class="px-4 text-2xl font-bold lg:text-3xl" style="font-family: Righteous">{{$camping->nombre}}</h1>
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
                <img class="w-10" src="{{asset('img/booking.webp')}}" alt="">
                <span class="font-bold text-xl tracking-wider	" style="font-family: Righteous">{{$camping->puntuacion}}/10</span>
            </div>
        @endif
    </div>
</div>
