<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/css/bootswatch.lux.min.css') }}">
    <title>Document</title>
</head>
<body>

@include('site.includes.navbar')

<div class="container">
    <div class="row mt-4">
          <div class="col-md-9"> @yield('content')</div>
          <div class="col-md-3">@yield('sidebar')</div>
    </div>
  
   
</div>
    
</body>
</html>