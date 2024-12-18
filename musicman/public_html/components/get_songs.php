<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  $db = new Database();

  $songs = $db->GetSongsList();

  echo json_encode($songs);
?>
