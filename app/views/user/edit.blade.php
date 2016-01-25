<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1>Edit {{ $user->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('last_name', 'Apellido') }}
        {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Telefono') }}
        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone_type', 'Tipo de telefono') }}
        {{ Form::select('phone_type', array('1' => 'Casa', '2' => 'Trabajo', '3' => 'Otro'), Input::old('phone_type'), array('class' => 'form-control')) }}
    </div>




    {{ Form::submit('Editar usuario', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>