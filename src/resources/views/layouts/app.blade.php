<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header__inner">
            <form action="/menu" method="get">
                <button class="title__logo" type="submit"><img src="{{ asset('icons/menu1.png') }}"></button>
            </form>
            <h1 class="title">Rese</h1>
        </div>
    </header>

    <main>
        <div class="content_wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>
