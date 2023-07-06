<?php

class Bahan_bakar_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM bahan_bakar");
        return $this->db->all();
    }

    public function findBahanBakar($bahan_bakar)
    {
        $this->db->query("SELECT * FROM bahan_bakar WHERE bahan_bakar = :bahan_bakar");
        $this->db->bind('bahan_bakar', $bahan_bakar);
        return $this->db->first();
    }


    public function addOrder($data)
    {
        $query = "INSERT INTO order_model VALUES ('', :user_id, :bahan_bakar, :harga, :jumlah_uang, :jumlah_liter, :created_at)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('bahan_bakar', $data['bahan_bakar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('jumlah_uang', $data['jumlah_uang']);
        $this->db->bind('jumlah_liter', $data['jumlah_liter']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
