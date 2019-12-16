<?php
echo $data['msg'];
?>
<h2>Загрузка файлов</h2>
<p>
    <a href="/user/">Все файлы</a>
</p>

<form action="/user/upload/" method="post" enctype="multipart/form-data">
    <input type="file" name="img"><br><br>
    <input type="submit" name="subm">
</form>
