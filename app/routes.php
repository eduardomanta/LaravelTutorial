<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::pattern('nombre','[a-zA-Z]+');



/*Route::get('/saludo/{nombre?}',function($nombre=null)
{	
	return "Hola {$nombre}";
})->before('session');*/

Route::group(array('before' => 'session'),function()
{
	
	Route::get('/saludo/{nombre?}',function($nombre=null)
	{	
		return "Hola {$nombre}";
	});

});


	Route::get('/session/crear',function()
	{
		Session::put('nombre','Eduardo');
		return 'sesion creada';
	});

	Route::get('/session/destruir',function()
	{
		Session::forget('nombre');
		return 'sesion eliminada';
	});


	
		Route::get('/libros/autor',function()
		{
			return View::make('libros.forma');
		});
	
	Route::post('/libros/autor',function()
	{
		$datos=Input::all();
		$reglas = array(
			'nombre' =>  'required|alpha',
			'apellidos' =>  'required|Regex:/^[a-z-\s]+$/',
			'correo' =>  'required|Email',
			'edad' =>  'required|Integer'
		 );

		$validacion=Validator::make($datos,$reglas);
		if ($validacion->fails()) {
			return 'esta mal';
		}
		return Input::get('_token');
	})->before('csrf');

