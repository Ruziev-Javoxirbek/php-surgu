<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task4</title>
</head>
<body>
<?php

    if (!$data['user'])

    {
        echo '<form class="d-flex" method="post" action="/php/login">';
        echo '<input class="form-control me-2" type="text" placeholder="Логин" name="login" aria-label="Логин"/>';
        echo '<input class="form-control me-2" type="text" placeholder="Пароль" name="password" aria-label="Пароль"/>';
        echo '<button class="btn btn-outline-success" type="submit">Войти</button>';

        echo '</form>';
    }
    else {
        echo 'Привет, ' . $data['user']->firstname . ' ' . $data['user']->lastname ;
        echo '<br><a href="/php/logout">Выйти</a>';

    }
?>
