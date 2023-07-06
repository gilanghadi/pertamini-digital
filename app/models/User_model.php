<?php

class User_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findUsername($username)
    {
        $this->db->query("SELECT * FROM user_model WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->first();
    }

    public function findId($id)
    {
        $this->db->query("SELECT * FROM user_model WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->first();
    }


    public function addUser($data)
    {
        $query = "INSERT INTO user_model VALUES ('', :nama_lengkap, :username, :tanggal_lahir, :email, :password, :retype_password, :image)";
        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data["nama_lengkap"]);
        $this->db->bind('username', $data["username"]);
        $this->db->bind('tanggal_lahir', $data["tanggal_lahir"]);
        $this->db->bind('email', $data["email"]);
        $this->db->bind('password', password_hash($data["password"], PASSWORD_DEFAULT));
        $this->db->bind('retype_password', password_hash($data["retype_password"], PASSWORD_DEFAULT));
        $this->db->bind('image', $data["image"]);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function updateByUsername($username, $email, $data, $image)
    {
        $dataId = $this->findUsername($data);
        $query = "UPDATE user_model SET username = :username, email = :email, image = :image WHERE id =" . $dataId['id'];
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        if ($image) {
            $this->db->bind('image', $image);
            unlink(SITE_PUBLIC . '/' . $dataId['image']);
        }
        $this->db->execute();
        session_start();
        $_SESSION['username'] = $username;
        return $this->db->rowCount();
    }
}
