<?php

class Order_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllById($data)
    {
        $dataId = $data['id'];
        $query = "SELECT * FROM order_model INNER JOIN bahan_bakar ON order_model.bahan_bakar_id = bahan_bakar.id WHERE user_id = $dataId ORDER BY created_at DESC";
        $this->db->query($query);
        return $this->db->all();
    }

    public function sessionBahanBakar($bahan_bakar)
    {
        $query = "SELECT * FROM order_model INNER JOIN bahan_bakar ON $bahan_bakar = bahan_bakar.id";
        $this->db->query($query);
        return $this->db->first();
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM order_model WHERE id =" . $id;
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
