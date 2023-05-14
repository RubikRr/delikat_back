<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset("css/style.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <style>
  
  </style>

    <title>Document</title>
</head>
<body >
    <div class="sticky-top">   
            <nav style="background-color:Snow;">
                <ul class="nav nav-tabs justify-content-center">
                    <li  class="nav-item"><a class="nav-link link-dark" href="{{route("main.index")}}">Главная</a></li>
                    <li  class="nav-item"><a class="nav-link link-dark" href="{{route("product.showAll")}}">Продукты</a>
                    <li  class="nav-item"> <a  class="nav-link link-dark"href="{{route("order.showAll")}}">Заказы</a>
                </ul>
            </nav>
    </div>

    @yield("product")
    

    @yield("order")




</body>

</html>
