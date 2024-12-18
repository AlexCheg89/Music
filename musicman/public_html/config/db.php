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

    public function GetSongsList()  {
      $songs = array();

//       $sql = "SELECT songs.id, songs.songName, genre.genreName, songs.songAlbum, performer.performerName, songs.songPath FROM `songs`
// JOIN genre ON genre.id = songs.genreId
// JOIN performer ON performer.id = songs.performerId";
        $sql = "SELECT songs.*, performer.performerName As performer_name, genre.genreName AS genre_name FROM `songs`
JOIN genre ON genre.id = songs.genreId
JOIN performer ON performer.id = songs.performerId";


      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $row) {
        $songs[] = $row;
      }

      return $songs;
    }

    public function TotalSongsOfGenre($genre) {
      $sql = "SELECT * FROM songs WHERE genreId = :genreId";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(":genreId", $genre);
      $stmt->execute();
      $quantity = $stmt->rowCount();

      return $quantity;
    }

    public function AddSong($title, $genre_id, $album, $artist_id, $filepath, $year) {
      $sql = "INSERT INTO songs (songName, genreId, songAlbum, performerId, songPath, songYear) VALUES (:songName, :genre_id, :songAlbum, :performerId, :songPath, :songYear)";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(':songName', $title);
      $stmt->bindParam(':genre_id', $genre_id);
      $stmt->bindParam(':songAlbum', $album);
      $stmt->bindParam(':performerId', $artist_id);
      $stmt->bindParam(':songPath', $filepath);
      $stmt->bindParam(':songYear', $year);

      $stmt->execute();
    }

    public function AddPlaylist($name) {
      $sql = "INSERT INTO playlist (playlistName) VALUES (:name)";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
    }

    public function GetPerformerId($param) {
      $sql = "SELECT id FROM performer WHERE performerName = :name";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $param);
      $stmt->execute();
      $performerId = $stmt->fetchColumn();
      return $performerId;
    }

    public function CreatePerformer($param) {
      $sql = "INSERT INTO performer (performerName) VALUES (:name)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $param);
      $stmt->execute();
    }

    public function GetGenreId($param) {
      $sql = "SELECT id FROM genre WHERE genreName = :name";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $param);
      $stmt->execute();
      $genreId = $stmt->fetchColumn();
      return $genreId;
    }

    public function CreateGenre($param) {
      $sql = "INSERT INTO genre (genreName) VALUES (:name)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $param);
      $stmt->execute();
    }

    public function CreateUser($email, $password) {
      $sql = "INSERT INTO users (userEmail, userPassword) VALUES(:email, :password)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":password", $password);
      $stmt->execute();
    }

    public function GetUser($email) {
      $user = array();
      $sql = "SELECT * FROM users WHERE email= :username";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':username', $email);

      $user = $stmt->execute();

      return $user;
    }
  }



?>
