<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reserve.css') }}">
</head>

<body>
    <div class="content__box">
        <div class="title">
            <p>予約情報</p>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>店舗名</th>
                    <td>：&nbsp;&nbsp;{{ $reserve->shop->name }}</td>
                </tr>
                <tr>
                    <th>お客様名</th>
                    <td>：&nbsp;&nbsp;{{ $reserve->user->name }}</td>
                </tr>
                <tr>
                    <th>日付</th>
                    <td>：&nbsp;&nbsp;{{ $reserve->date }}</td>
                </tr>
                <tr>
                    <th>時間</th>
                    <td>：&nbsp;&nbsp;{{ $reserve->time }}</td>
                </tr>
                <tr>
                    <th>人数</th>
                    <td>：&nbsp;&nbsp;{{ $reserve->number . '名様' }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
