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
        $query = "SELECT * FROM order_model WHERE user_id =" . $data['id'];
        $this->db->query($query);
        return $this->db->all();
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM order_model WHERE id =" . $id;
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
