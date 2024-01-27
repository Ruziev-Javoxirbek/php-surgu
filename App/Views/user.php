<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Профиль пользователя:</h1>
<ul>
    <table bgcolor="aqua" border="1">
        <tr>
            <td>Имя</td>
            <td><?=$data[0]->name?></td>
        </tr>
        <tr>
            <td>Фамилия</td>
            <td><?=$data[0]->surname?></td>
        </tr>
        <tr>
            <td>e-mail</td>
            <td><?=$data[0]->email?></td>
        </tr>
    </table>
</ul>
</body>
</html>