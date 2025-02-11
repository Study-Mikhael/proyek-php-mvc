<?php

class Mahasiswa_model{
    // menggunakan metode phpdata object (pdo) untuk mengambil data di database, tujuannya biar lebih flexible kalau ganti database 
    
    private $dbh; // database handler
    private $stmt; // statement, buat nyimpen query

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=proyek-php-mvc';
        try{
            $this->dbh = new PDO($dsn, 'root', '');    
        } catch(PDOException $error){
            die($error->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}