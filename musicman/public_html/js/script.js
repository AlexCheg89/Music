$(document).ready(function() {
  loadSongs();
  loadGenre();
  loadArtists();


  $('#add-song-form-auto').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this); // Используем FormData для загрузки файла
    $.ajax({
        url: '/components/upload_song.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status === 'success') {
                loadSongs();
            } else {
                alert(response.error);
            }
        }
    });
  });
  $('#add-song-form-manual').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: '/components/add_song.php',
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if (response.status === 'success') {
                loadSongs();
            } else {
                alert(response.error);
            }
        }
    });
  });
  $('#create-playlist-form').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: '/components/create_playlist.php',
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
          if (response.status === 'success') {
              alert('Плейлист создан!');
          } else {
              alert(response.error);
          }
      }
    });
  });

  function loadSongs() {
    $.ajax({
      url: '/components/get_songs.php',
      method: 'GET',
      dataType: 'json',
      success: function(songs) {
        $('#song-list').empty();
        songs.forEach(function(song) {
          $('#song-list').append(
            `<div class="file">
                <a href="#" class="play-song" data-file="${song.songPath}">${song.performer_name} - ${song.songName}</a>
            </div>`
          );
        });

        // Добавляем обработчик клика для каждой песни
        $('.play-song').on('click', function(e) {
          e.preventDefault();
          var filePath = $(this).data('file');
          $('#audio-source').attr('src', filePath);
          $('#audio-player')[0].load(); // Перезагружаем аудиоплеер
          $('#audio-player')[0].play(); // Запускаем воспроизведение
        });
      }
    });
  }

  function loadGenre() {
    $.ajax({
      url: '/components/get_genres.php',
      method: 'GET',
      dataType: 'json',
      success: function(genres) {
        $('#genre-select').empty();
        genres.forEach(function(genre) {
          $('#genre-select').append(
            `<option value="${genre.id}">${genre.genreName}</option>`
          );
        });
      }
    });
  }

  function loadArtists() {
    $.ajax({
      url: '/components/get_artists.php',
      method: 'GET',
      dataType: 'json',
      success: function(performers) {
        $('#artist-select').empty();
        performers.forEach(function(performer) {
          $('#artist-select').append(
              `<option value="${performer.id}">${performer.performerName}</option>`
          );
        });
      }
    });
  }

});
