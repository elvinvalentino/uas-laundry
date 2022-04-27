<?php
  class Database{
    private $hostname = "localhost";
    private $dbname = "laundry";
    private $username = "root";
    private $password = "";

    public function getConnection(): PDO{
      try{
        $con = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
        return $con;
      }catch(PDOException $e){
        echo "Connection failed. " . $e->getMessage();
      }
    }

    public function query(string $query, array $params = array()): PDOStatement {
      try {
        $con = $this->getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute($params);

        return $stmt;
      }catch(PDOException $e){
        echo "Connection failed. " . $e->getMessage();
      }
    }
  } 