<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>您好,{{ $myData['name'] }}</h1>
    <p>您已成立訂單，訂單編號為 {{ $myData['order_id'] }}。</p>
    <p>總金額：{{ $myData['total'] }}</p>
</body>
</html>
