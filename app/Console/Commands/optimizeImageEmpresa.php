<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class optimizeImageEmpresa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize-image-empresa';

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
        // Crea la cadena de optimización
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->useLogger(Log::channel('optimizeImage'));

        // Ruta base de la carpeta public
        $publicPath = public_path();

        // Explora recursivamente la carpeta public en busca de imágenes
        $imagePaths = $this->getImagesInFolder($publicPath);

        // Optimiza cada imagen encontrada
        foreach ($imagePaths as $imagePath) {
            $optimizerChain->optimize($imagePath);
        }

        // Registro de finalización
        Log::channel('optimizeImage')->info('Optimización de imágenes finalizada');
    }
    protected function getImagesInFolder($folder)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        $imagePaths = [];

        // Explora el directorio y sus subdirectorios
        $files = File::allFiles($folder);

        foreach ($files as $file) {
            $extension = $file->getExtension();

            // Comprueba si el archivo es una imagen
            if (in_array(strtolower($extension), $imageExtensions)) {
                $imagePaths[] = $file->getPathname();
            }
        }

        return $imagePaths;
    }
}
