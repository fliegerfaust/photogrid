<?php namespace Service\Api\Controllers;

require_once base_path() . "/plugins/cloudservice/api/dropbox/lib/Dropbox/autoload.php";

use \Dropbox as dbx;
use \Controller;
use \Input;
use \File;
use \Response;
use \Image;
use \Validator;

define ("PIXELS", 900);

class CloudController extends Controller {

	private function generateRandomString() 
	{
		return str_random(4) .'-'. str_random(4);
	}

	public function generateId() 
	{
		$filteredParams = $_REQUEST['photoSessionParams'];
		$geoArea = $filteredParams['geoArea'];
		$photoBoxId = $filteredParams['photoBoxId'];

		$photosessionId = $geoArea . $photoBoxId .'-'. $this->generateRandomString();

		$path = base_path() . '/uploads/public/photos/' . $photosessionId;
		while (file_exists($path)) {
			$photosessionId = $geoArea . $photoBoxId .'-'. $this->generateRandomString();
			$path = base_path() . '/uploads/public/photos/' . $photosessionId;
		}

		return Response::json(array(
	    	'error' => false,
	    	'code' => '200',
	    	'photosession_id' => $photosessionId
	    	)
	    );

	}

	public function recievePhotos()
	{
		$accessToken = "some access token";
		$dbxClient = new dbx\Client($accessToken, "PHP-Example/1.0");
		// return $dbxClient->getAccountInfo();

		$path = base_path() . '/uploads/public/photos/';
		// проверим существование конечной папки для фотосессий
		if (!file_exists($path)) {
			mkdir($path);
		}

		// для отресайзенных фотографий
		$photosessionDirPath = $path . '/' . Input::get('photosession_id');
		// для оригиналов
		$sizeOriginalDirPath = $path . '/(original)' . Input::get('photosession_id');
		// Если нет папки с id фотосессии, то создадим
		if (!file_exists($photosessionDirPath)) {
			mkdir($photosessionDirPath);
			mkdir($sizeOriginalDirPath);
		}

		// Начинаем процесс загрузки фотографий на сервер
		try {		
			$photos = Input::file('photos');
			// Если был один файл, то делаем его массивом
			if (!is_array($photos)) {
				$photos = array(Input::file('photos'));
			}
			foreach ($photos as $photo) {
				// Каждое изображение проходит валидацию
				$rules = array(
					'photo' => 'required|mimes:png,gif,jpeg,jpg,bmp'
				);
				$validator = \Validator::make(array('photo'=> $photo), $rules);
				// Если изображение прошло валидацию
				if ($validator->passes()) {
					// То оригинал мы помещаем в соответствующую папку
					$photoName = $photo->getClientOriginalName();
					// Если такой файл уже существует
					if (File::exists($sizeOriginalDirPath . '/'. $photoName)) {
						$photoName = 'copy-' . $photoName;
					}
					$photo->move($sizeOriginalDirPath, $photoName);
					// Загрузка оригинала в Dropbox облако
					// return $sizeOriginalDirPath . "/" . $photoName;
					$f = fopen($sizeOriginalDirPath . "/" .$photoName, "rb");
					$fileMetadata = $dbxClient->uploadFile("/" . $photoName, dbx\WriteMode::add(), $f);
					fclose($f);

					// Ресайзим оригинал по заданному правилу и помещаем в другую папку
					$img = Image::make($sizeOriginalDirPath .'/'. $photoName);
					if ($img->width() > $img->height()) {
						$img->resize(PIXELS, null, function($constraint) {
							$constraint->aspectRatio();
						});
					} else {
						$img->resize(NULL, PIXELS, function($constraint) {
							$constraint->aspectRatio();
						});
					}
					// Сохраняем в папку с отресайзенными фотками
					$img->save($photosessionDirPath .'/'. $photoName);
					// загрузка ресайз фото в Dropbox облако
					$f = fopen($photosessionDirPath . $photoName, "rb");
					$fileMetadata = $dbxClient->uploadFile("/" . $photoName, dbx\WriteMode::add(), $f);
					fclose($f);
				} else {
					return Response::json(array(
						'error' => true,
						'code' => '404',
						'message' => 'Bad Request: Server accepts only images!'
					));						
				}
			}
		} catch (Exception $e) {			
			return Response::json(array(
				'error' => true,
				'code' => '500',
				'message' => 'Internal server error'
			));
		}

		return Response::json(array(
	    	'error' => false,
	    	'code' => '200',
	    	'message' => 'Successfully uploaded!',
	    	'photosession_id' => Input::get('photosession_id'))
	    );
	}

}
