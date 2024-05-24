<div class="w-full flex-col gap-4 px-4 pb-4">
    <div class="w-full flex lg:flex-row flex-col pb-4 lg:flex-wrap">
        <div class="p-2 w-full lg:w-1/3">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'montana'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Montaña</b></span>
                    <img src="{{asset('vectors/montaña.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4">
                    @foreach ($montanas as $montana)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="montana-{{$montana->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('montana-{{$montana->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$montana->nombre}}</p>
                                    <p class="text-base">{{$montana->provincia}}</p>
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
                </div>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3 -order-1 lg:order-none">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'playa'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Playa</b></span>
                    <img src="{{asset('vectors/playa.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4 ">
                    @foreach ($playas as $playa)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="playa-{{$playa->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('playa-{{$playa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$playa->nombre}}</p>
                                    <p class="text-base">{{$playa->provincia}}</p>
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
                </div>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'relax'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve el <b class="text-2xl">Relax</b></span>
                    <img src="{{asset('vectors/relax.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4 ">
                    @foreach ($relaxs as $relax)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="relax-{{$relax->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('relax-{{$relax->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$relax->nombre}}</p>
                                    <p class="text-base">{{$relax->provincia}}</p>
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
                </div>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'fiesta'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Fiesta</b></span>
                    <img src="{{asset('vectors/fiesta.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4 ">
                    @foreach ($fiestas as $fiesta)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="fiesta-{{$fiesta->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('fiesta-{{$fiesta->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$fiesta->nombre}}</p>
                                    <p class="text-base">{{$fiesta->provincia}}</p>
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
                </div>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'deporte'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous" >
                    <span>porque te mueve el <b class="text-2xl">Deporte</b></span>
                    <img src="{{asset('vectors/deporte.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4 ">
                    @foreach ($deportes as $deporte)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="deporte-{{$deporte->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('deporte-{{$deporte->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$deporte->nombre}}</p>
                                    <p class="text-base">{{$deporte->provincia}}</p>
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
                </div>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="flex flex-col gap-4 p-2 w-full">
                <a href="{{route('tipo',['tipo' => 'familia'])}}" class="text-xl flex items-end gap-2" style="font-family: Righteous">
                    <span>porque te mueve la <b class="text-2xl">Familia</b></span>
                    <img src="{{asset('vectors/familia.png')}}" alt="" class="h-12">
                </a>
                <div class="w-full flex flex-col gap-4 ">
                    @foreach ($familias as $familia)
                        <div class="w-full flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
                            <div id="familia-{{$familia->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                                <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                                <div class="w-1/5" onmouseover="changeImage('familia-{{$familia->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
                            </div>
                            <div class="w-1/2 p-2 grid content-between">
                                <div>
                                    <p class="text-xl font-bold cursor-pointer">{{$familia->nombre}}</p>
                                    <p class="text-base">{{$familia->provincia}}</p>
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
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 border rounded w-ful min-h-36 bg-white shadow-lg flex items-center justify-center">
        PUBLICIDAD
    </div>
    <script>
        function changeImage(id, url){
            document.getElementById(id).style.backgroundImage = `url(${url})`;
        }
    </script>
</div>
