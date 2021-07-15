<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bitcoin Precio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Bitcoin</h1>
  <p><b>Bitcoin</b> es una moneda virtual o un medio de intercambio electrónico que sirve para adquirir productos y servicios como cualquier otra moneda. ... El único respaldo de esa moneda son los algoritmos tecnológicos los cuales, hasta el momento y aunque existe el riesgo, no han podido ser penetrados.</p> 
</div>

@include('Layouts.navbar')

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
        {{ csrf_field() }}
        @yield('content') 
    </div>
</div>
<br>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
