@extends('layouts/main')

@section('title')
	Phorrow - Album
@stop

@section('content')

@if(!$albums->count() > 0)
			<p>Tyvärr finns inga bilder eller album...</p>
@endif

	<div class="row">
		<div class="container">
		
		@foreach ($albums as $album)

		<div class="col-md-3">
		<a href="{{ URL::to('/album/'.$album->id) }}"><h4 class="album-header">{{ $album->name }}</h4></a>
		
		@if($album->inventory->count() > 0)

			<a href="{{ URL::to('/album/'.$album->id) }}"><img src="{{URL::asset('uploads/' .$album->inventory->first()->file_name)  }}" class="img-responsive"></a>
		</div>

		@endif

			
		@endforeach
		
		</div>
	</div>

		

@stop

			
