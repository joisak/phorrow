@extends('layouts/main')

@section('title')
	Phorrow - Bilder
@stop

@section('content')

	<div class="row">
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<h4 class="album-header">{{ $image->title }}</h4>
				<a href="{{ URL::asset('/uploads/' . $image->file_name) }}" data-lightbox="{{ $image->id }}">
					<img src="{{ URL::asset('/uploads/' . $image->file_name) }}" class="img-responsive img-show">
				</a>
				<p class="note">Notering</p>
				<p class="description">{{$image->description}}</p>
			</div>
		</div>
	</div>

	<div class="row thumbnails">
		@if ($album->inventory->count() > 1)
			<p class="album-header-fix">Fler bilder från <span class="album-header">{{$album->name}}</span></p>

		@foreach ($album->inventory as $inventory)
			@if ($image->id != $inventory['id'])
			<div class="col-md-1">
				<a href="{{ URL::to('/albums/' . $album->id . '/image/' . $inventory['id']) }}">
					<img src="{{ URL::asset('/uploads/' . $inventory['file_name']) }}" class="img-responsive">
				</a>
			</div>
			@endif
		@endforeach

		@endif
	</div>

	    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'phorrow'; // required: replace example with your forum shortname
        var disqus_identifier = '<?= $image->id ?>';
    	var disqus_title = '<?= $image->title ?>';
    	var disqus_url = '<?= Request::url() ?>';


        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
@stop