<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/94c49572d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content__wrapper">
        <div class="content">
            <div class="content__header">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="content__main">
                <p>会員登録はまだ完了していません</p>
                <p>認証メールを送信しました</p>
                <div class="email__text2">
                    <p>メールを確認してください</p>
                    <i class="fa-solid fa-face-smile"></i>
                </div>
                <div class="form">
                    <p>確認メールをもう一度送りたい方は下記をクリックしてください</p>
                    <form action="/email/verification-notification" method="POST">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-envelope"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
