<?php
use Illuminate\Database\Capsule\Manager as Capsule;


class UserModel extends Illuminate\Database\Eloquent\Model{

    public $table = "user";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['login', 'pass', 'age', 'avatar'];

    public function userLogin($post)
    {
        $user = UserModel::where('login', '=', $_POST['login'])->where('pass', '=', $_POST['pass'])->first()->toArray();
        if ($user) {
            setSession('userId', $user['id']);
            return $user['id'];
        } else {
            return false;
        }
    }

    public function userRegister($post)
    {
        $fileName = '';
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

        $user = $this::create(['login' => $post['login'], 'pass' =>$post['pass'], 'age' => $post['age'], 'avatar' =>$fileName]);
        $user->save();

        setSession('userId', $user->id);
        return $user->id;


    }


    public function existUser($login)
    {
        $user = $this::where('login', '=', $login)->first();
        if ($user) {
            return $user->toArray()['id'];
        }
        return false;
    }

    public function userAdd($post)
    {
        if ($this->existUser($post['login'])) {
            return false;
        }

        if (empty($post['login']) || empty($post['pass']) || empty($post['age'])) {
            return false;
        }

        $user = $this::create(['login' => $post['login'], 'pass' =>$post['pass'], 'age' => $post['age'], 'avatar' =>'']);
        $user->save();

        return $user->id;
    }

    public function userUpdate($post)
    {
        if (empty($post['id'])) {
            return false;
        }

        $user = $this::find($post['id']);
        $user->login = $post['login'];
        $user->pass = $post['pass'];
        $user->age = $post['age'];
        $user->save();
    }
}
