<?php

class User extends Controller{


    protected $userId;
    protected $userName;

    public function index()
    {

        if ($userId = $this->isLogin($_SESSION['userId'])) {
            $file = new File();
            $data['img'] = $file->getUserFiles($userId);
            $view = new View();
            $view->render('index', $data);
        } else {
            redirect('/user/login/');
            return true;
        }


    }
    public function allusers($sort = 'asc')
    {
        $user = new UserModel();
        $data = $user->getAll($sort);
        $view = new View();
        $view->render('allusers', $data);
    }

    public function upload()
    {
        if(! empty($_FILES) && $userId = $this->getUserId()) {
                $file = new File();
                if ($file->userUpload($userId)) {
                    $data['msg'] = 'Файл загружен успешно';
                }

        }
        $view = new View();
        $view->render('upload', $data);
    }

    protected function getUserId()
    {
        return getSession('userId');
    }

    protected function isLogin($userId)
    {
        if ($_SESSION['userId'] == $userId) {
            return $userId;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['userId']);
        redirect('/user/login/');
        return true;
    }

    public function login()
    {
        if (! empty($_POST)) {
            $user = new UserModel();
            if ($user->userLogin($_POST)) {
                redirect('/user/index/');
                return true;
            }
        }
        $view = new View();
        $view->render('login');
    }

    public function register()
    {
        if (! empty($_POST) || ! empty($_FILES)) {
            $user = new UserModel();
            $user_id = $user->userRegister($_POST);
            redirect('/user/index/');
            return true;
        }

        $view = new View();
        $view->render('register');
    }
}
