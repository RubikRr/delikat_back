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
<body >
    <nav>
        <ul>
            <li><a href="{{route("main.index")}}">Главная</a></li>
            <li><a href="{{route("product.showAll")}}">Продукты</a>
            <li><a href="{{route("customer.showAll")}}">Клиенты</a>
            <li> <a href="{{route("order.showAll")}}">Заказы</a>
        </ul>
    </nav>
    @yield("order")
    @yield("product")
    @yield("customer")
    @yield("customerFields")
    @yield("orderProduct")



</body>

</html>
