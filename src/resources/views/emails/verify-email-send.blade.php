<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
</head>

<body>
    <header>
        <div class="header__inner">
            <div class="header__img">
                <button class="title__logo"><img src="{{ asset('storage/images/menu1.png') }}"></button>
            </div>
            <h1 class="title">Rese</h1>
        </div>
    </header>

    <main>
        <div class="content_wrapper">
            <div class="content">
                <div class="content__top">
                    <p>ご登録いただいたメールアドレスが正しいかどうかを確認するため</p>
                    <p>このメールをお送りしています。</p>
                    <p>以下のリンクをクリックして、メールアドレスの認証を完了してください。</p>
                </div>
                <a href="{{ $actionUrl }}">メール認証</a>
                <div class="content__bottom">
                    <p>もしこのメールに心当たりがない場合、何もせずにこのメールを無視してください</p>
                    <p>ご不明な点があれば、お気軽にお問い合わせください。</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
