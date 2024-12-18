<?php

  require '../config/db.php';

  $db = new Database();

  $path = $db->GetData('songPath', 'songs');

  $contents = [];
  foreach ($path as $row) {
    $contents[] = $row;
  }

  echo json_encode($contents);
?>
