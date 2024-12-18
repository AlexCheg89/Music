<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form enctype="multipart/form-data" action="import.php" method="POST">
      <!-- Поле MAX_FILE_SIZE требуется указывать перед полем загрузки файла -->
      <input type="hidden" name="MAX_FILE_SIZE" value="111111111" />
      <!-- Название элемента input определяет название элемента в суперглобальном массиве $_FILES -->
      Отправить файл: <input name="userfile" type="file" />
      <input type="submit" value="Отправить файл" />
  </form>
</body>
</html>
