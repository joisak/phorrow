<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Bangers|Montserrat' rel='stylesheet' type='text/css'>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
{{HTML::style('css/style.css')}}
{{HTML::script('lightbox/js/lightbox.min.js')}}
{{HTML::style('lightbox/css/lightbox.css')}}

	<title>@yield('title')</title>
</head>
<body>
	 <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container header">
            <p class="logo">{{HTML::link('/', 'Phorrow')}}</p>

                <ul class="nav nav-pills">  
                <li>{{ HTML::link('/','Bilder')}}</li>
                <li>{{ HTML::link('albums','Album')}}</li>
                @if(Auth::check() && Auth::user()->admin == 1)
                    <li>{{ HTML::link('inventory/create', 'Ladda upp bilder') }}</li>
                    <li>{{ HTML::link('inventory', 'Bilder') }}</li>
                    <li>{{ HTML::link('collection', 'Album inställningar') }}</li>
                    <li>{{ HTML::link('users/logout','Logga ut') }}</li>
                @endif

            </div>
        </div>
    </div> 
             
 
    <div class="container main-container">
        <div class="content">
        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif

 
         @yield('content')

         <div class="footer">
        
            <p class="logo-footer">Phorrow</p>

        </div>

     </div>

   
    <script>


    $('.footer').css('margin-top',$(document).height() - ($('.header').height() + $('.content').height()  ) - $('.footer').height());


</script>
</body>
</html>