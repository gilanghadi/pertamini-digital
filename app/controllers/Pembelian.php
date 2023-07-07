<?php


class Pembelian extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login']) === true) {
            $data['title'] = 'Pembelian | Pertamini';
            $data['login_user'] = $this->model('user_model')->findUsername($_SESSION['username']);
            $data['bahan_bakar'] = $this->model('bahan_bakar_model')->getAll();
            $this->view('layout/header',  $data);
            $this->view('components/navbar');
            $this->view('pembelian', $data);
            $this->view('layout/footer');
        } else {
            header('Location:' . BASEURL . '/');
        }
    }


    public function store()
    {
        if (isset($_SESSION['login']) === true) {
            if ($this->model('bahan_bakar_model')->addOrder($_POST) > 0) {
                session_start();
                $_SESSION['created_at'] = $_POST['created_at'];
                $_SESSION['bahan_bakar'] = $this->model('order_model')->sessionBahanBakar(intval($_POST['bahan_bakar']));
                $_SESSION['jumlah_uang'] = $_POST['jumlah_uang'];
                $_SESSION['jumlah_liter'] = $_POST['jumlah_liter'];
                Flasher::setFlash('Success!', 'Order Successfuly', 'success');
                header('Location:' . BASEURL . '/pembelian');
                exit;
            } else {
                Flasher::setFlash('Error!', 'Something Went Wrong', 'error');
                header('Location:' . BASEURL . '/pembelian');
                exit;
            }
        } else {
            header('Location:' . BASEURL . '/');
        }
    }

    public function findHarga($id)
    {
        echo json_encode($this->model('bahan_bakar_model')->findBahanBakar($id));
    }
}
