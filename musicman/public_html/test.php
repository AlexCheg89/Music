<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Музыкальный плеер</title>
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div id="player">
    <h1>Музыкальный плеер</h1>
    <audio id="audio-player" controls>
      <source id="audio-source" src="" type="audio/mpeg">
      Ваш браузер не поддерживает аудио.
    </audio>
    <div id="song-list"></div>
    <form id="add-song-form-auto">
      <input type="hidden" name="MAX_FILE_SIZE" value="11111111111" />
      <input type="file" name="file" accept="audio/*" required>
      <button type="submit">Добавить песню</button>
    </form>
    <form id="add-song-form-manual">
      <input type="text" name="title" placeholder="Название песни" required>
      <select name="genre_id" id="genre-select" required></select>
      <select name="artist_id" id="artist-select" required></select>
      <input type="text" name="album" placeholder="Альбом">
      <input type="number" name="year" placeholder="Год" min="1900" max="2100">
      <input type="text" name="filepath" placeholder="Путь к файлу" required>
      <button type="submit">Добавить песню</button>
    </form>
    <form id="create-playlist-form">
      <input type="text" name="name" placeholder="Название плейлиста" required>
      <button type="submit">Создать плейлист</button>
    </form>
  </div>
  <script src="/js/script.js"></script>
</body>
</html>
