<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\Image\Image;

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
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->useLogger(Log::channel('optimizeImage'));

        // Ruta base de la carpeta public
        $publicPath = storage_path();

        // Explora recursivamente la carpeta public en busca de imágenes
        $imagePaths = $this->getImagesInFolder($publicPath);

        // Optimiza cada imagen encontrada
        foreach ($imagePaths as $imagePath) {
            $this->resizeAndOptimizeImage($imagePath, $optimizerChain);
        }

        // Registro de finalización
        Log::channel('optimizeImage')->info('Optimización de imágenes finalizada');
    }
    protected function getImagesInFolder($folder)
    {
        $imageExtensions = ['jpg','webp'];

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
    protected function resizeAndOptimizeImage($imagePath, $optimizerChain)
    {
        // Cargar la imagen usando Intervention Image
        $image = Image::load($imagePath);

        // Redimensiona la imagen si es más ancha de 1000px
        if ($image->width() > 950) {
            $image->resize(950, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        // Cambia la extensión a WebP
        $newImagePath = pathinfo($imagePath, PATHINFO_DIRNAME) . '/' . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';
        $image->save($newImagePath, 80, 'webp');

        // Optimiza la imagen usando Spatie Image Optimizer
        // $optimizerChain->optimize($imagePath);
    }
}
