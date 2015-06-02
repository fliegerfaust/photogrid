<?php

use \Input;
use \Request;
use Illuminate\Foundation\AliasLoader;

App::register('Illuminate\Auth\AuthServiceProvider');

AliasLoader::getInstance([
    'Auth' => 'Illuminate\Support\Facades\Auth',
    'Carbon' => 'Carbon\Carbon'
]);

Config::set('auth.model', 'Cloudservice\Api\Models\ApiUser');
Config::set('auth.driver', 'Eloquent');

define("MINUTES", 60);


/**
 * ФИЛЬТРЫ
 * Ниже описаны все фильтры, используемые для роутов API.
 */

// фильтр Token Based авторизации
use Service\Api\Models\ApiToken;
Route::filter('auth.token', function()
{
	$authenticated = false;

	if ($payload = Request::header('X-Auth-Token')) 
	{
		$token = ApiToken::valid()->where('token', $payload)
											->where('client', Request::getClientIp())
											->first();
		if ($token) 
		{
			$authenticated = true;
		}
	}

	if (!$authenticated) 
	{
		return Response::json(array(
			'error' => true,
			'code' => '401',
			'message' => 'Not authenticated!'
		));
	}
	
});

// фильтр для проверки данных фотосессии на валидность
Route::filter('photosession-id-filter', function(){
	$geoArea = Input::get('geo_area');
	$photoBoxId = Input::get('photobox_id');
	// dd($geoArea);
	// dd($photoBoxId);

  	if (preg_match("/^\d\d\d?$/", $geoArea) == 0) {
		return Response::json(array(
			'error' => true,
			'code' => '400',
			'message' => "Bad request: parameter geo_area is incorrect! " . $geoArea
		));	  		
  	}

  	if (preg_match("/^\d\d\d?$/", $photoBoxId) == 0) {
		return Response::json(array(
			'error' => true,
			'code' => '400',
			'message' => "Bad request: parameter photobox_id is incorrect! " . $photoBoxId
		));	
  	}  		  	

	$result = array("geoArea" => $geoArea, "photoBoxId" => $photoBoxId);

	$_REQUEST['photoSessionParams'] = $result;
});

/**
 * РОУТЫ
 * Ниже описаны все роуты, используемые для реализации функционала API.
 */

// получение индивидуального api-token для дальнейшего использования API
Route::get('auth/api-token', function()
{
	$credentials = array('username' => Request::getUser(), 'password' => Request::getPassword());

		$authenticated = Auth::once($credentials);

		if ($authenticated)
		{

			if (!Auth::user()->tokens()->where('client', Request::getClientIp())->first() 
				|| !ApiToken::valid()->where('token', Auth::user()->tokens()->where('client', Request::getClientIp())
											->first())
											->where('client', Request::getClientIp())
											->first())
			{
				$token = [];

				$token['token'] = hash('sha256',Str::random(10),false);
				$token['client'] = Request::getClientIp();
				$token['expires_on'] = Carbon::now()->addMinutes(MINUTES)->toDateTimeString();

				Auth::user()->tokens()->save(new ApiToken($token));
			} else {
				return Response::json(array(
			    	'error' => false,
			    	'code' => '200',
			    	'message' => 'You have been already authenticated!'
				));				
			}
			return Response::json(array(
		    	'error' => false,
		    	'code' => '200',
		    	'api_token' => $token['token']
			));
		} else {
			return Response::json(array(
		    	'error' => true,
		    	'code' => '400',
		    	'message' => 'Bad Request'
			));
		}
});


Route::group(array('prefix' => 'api/v1', 'before' => 'auth.token'), function()
{
	// генерация id фотосессии
	Route::get('photosession-id', array('before' => 'photosession-id-filter',
		'uses' => 'Cloudservice\Api\Controllers\CloudController@generateId'));

	// загрузка изображений на сервер
	Route::post('upload', array('uses' => 'Cloudservice\Api\Controllers\CloudController@recievePhotos'));

	// вывод фотографий пользователю(Frontend)
	Route::get('photosession/{photosession_id}', array('uses' => 'Cloudservice\Api\Controllers\PhotosController@givePhotos'));

	// тестовый роут
	Route::get('test', function()
		{
			return Response::json(array(
		    	'error' => false,
		    	'code' => '200',
		    	'message' => 'Secured area. Hello, API!'
			));
		});

});

/**
 * STUFF ROUTES
 * Временная группа роутов для обеспечения базового функционала авторизации
 */
use Service\Api\Models\ApiUser;
Route::group(array('prefix' => 'stuff'), function()
{
	Route::get('create-user', function() 
	{
		$user = new ApiUser;
		$user->username = 'apiuser23';
		$user->password = '86Qjhv8TQULidUMyBz3sN5NwowxJ';

		try {
			$user->save();
			return Response::json(array(
		    	'error' => false,
		    	'code' => '200',
		    	'message' => 'Successfully created!'
		    	)
		    );
		} catch (Exception $e) {
			return Response::json(array(
		    	'error' => true,
		    	'code' => '400',
		    	'message' => 'Bad Request',
		    	'details' => $e
		    	)
		    );
		}
	});

});