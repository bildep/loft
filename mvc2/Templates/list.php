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
<p>
    <a href="/user/add/">Добавить пользователя</a>
</p>
<table>
    <?php foreach ($data as $item):?>
        <tr>
            <td><?=$item['login']?></td>
            <td>возраст <?=$item['age']?></td>
            <td><a href="/user/edit/<?=$item['id']?>">Изменить</a></td>
        </tr>
    <?endforeach;?>
</table>
</body>
</html>



