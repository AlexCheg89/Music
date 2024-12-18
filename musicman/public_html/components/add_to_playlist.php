<?php

  require '../config/db.php';

  $db = new Database();

  $sql = "INSERT INTO playlist (playlistUserId, playlistName, playlistSongId) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE song_name = song_name";

  $stmt=$db->conn->prepare($sql);
  $stmt->$bd->bind_param("sss", $playlistUser, $playlist, $song);
  $stmt->execute();

$song = $_POST['song'];
$playlist = $_POST['playlist'];

// Добавление песни в плейлист
$query = "INSERT INTO playlist_songs (playlist_name, song_name) VALUES (?, ?) ON DUPLICATE KEY UPDATE song_name = song_name";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $playlist, $song);
$stmt->execute();

$stmt->close();
$mysqli->close();
?>

function goToDir(dir) {
    setCookie('nm_viewmode', 'browse', 7);

    // getting and displaying directory contents
    $.ajax({
        url: 'get_directory.php',
        method: 'GET',
        data: { dir: dir },
        dataType: 'json',
        success: function(response) {
            // Обработка полученного ответа
            $('#interactioncontainer').html('');
            response.forEach(function(item) {
                $('#interactioncontainer').append('<div>' + item.name + '</div>'); // Пример обработки
            });
        }
    });
}

function goToPlaylist(playlist) {
    setCookie('nm_viewmode', 'playlist', 7);

    // getting and displaying playlist contents
    $.ajax({
        url: 'get_playlist.php',
        method: 'GET',
        data: { playlist: playlist },
        dataType: 'json',
        success: function(response) {
            // Обработка полученного ответа
            $('#interactioncontainer').html('');
            response.forEach(function(item) {
                $('#interactioncontainer').append('<div>' + item.song_name + '</div>'); // Пример обработки
            });
        }
    });
}

function addToPlaylist(song) {
    song = song.replace(/\+/g, '%20');
    song = decodeURIComponent(song);

    // adding song to playlist
    $.ajax({
        url: 'add_to_playlist.php',
        method: 'POST',
        data: { song: song, playlist: 'default' }, // Укажите нужный плейлист
        success: function() {
            goToPlaylist('default'); // Обновление плейлиста
        }
    });
}

