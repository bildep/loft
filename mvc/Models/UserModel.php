<?php

class UserModel extends Model{

    public function userLogin($post)
    {

        $query = $this->getConnection()->prepare("SELECT * FROM user WHERE `login` = :login AND `pass` = :pass");
        $query->execute(['login' => $post['login'], 'pass' => $post['pass']]);
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($user) {
            setSession('userId', $user[0]['id']);
            return $user[0]['id'];
        } else {
            return false;
        }
    }

    public function getAll($sort = 'asc')
    {
        $query = $this->getConnection()->prepare("SELECT login, age FROM user ORDER BY age $sort");
        $query->execute(['sort' => $sort]);
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }



    public function userRegister($post)
    {
        if ($this->existUser($post['login'])) {
            return false;
        }
        if (! empty($_FILES)) {
            $file = new File();
            $fileName = $file->upload();
        }
        if (empty($post['login']) || empty($post['pass']) || empty($post['age'])) {
            return false;
        }
            $pdo = $this->getConnection();
            $query = $pdo->prepare("INSERT INTO `user` (`login`, `pass`, `age`, `avatar`) VALUES (?, ?, ?, ?)");
            $query ->execute([$post['login'], $post['pass'], $post['age'], $fileName]);

            setSession('userId', $pdo->lastInsertId());
            return $pdo->lastInsertId(); //id added users


    }


    public function existUser($login)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM users WHERE `login` = :login");
        $query->execute(['login' => $login]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user !== null) {
            return $user;
        }
        return false;
    }
}
