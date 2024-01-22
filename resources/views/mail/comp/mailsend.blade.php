<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volyavet.ru</title>
</head>
<body>
    <h1>Поступила новая заявка с сайта.</h1>
    <h3>Имя: <b>{{$mailData['name']}}</b></h3>
    <h3>Телефон: <b>{{$mailData['phone']}}</b></h3>
    <h3>Филиал: <b>{{$mailData['clinic']}}</b></h3>
    <p>Сообщение: <b>{{$mailData['message']}}</b></p>
</body>
</html>
