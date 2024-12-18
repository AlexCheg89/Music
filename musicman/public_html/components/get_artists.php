<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  $db = new Database();

  $performers = $db->GetData(null, 'performer');

  echo json_encode($performers);
?>
