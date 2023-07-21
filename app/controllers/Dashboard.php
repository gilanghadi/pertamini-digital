<?php


class Dashboard extends Controller
{

    public function index()
    {
        if (isset($_SESSION['login']) === true) {
            $data['title'] = 'Dashboard | Pertamini';
            $data['user_login'] = $this->model('user_model')->findUsername($_SESSION['username']);
            $data['order_user_id'] = $this->model('order_model')->getAllById($data['user_login']);
            $this->view('layout/header',  $data);
            $this->view('components/navbar');
            $this->view('dashboard', $data);
            $this->view('layout/footer');
        } else {
            header('Location:' . BASEURL . '/');
        }
    }

    public function destroy($order_id)
    {
        if (isset($_SESSION['login']) === true) {
            if ($this->model('order_model')->deleteById($order_id) > 0) {
                header('Location:' . BASEURL . '/dashboard');
                exit;
            } else {
                Flasher::setFlash('Error!', 'Something Went Wrong', 'error');
                header('Location:' . BASEURL . '/dashboard');
                exit;
            }
        } else {
            Flasher::setFlash('Error!', 'User Not Found!', 'error');
            header('Location:' . BASEURL . '/');
            exit;
        }
    }
}
