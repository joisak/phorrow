@section('content')

@section('title')
	Phorrow - Skapa album	
@stop

@if(!Auth::check())
	<p>Get away bitch!</p>
@else

{{ Form::open(array('route' => 'collection.store', 'class' => 'form-signin')) }}

	{{ Form::label('name', 'Albumsnamn')}}
	
	{{ Form::text('name','', array('class' => 'form-control')) }}

	{{Form::submit('Create collection', array('class' => 'btn btn-success btn-create')) }}

{{ Form::close() }}

@endif
@stop