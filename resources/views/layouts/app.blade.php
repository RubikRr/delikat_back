<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Деликат</title>

    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    



</head>

<body>
        <nav class="sticky-top" style="background-color:Snow;">
                    <ul class="nav nav-tabs justify-content-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="{{ route('login') }}">Войти</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif


                        @else
                            <li  class="nav-item"><a class="nav-link link-dark" href="{{route("home")}}">Главная</a>
                            <li  class="nav-item"><a class="nav-link link-dark" href="{{route("product.showAll")}}">Продукты</a>
                            <li  class="nav-item"> <a  class="nav-link link-dark"href="{{route("order.showAll")}}">Заказы</a>
                            <li  class="nav-item"> <a class="nav-link link-dark" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                @endguest
                    </ul>
        </nav>

        <main class="py-4">
            @yield('content')
             @yield("product")
            @yield("order")
        </main>
</body>
</html>
