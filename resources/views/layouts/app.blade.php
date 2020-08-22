<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Presto') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
   
    @if(Route::currentRouteName()!= 'homepage')
    
      @include('components.navbar')
        
      @yield('content')
  
  
  @else

      @include('components.navbar')
        
      @yield('content')

      @include('components.footer')
   
  @endif
   

 <!-- Scripts -->
 <script src="https://kit.fontawesome.com/08e7b077b9.js" crossorigin="anonymous"></script>

 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
