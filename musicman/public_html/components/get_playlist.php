<?php

  require '../config/db.php';

  $db = new Database();

  $playlist = $db->GetData('playlistName', 'playlist');



  $contents = [];
  foreach ($playlist as $row) {
    $contents[] = $row;
  }

  echo json_encode($contents);
?>
