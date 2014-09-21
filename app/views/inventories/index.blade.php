@section('title')
	Phorrow - Bilder
@stop

@section('content')

@if(!Auth::check())
	<p>Get away bitch!</p>
@else

@if(!$inventories->count() > 0)
<p>Finns inga uppladdade bilder...</p>
 {{ HTML::link('inventory/create','Ladda upp', array('class' => 'btn'))}}
@else

<div class="row">

@foreach($inventories as $inventory)
	<div class="col-md-3">

		<p class="img-title" href="{{ URL::route('inventory.show', $inventory->id) }}">{{ $inventory->title }}</p>
		<a href="{{ URL::route('inventory.show', $inventory->id) }}">
			<img class ="img-responsive" src="{{ URL::asset('/uploads/' . $inventory->file_name) }}">
		</a>
	</div>
@endforeach

</div>
@endif
@endif
@stop