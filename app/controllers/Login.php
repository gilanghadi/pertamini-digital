<?php


class Login extends Controller
{

    public function index()
    {
        if (isset($_SESSION['login']) === true) {
            header('Location:' . BASEURL . '/dashboard');
            exit;
        } else {
            $data['title'] = 'Login | Pertamini';
            $this->view('layout/header',  $data);
            $this->view('components/navbar');
            $this->view('auth/login', $data);
            $this->view('layout/footer');
        }
    }

    public function authenticate()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = $this->model('user_model')->findUsername($username);

            if ($username === $data['username']) {
                if (password_verify($password, $data['password'])) {
                    session_start();
                    if ($data == null) {
                        Flasher::setFlash('Error!', 'User Not Found!', 'error');
                        header('Location:' . BASEURL . '/');
                        exit;
                    } else {
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $data['username'];
                        Flasher::setFlash('Success!', 'Login Successfuly', 'success');
                        header('Location:' . BASEURL . '/dashboard');
                        exit;
                    }
                } else {
                    Flasher::setFlashInput('Your Password Wrong!');
                    header('Location:' . BASEURL . '/');
                    exit;
                }
            } else {
                Flasher::setFlash('Error!', 'User Not Found!', 'error');
                header('Location:' . BASEURL . '/');
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location:" . BASEURL . '/');
        exit;
    }
}
