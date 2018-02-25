<?php

namespace App\Listeners;

use App\Image;
use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\ImageManagerStatic as Manager;

class ExtractingPostImage
{
	/**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
	}
	
    /**
     * Handle the event.
     *
     * @param  PostScraping $event
     * @return void
     */
    public function handle(PostScraping $event)
    {
		$data = Crawler::extracting($event->post->url, $event->post->xpath->image);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}
		
		$src = Url::normalize($data->text(), $event->post->newspaper->website);
		$hash = md5_file($src);
		$file = $hash.'.jpg';
		$dir = public_path('/uploads/images/');
		$path = $dir.$file;

		// Obtenemos la imagen desde la base de datos
		$image = Image::where('hash', $hash)->first();

		// Si no existe, crearlas
		if ($image === null) {
			// Guardar la imagen en el servidor
			$manager = Manager::make($src)->save($path);

			// Guardar en la base de datos
			$image = new Image();
			$image->file = $file;
			$image->width = $manager->width();
			$image->height = $manager->height();
			$image->hash = $hash;
			$image->save();
        }

        $post = \App\Post::where('url_hash', $event->post->url_hash)->update(['image_id' => $image->id]);

		var_dump($image->file);
        var_dump('------');
    }
}