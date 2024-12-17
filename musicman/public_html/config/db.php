<?php

  class Database {
    private $dsn = "mysql:host=localhost;dbname=ch18603_musicman;charset=UTF8";
    private $user = "ch18603_musicman";
    private $password = "M8mdN6mq";
    public $conn;

    public function __construct() {
      try {
        $this->conn = new PDO($this->dsn,$this->user,$this->password);
      }
      catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
      }
    }

    public function GetData($param, $table) {
      $genre = array();

      $select= is_null($param) ? '*' : $param;

      $sql = "SELECT $select FROM $table";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $row) {
        $genre[] = $row;
      }

      return $genre;
    }

    public function TotalSongsOfGenre($genre) {
      $sql = "SELECT * FROM songs WHERE genre = :genre";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(":genre", $genre);
      $stmt->execute();
      $quantity = $stmt->rowCount();

      return $quantity;
    }

  }


?>
