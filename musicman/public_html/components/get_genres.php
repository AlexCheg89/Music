<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  $db = new Database();

  $genres = $db->GetData(null, 'genre');

  echo json_encode($genres);
?>
