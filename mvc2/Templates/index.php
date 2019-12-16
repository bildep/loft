<br><br>
<a href="/user/logout/">Выход</a>
<a href="/user/upload/">Загрузить файлы</a>

<h2>Все файлы пользователя</h2>

<?foreach ($data['img'] as $img):?>
    <img src="<?=$img['name']?>" alt="">

<?endforeach;?>
