<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ご予約の確認</title>
</head>
<body>
    <div class="content__header">
        <p>{{ $user->name . '様'}}</p>
    </div>
    <div class="content__main">
        <p>この度は、ご予約いただき誠にありがとうございます。</p>
        <p>本日ご予約日の為、お知らせいたします</p>
        <p>{{ $user->name . '様のご予約内容は以下のとおりです'}}</p>
        <p>{{ '店舗名：' . $reserve->shop->name }}</p>
        <p>{{ '日付：' . $reserve->date }}</p>
        <p>{{ '時間：' . $reserve->time }}</p>
        <p>{{ '人数：' . $reserve->number . '名様'}}</p>
        <p>{{$user->name . '様にお会いできますことを心待ちにしております。'}}</p>
    </div>
</body>
</html>