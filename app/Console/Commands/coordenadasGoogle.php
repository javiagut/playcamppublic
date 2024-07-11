<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;

class coordenadasGoogle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:coordenadas-google';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        print($apiKey);
        // URL de la API de Geocoding de Google
        $url = "https://maps.googleapis.com/maps/api/geocode/json";

        $empresas = Empresa::all();

        foreach ($empresas as $empresa) {
            if (!$empresa->latitud || $empresa->latitud=='' || !$empresa->longitud || $empresa->longitud=='') {
                // Realizar la solicitud a la API de Google
                $response = Http::get($url,[
                    'address' => $empresa->nombre . ', ' . $empresa->provincia,
                    'key' => $apiKey
                ]);
    
                // Obtener el cuerpo de la respuesta
                $body = $response->getBody();
                $data = json_decode($body, true);
    
                if ($data['status'] === 'OK') {
                    $coordenadas = $data['results'][0]['geometry']['location'];
                    $empresa->latitud = $coordenadas['lat'];
                    $empresa->longitud = $coordenadas['lng'];
                    $empresa->save();
                    print("Empresa: " . $empresa->nombre . " - Latitud: " . $empresa->latitud . " - Longitud: " . $empresa->longitud . "\n");
                }else{
                    print("Error al obtener las coordenadas de la empresa: " . $empresa->nombre . "\n");
                    Log::error("Error al obtener las coordenadas de la empresa: " . $empresa->nombre. "\n". $data);
                }
            }
        }
    }
}
