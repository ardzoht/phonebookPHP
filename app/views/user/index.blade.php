<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pretty Hot Programmer.</title>
	<style>
@import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
    width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
    text-decoration:none;
		}

		h1 {
    font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Agenda Telefonica</h1>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Dirección</td>
        <td>Telefono</td>
        <td>Email</td>

        <td>Tipo de telefono</td>
    <td></td>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->email }}</td>

            <td>{{ $value->phone}}</td>
            <td>{{ Phone::find($value->phone_type)->name }}</td>



            <!-- we will also add show, edit, and delete buttons -->
            <td>
                {{ Form::open(array('url' => 'user/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Borrar usuario', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->


                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Editar</a>

            </td>
        </tr>
        @endforeach
    </tr>
    </thead>
    <tbody>


    </tbody>
</table>
        <a href="user/create"class="btn btn-small btn-info">Agregar Usuario</a>

</div>
</div>
</body>
</html>
