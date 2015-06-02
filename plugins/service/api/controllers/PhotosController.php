<?php namespace Service\Api\Controllers;

use \File;
use \View;
use \Redirect;

class PhotosController extends \Controller {

	public function givePhotos($photosessionId)
	{
		$photosessionDirPath = base_path() . 'uploads/public/photos/' . $photosessionId;

		// если нет такой папки, то перенаправим пользователя на страницу 
		// ввода id фотосессии и скажем ему об этом

		// TODO: страница нуждается в оформлении!
		if (!File::exists($photosessionDirPath)) {
			return Redirect::to('/')->withErrors('Фотографий для такого id нет!');
		}

		// берём фотографии из нужной папки
		// и отдаём URL'ы абсолютного вида
		$result = array();
		$photos = File::Files($photosessionDirPath);
		foreach ($photos as $photo) {
			$photoPath = (string)$photo;
			array_push($result, $photoPath);
		}

		// TODO: необходима страница, куда будут выводится фотографии!
		return View::make('photogallery', array('photos' => $result));
	}

}
