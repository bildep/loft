
<form action="/user/edit/" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    Логин: <input type="text" name="login" value="<?=$data['login']?>" required><br><br>
    Пароль: <input type="password" name="pass" value="<?=$data['pass']?>" required><br><br>
    Возраст: <input type="number" name="age" value="<?=$data['age']?>" required><br><br>
    <input type="submit" name="subm">
</form>