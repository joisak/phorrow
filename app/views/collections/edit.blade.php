@section('content')

@if(!Auth::check())
	<p>Get away bitch!</p>
@else

<div class="col-md-4">
{{ Form::model($collection, array('route' => array('collection.update', $collection->id), 'method' => 'PUT')) }}

	{{ Form::label('name', 'Collections name')}}
	
	{{ Form::text('name', $collection->name, array('class' => 'form-control')) }}

	{{Form::submit('Uppdatera album', array('class' => 'btn btn-success btn-create')) }}

{{ Form::close() }}
</div>

<div class="row">
	<div class="col-md-12">

@foreach( $inventories as $img)

		
			<img src="{{ URL::asset('uploads/' . $img->file_name)}}" class="img-responsive img-edit" width="200">	
			
			{{ Form::model($inventory, array('route' => array('inventory.destroy', $img->id), 'method' => 'DELETE')) }}
			{{ Form::hidden('album', 'true') }}
			{{ Form::submit('Ta bort bild', array('class' => 'btn btn-danger btn-create')) }}
			{{ Form::close() }}
			

@endforeach

			<hr>
			{{ Form::model($collection, array('route' => array('collection.destroy', $collection->id), 'method' => 'DELETE')) }}
			{{ Form::submit('Ta bort hela albumet', array('class' => 'btn btn-danger btn-create')) }}
			{{ Form::close() }}

@endif
	</div>
</div>
@stop