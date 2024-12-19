<?php

  /**
   * Класс для взаимодействия с базой данных
   */
  class Database {

    // строка подключения к базе данных: название драйвера базы данных, хост сервера, имя базы данных, кодировка
    private $dsn = "mysql:host=localhost;dbname=ch18603_musicman;charset=UTF8";

    // пользователь базы данных
    private $user = "ch18603_musicman";

    // Пароль дял пользователя базы данных
    private $password = "M8mdN6mq";

    // переменная для взаимодействия с PDO
    public $conn;

    public function __construct() {
      try {
        $this->conn = new PDO($this->dsn,$this->user,$this->password);
      }
      catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
      }
    }

    /**
     * Метод получения данных из таблицы
     * @param выбор полей (столбцов) $param
     * @param имя таблицы $table
     * @return array
     */
    public function GetData($param, $table) {

      $select= is_null($param) ? '*' : $param; // управление выбором полей, если первый параметр функции
                                                      // null то выводятся все поля таблицы *
                                                      // если строкой задаются имена полей то переменной $select присваивается
                                                      // строка с именами полей
      $sql = "SELECT $select FROM $table";            // запрос для выборки данных
      $stmt = $this->conn->prepare($sql);      // параметризация запроса для обеспечения безопасности
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $result;
    }

    /**
     * Метод получения списка композиций
     * @return возвращает ассоциативный массив с именнами композиций из дочерних таблиц жанр и исполнитель
     */
    public function GetSongsList()  {

      $sql = "SELECT songs.*, performer.performerName As performer_name, genre.genreName AS genre_name FROM `songs`
JOIN genre ON genre.id = songs.genreId
JOIN performer ON performer.id = songs.performerId";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $result;
    }

    /**
     * Метод определения количества записей по жанру
     * @param жанр $genre
     * @return количество записей
     */
    public function TotalSongsOfGenre($genre) {
      $sql = "SELECT * FROM songs WHERE genreId = :genreId";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(":genreId", $genre);
      $stmt->execute();
      $quantity = $stmt->rowCount();

      return $quantity;
    }

    /**
     * Метод добавления песни в базу данных
     * @param название $title
     * @param жанр $genre_id
     * @param альбом $album
     * @param исполнитель $artist_id
     * @param путь для хранения $filepath
     * @param год $year
     * @return void
     */
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

    /**
     * Создание плейлиста
     * @param имя плейлиста $name
     * @return void
     */
    public function AddPlaylist($name) {
      $sql = "INSERT INTO playlist (playlistName) VALUES (:name)";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
    }

    /**
     * Метод получения ID по имени исполнителя
     * @param mixed $param
     * @return mixed
     */
    public function GetPerformerId($name) {
      $sql = "SELECT id FROM performer WHERE performerName = :name";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $param);
      $stmt->execute();
      $performerId = $stmt->fetchColumn();
      return $performerId;
    }

    /**
     * Метод добавления исполнителя в базу данных
     * @param имя исполнителя $param
     * @return void
     */
    public function CreatePerformer($name) {
      $sql = "INSERT INTO performer (performerName) VALUES (:name)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
    }

    /**
     * Метод получения ID по имени жанра
     * @param название жанра $param
     * @return mixed
     */
    public function GetGenreId($name) {
      $sql = "SELECT id FROM genre WHERE genreName = :name";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
      $genreId = $stmt->fetchColumn();
      return $genreId;
    }


    /**
     * Метод добавления жанра в базу данных
     * @param название $param
     * @return void
     */
    public function CreateGenre($name) {
      $sql = "INSERT INTO genre (genreName) VALUES (:name)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
    }

    /**
     * Метод добавления пользователя в базу данных
     * @param email $email
     * @param пароль $password
     * @return void
     */
    public function CreateUser($email, $password) {
      $sql = "INSERT INTO users (userEmail, userPassword) VALUES(:email, :password)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":password", $password);
      $stmt->execute();
    }

    /**
     * Метод получения пользователя пользователя из базы данных
     * @param email $email
     * @return bool
     */
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
