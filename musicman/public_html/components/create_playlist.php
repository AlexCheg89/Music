<?php
  header('Content-Type: application/json');
  require '../config/db.php';

  $db = new Database();

  try {

    $name = $_POST['name'];

    $db->AddPlaylist($name);

    echo json_encode(['status' =>'success']);

  } catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
  }

?>
