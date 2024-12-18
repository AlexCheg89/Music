<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  require '../libs/getID3/getid3.php';

  use getID3;

  try {
    $db = new Database();
    //проверка загрузки файла
    if ($_FILES['file']['error'] !==UPLOAD_ERR_OK) {
      $error = $_FILES['file']['error'];
      throw new Exception('Ошибка загрузки файла.' . $error);
    }

    // Получение информации о файле
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/storage/audio/' . basename($fileName);

    // перемещение загруженного файла
    if (!move_uploaded_file($fileTmpPath, $filePath)) {
      $error = $_FILES['file']['error'];
      throw new Exception('Ошибка при перемещении загруженного файла. Код ошибки : ' . $error);
    }

    // Извлечение метаданных
    $getID3 = new getID3;
    $fileInfo = $getID3->analyze($filePath);
    if (isset($fileInfo['error'])) {
      throw new Exception('Ошибка анализа файла: ' . implode(', ', $fileInfo['error']));
    }

    // Поучение метаданных
    $title = !empty($fileInfo['tags']['id3v2']['title'][0]) ? $fileInfo['tags']['id3v2']['title'][0] : $_POST['title'];
    $artist = !empty($fileInfo['tags']['id3v2']['artist'][0]) ? $fileInfo['tags']['id3v2']['artist'][0] : $_POST['artist_id'];
    $album = !empty($fileInfo['tags']['id3v2']['album'][0]) ? $fileInfo['tags']['id3v2']['album'][0] : $_POST['album'];
    $year = !empty($fileInfo['tags']['id3v2']['year'][0]) ? $fileInfo['tags']['id3v2']['year'][0] : $_POST['year'];
    $genre = !empty($fileInfo['tags']['id3v2']['genre'][0]) ? $fileInfo['genre']['id3v2']['genre'][0] : $_POST['genre_id'];
    var_dump($artist);
    // Полоучение ID исполнителя
    $artistId = $db->GetPerformerId($artist);

    // Если исполнителя нет добавляем его
    if (!$artistId) {
      $artistId = $db->CreatePerformer($artist);
    }

    // Полоучение ID жанра
    $genreId = $db->GetGenreId($genre);

    // Если жанра нет добавляем его
    if (!$genreId) {
      $db->CreatePerformer($genre);
      $genreId = $db->GetPerformerId($genre);
    }

    // Вставка песни в базу данных
    $genreId = $db->GetGenreId($genre);
    $artistId = $db->GetPerformerId($artist);
    $db->AddSong($title, $genreId, $album, $artistId, $filepath, $year);
    echo json_encode(['status' => 'success']);

  } catch(exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
  }

?>


