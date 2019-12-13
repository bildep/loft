<?php

class File extends Model {

    public function upload()
    {
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        $uploadfile = $uploaddir . basename($_FILES['img']['name']);


        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            return '/upload/' . basename($uploadfile);
        } else {
           return false;
        }
    }

    public function userUpload($userId)
    {
        if (! empty($_FILES)) {
            $fileName = $this->upload();
        }
        $pdo = parent::getConnection();

        $query = $pdo->prepare("INSERT INTO `images` (`name`, `user_id`) VALUES (?, ?)");
        $query ->execute([$fileName, $userId]);
        return $pdo->lastInsertId(); //id added users
    }

    public function getUserFiles($userId)
    {
        $pdo = parent::getConnection();
        $query = $pdo->prepare("SELECT * FROM images WHERE `user_id` = :user_id");
        $query->execute(['user_id' => $userId]);
        $files = $query->fetchAll(PDO::FETCH_ASSOC);
        return $files;
    }
}
