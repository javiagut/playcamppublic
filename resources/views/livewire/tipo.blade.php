<div class="p-4 flex flex-col gap-4">
    <div class="w-full p-4 flex flex-wrap">
        @foreach ($empresas as $empresa)
        <div class="w-1/3 flex bg-white rounded min-h-40 shadow-lg  hover:shadow-2xl transition-all hover:cursor-pointer">
            <div id="empresa-{{$empresa->id}}" class="w-1/2 bg-center bg-cover flex" style="background-image: url('https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')">
                <div class="w-1/5" onmouseover="changeImage('empresa-{{$empresa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/01.jpg')"></div>                            
                <div class="w-1/5" onmouseover="changeImage('empresa-{{$empresa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/02.jpg')"></div>                            
                <div class="w-1/5" onmouseover="changeImage('empresa-{{$empresa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/03.jpg')"></div>                            
                <div class="w-1/5" onmouseover="changeImage('empresa-{{$empresa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/04.jpg')"></div>                            
                <div class="w-1/5" onmouseover="changeImage('empresa-{{$empresa->id}}','https://www.capfun.es/photo/DURAVEL/Web/moyennes/05.jpg')"></div>                            
            </div>
            <div class="w-1/2 p-2 grid content-between">
                <div>
                    <p class="text-xl font-bold cursor-pointer">{{$empresa->nombre}}</p>
                    <p class="text-base">{{$empresa->provincia}}</p>
                </div>
                <div class="flex gap-2 items-center justify-end w-full">
                    @if ($empresa->tripadvisor && $empresa->tripadvisor!='')
                        <a href="{{$empresa->tripadvisor}}" target="_blank" class="w-10 hover:scale-105"><img src="{{asset('img/tripadvisor.png')}}" alt=""></a>
                    @endif
                    @if ($empresa->web && $empresa->web!='')
                        <a href="{{$empresa->web}}" target="_blank" class="w-8 hover:scale-105"><img src="{{asset('img/web.png')}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        function changeImage(id, url){
            document.getElementById(id).style.backgroundImage = `url(${url})`;
        }
    </script>
</div>
