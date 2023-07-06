<?php


class Database
{
    private $host = DBHOST;
    private $name = DBNAME;
    private $user = DBUSER;
    private $pass = DBPASS;

    private $dbh, $statement;

    public function __construct()
    {
        $conn = "mysql:host=$this->host; dbname=$this->name";

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($conn, $this->user, $this->pass, $option);
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }

    public function query($query)
    {
        $this->statement = $this->dbh->prepare($query);
    }


    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->statement->execute();
    }

    public function all()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
