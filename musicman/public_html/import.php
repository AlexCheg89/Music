<?php

  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/storage/audio/';
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  echo $_SERVER['DOCUMENT_ROOT'];
  echo ini_get('post_max_size');
  echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
} else {
    echo "Возможная атака на сервер через загрузку файла!\n";
}

echo 'Дополнительная отладочная информация:';
print_r($_FILES);

print "</pre>";

?>
