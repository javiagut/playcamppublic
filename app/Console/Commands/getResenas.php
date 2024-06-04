<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;

class getResenas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-resenas';

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
        $empresas = Empresa::get();
        foreach ($empresas as $empresa) {
            if ($empresa->booking && $empresa->booking != '') {
                $client = new HttpBrowser(HttpClient::create());
                try {
                    $crawler = $client->request('GET', $empresa->booking);
    
                    $element = $crawler->filter('[data-testid="review-score-right-component"] > div > div');
                    if ($element){
                        $text = $element->text();
                        if (count(explode(':',$text)) > 1){
                            $empresa->update(['puntuacion' => trim(explode(':',$text)[1])]);
                        }
                    }
                } catch (\Throwable $th) {
                    Log::error('Error al obtener la puntuación de la empresa: '.$empresa->nombre.' - '.$empresa->booking);
                    continue;
                }
            }
        }
        echo 'Reseñas actualizadas correctamente.';
    }
}
