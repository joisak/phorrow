
@section('content')

@section('title')
	Phorrow - Album Inställningar
@stop

@if(!Auth::check())
	<p>Get away bitch!</p>
@else

@if(!$collections->count() > 0)
	<p>Inga album...</p>
@endif

@foreach($collections as $collection)
	<div class="col-md-4">

		<a href="{{ URL::route('collection.show', $collection->id) }}" class="btn-create">{{ $collection->name }}</a>
		@if($collection->inventory->count() > 0) 
			<a href="{{ URL::route('collection.show', $collection->id) }}"><img src="{{URL::asset('uploads/' .$collection->inventory->first()->file_name)  }}" class="img-responsive"></a>
		@endif
		<br>
	</div>
@endforeach

<div class="row">
	<div class="col-md-12">
		<a href="{{ URL::route('collection.create') }}" class="album-header-fix btn btn-create btn-info"> Skapa nytt album</a> 
	</div>
</div>

@endif
@stop