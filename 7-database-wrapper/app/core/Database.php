<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // menggunakan metode phpdata object (pdo) untuk mengambil data di database, tujuannya biar lebih flexible kalau ganti database 
    private $dbh; // database handler
    private $stmt; // statement, buat nyimpen query

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);    
        } catch(PDOException $error){
            die($error->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // dibuat begini(wrapper) biar terhindar dari sql injection
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
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
        $this->stmt->bindValue($param, $value, $type);
    }

    // buat data yang banyak
    public function resultSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // buat data yang single
    public function single()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }



}