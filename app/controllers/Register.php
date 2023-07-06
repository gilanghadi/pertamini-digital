<?php

class Register extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login']) === true) {
            header('Location:' . BASEURL . '/dashboard');
            exit;
        } else {
            $data['title'] = 'Register | Pertamini';
            $this->view('layout/header',  $data);
            $this->view('components/navbar');
            $this->view('auth/register', $data);
            $this->view('layout/footer');
        }
    }

    public function store()
    {
        if ($_POST['password'] !== $_POST['retype_password']) {
            Flasher::setFlashInput('Passwords Must Be The Same');
            header('Location:' . BASEURL . '/register');
            die;
        }
        if (strlen($_POST['password']) < 5) {
            Flasher::setFlashInput('Password must have at least min 5 length');
            header('Location:' . BASEURL . '/register');
            die;
        }
        if ($this->model('User_model')->addUser($_POST) > 0) {
            Flasher::setFlash('Success!', 'Register Successfuly', 'success');
            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('Error!', 'Something Went Wrong', 'error');
            header('Location: ' . BASEURL . '/register');
            exit;
        }

        function generalValidation($data)
        {
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
}
