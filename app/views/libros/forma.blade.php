{{Form::open()}}

	nombre:{{Form::text('nombre')}}</br>
	Apellidos:{{Form::text('apellidos')}}</br>
	Correo:{{Form::text('correo')}}</br>
	Edad:{{Form::text('edad')}}</br>

	{{Form::submit('Enviar')}}

{{Form::close()}}