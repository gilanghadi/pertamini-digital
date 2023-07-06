<?php

class Profile extends Controller
{

    public function index()
    {
        if (isset($_SESSION['login']) === true) {
            $data['title'] = 'Profile | Pertamini';
            $data['user_login'] = $this->model('user_model')->findUsername($_SESSION['username']);
            $this->view('layout/header',  $data);
            $this->view('components/navbar');
            $this->view('profile', $data);
            $this->view('layout/footer');
        } else {
            header('Location:' . BASEURL . '/');
        }
    }

    public function update()
    {
        if (isset($_SESSION['login']) === true) {
            if ($this->model('user_model')->updateByUsername($_POST['username'], $_POST['email'], $_SESSION['username'], $this->upload()) > 0) {
                Flasher::setFlash('Success!', 'Update Profile Successfuly', 'success');
                header('Location:' . BASEURL . '/profile');
                exit;
            } else {
                Flasher::setFlash('Error!', 'Something Went Wrong', 'error');
                header('Location:' . BASEURL . '/profile');
                exit;
            }
        } else {
            Flasher::setFlash('Error!', 'User Not Found!', 'error');
            header('Location:' . BASEURL . '/');
            exit;
        }
    }


    public function upload()
    {
        $nameImage = $_FILES['image']['name'];
        $tmpImage = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        $sizeImage = $_FILES['image']['size'];


        // check image upload
        if ($error === 4) {
            Flasher::setFlash('Error!', 'No file was uploaded!', 'error');
            header('Location:' . BASEURL . '/profile');
            exit;
        }

        // check image according the format
        $formatImage = ['jpg', 'png', 'jpeg'];
        $splitNameImage = explode('.', $nameImage);
        $result_image = strtolower(end($splitNameImage));
        if (!in_array($result_image, $formatImage)) {
            Flasher::setFlash('Error!', "This'n image!", 'error');
            header('Location:' . BASEURL . '/profile');
            exit;
        }

        // check size image
        if ($sizeImage > 50000) {
            Flasher::setFlash('Error!', "Image size is too big!", 'error');
            header('Location:' . BASEURL . '/profile');
            exit;
        }


        // upload
        $nameFileRandom = uniqid();
        $nameFileRandom .= '.';
        $nameFileRandom .= $result_image;
        move_uploaded_file($tmpImage, SITE_PUBLIC . '/' . $nameFileRandom);
        return $nameFileRandom;
    }
}
