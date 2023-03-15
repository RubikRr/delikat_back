<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset("css/style.css") }}">
    <title>Document</title>
</head>
<body link="white" vlink="white" alink="white">
    <nav>
        <ul class="menu" >
            <li ><a href="{{route("product.index")}}">JSON</a></li>
            <li><a href="{{route("main.index")}}">Главная</a></li>

            <li><a href="{{route("product.showAll")}}">Продукты</a>
            <li><a href="{{route("main.index")}}">Клиенты</a>
            <li> <a href="{{route("main.index")}}">Заказы</a>

            <li><a href="{{route("product.create")}}">Создать продукт</a></li>
        </ul>
    </nav>
    <ul class="tables">

    </ul>

@yield("product")
</body>
</html>
