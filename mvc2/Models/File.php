<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class File extends Illuminate\Database\Eloquent\Model {

    public $table = "images";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name', 'user_id'];

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

        $file = $this::create(['name' => $fileName, 'user_id' =>$userId]);
        $file->save();
        return $file->id;
    }

    public function getUserFiles($userId)
    {
        $files = $this::all()->where('user_id', '=', $userId)->toArray();
        return $files;
    }
}
