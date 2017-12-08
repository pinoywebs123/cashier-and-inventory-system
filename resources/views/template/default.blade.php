<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CASHIERING AND INVENTORY SYSTEM</title>
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">

       @yield('styles')
    </head>
    <body>
        
       <div class="container">
            @yield('contents')
       </div>
    </body>
      <script src="{{URL::to('js/jquery.js')}}"></script>
      <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
        @yield('scripts')
</html>
