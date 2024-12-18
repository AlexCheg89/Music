<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  $db = new Database();

  try {
    $title = $_POST['title'];
    $genre_id = $_POST['genre_id'];
    $artist_id = $_POST['artist_id'];
    $album = $_POST['album'];
    $year = $_POST['year'];
    $filepath = $_POST['filepath'];

    $db->AddSong($title, $genre_id, $album, $artist_id, $filepath, $year);
    echo json_encode(['status' => 'success']);
  } catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
  }

?>
