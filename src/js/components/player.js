function goToDir(dir) {
  setCookie('nm_viewmode', 'browse', 7);

  // getting and displaying directory contents
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          document.getElementById('interactioncontainer').innerHTML = xmlhttp.responseText;
      }
  }
  xmlhttp.open('GET', '?dir=' + dir, true);
  xmlhttp.send();
};

function goToPlaylist(playlist) {
  setCookie('nm_viewmode', 'playlist', 7);

  // getting and displaying playlist contents
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          document.getElementById('interactioncontainer').innerHTML = xmlhttp.responseText;
      }
  }
  xmlhttp.open('GET', '?playlist=' + playlist, true);
  xmlhttp.send();
};

function addToPlaylist(song) {
  song = song.replace(/\+/g, '%20');
  song = decodeURIComponent(song);
  // adding song to playlist, or initialising playlist with song
  var playlist = getCookie('nm_songs_playlist');
  if (playlist) {
      // removing song if it already exists
      playlist = JSON.parse(playlist);
      var songIdx = playlist.indexOf(song);
      if (songIdx >= 0) {
          playlist.splice(songIdx, 1);
      }

      // adding song to end of playlist
      playlist.push(song);
  } else {
      var playlist = [song];
  }
  setCookie('nm_songs_playlist', JSON.stringify(playlist), 365);

  // if currently playing from playlist, also updating active songlist
  var playmode = getCookie('nm_playmode');
  if (playmode == 'playlist') {
      var shuffle = getCookie('nm_shuffle');
      if (shuffle == 'on') {
          // adding new song between current and end of current shuffled songlist
          var currentsong = getCookie('nm_nowplaying');
          var songlist = getCookie('nm_songs_active');
          if (songlist) {
              songlist = JSON.parse(songlist);
              var songIdx = songlist.indexOf(currentsong);
              var randomIdx = Math.floor(Math.random() * (songlist.length - songIdx) + songIdx + 1);
              songlist.splice(randomIdx, 0, song);
              setCookie('nm_songs_active', JSON.stringify(songlist), 7);
          }
      } else {
          // getting current song's index in playlist
          var currentsong = getCookie('nm_nowplaying');
          var songIdx = playlist.indexOf(currentsong);

          // setting cookies
          setCookie('nm_songs_active', JSON.stringify(playlist), 7);
          setCookie('nm_songs_active_idx', songIdx, 7);
      }
  }

};

function removeFromPlaylist(song) {
  song = song.replace(/\+/g, '%20');
  song = decodeURIComponent(song);
  var playlist = getCookie('nm_songs_playlist');
  if (playlist) {
      playlist = JSON.parse(playlist);
      var songIdx = playlist.indexOf(song);
      // moving to end if already in playlist
      if (songIdx >= 0) {
          playlist.splice(songIdx, 1);
      }
      setCookie('nm_songs_playlist', JSON.stringify(playlist), 365);

      // if currently playing from playlist, also updating active songlist
      var playmode = getCookie('nm_playmode');
      if (playmode == 'playlist') {
          var songlist = getCookie('nm_songs_active');
          songlist = JSON.parse(songlist);
          var currentsong = getCookie('nm_nowplaying');
          var songIdx = songlist.indexOf(currentsong);
          songlist.splice(songIdx, 1)
          setCookie('nm_songs_active', JSON.stringify(songlist), 7);
      }

      // showing updated playlist
      goToPlaylist('default');
  }
};

function moveInPlaylist(song, direction) {
  song = song.replace(/\+/g, '%20');
  song = decodeURIComponent(song);
  var playlist = getCookie('nm_songs_playlist');
  playlist = JSON.parse(playlist);
  var songIdx = playlist.indexOf(song);
  if (songIdx + direction >= 0 && songIdx + direction < playlist.length) {
      playlist.splice(songIdx, 1);
      playlist.splice(songIdx + direction, 0, song);
  }
  setCookie('nm_songs_playlist', JSON.stringify(playlist), 365);

  // if currently playing from playlist, also updating active songlist
  var playmode = getCookie('nm_playmode');
  var shuffle = getCookie('nm_shuffle');
  if (playmode == 'playlist' && shuffle != 'on') {
      var currentsong = getCookie('nm_nowplaying');
      var songIdx = playlist.indexOf(currentsong);
      setCookie('nm_songs_active', JSON.stringify(playlist), 7);
      setCookie('nm_songs_active_idx', songIdx, 7);
  }

  // showing updated playlist
  goToPlaylist('default');
};

function clearPlaylist() {
  setCookie('nm_songs_playlist', '', 365);

  var playmode = getCookie('nm_playmode');
  if (playmode == 'playlist') {
      setCookie('nm_songs_active', '', 7);
      setCookie('nm_songs_active_idx', '0', 7);
  }

  goToPlaylist('default');
};

function setPlayMode(mode, song) {
  setCookie('nm_playmode', mode, 7);

  // switching to appropriate songlist, shuffling where necessary
  if (mode == 'browse') {
      var songlist = getCookie('nm_songs_currentsongdir');
  } else if (mode == 'playlist') {
      var songlist = getCookie('nm_songs_playlist');
  }
  if (songlist) {
      songlist = JSON.parse(songlist)
      if (getCookie('nm_shuffle') == 'on') {
          songlist = shuffleArray(songlist);

          // moving selected song to index 0
          var songIdx = songlist.indexOf(song);
          songlist[songIdx] = songlist[0];
          songlist[0] = song;
      }
      setCookie('nm_songs_active', JSON.stringify(songlist), 7);
  }
};

function advance(which) {
  // requesting next/previous song and loading it
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          if (xmlhttp.responseText) {
              window.location.href = '?play=' + xmlhttp.responseText;
          } else if (which == 'next' && getCookie('nm_shuffle') == 'on') {
              // end of shuffle playlist: restarting shuffle
              toggleShuffle();
              toggleShuffle();
              advance('next');
          }
      }
  }
  xmlhttp.open('GET', '?which=' + which, true);
  xmlhttp.send();
};

function toggleShuffle() {
  var shuffle = getCookie('nm_shuffle');
  if (shuffle == 'on') {
      // updating shuffle cookie and graphics
      setCookie('nm_shuffle', 'off', 7);
      document.getElementById('shufflebutton').classList.remove('active');

      // putting back original songlist
      var playmode = getCookie('nm_playmode');
      if (playmode == 'browse') {
          var songlist = JSON.parse(getCookie('nm_songs_currentsongdir'));
      } else if (playmode == 'playlist') {
          var songlist = JSON.parse(getCookie('nm_songs_playlist'));
      }

      // getting current song's index in that list
      var song = getCookie('nm_nowplaying');
      var songIdx = songlist.indexOf(song);

      // setting cookies
      setCookie('nm_songs_active', JSON.stringify(songlist), 7);
      setCookie('nm_songs_active_idx', songIdx, 7);
  } else {
      // updating shuffle cookie and graphics
      setCookie('nm_shuffle', 'on', 7);
      document.getElementById('shufflebutton').classList.add('active');

      // randomising active songlist
      var songlist = JSON.parse(getCookie('nm_songs_active'));
      var songlist = shuffleArray(songlist);

      // getting current song's index in that list
      var song = getCookie('nm_nowplaying');
      var songIdx = songlist.indexOf(song);

      // moving it to index 0
      songlist[songIdx] = songlist[0];
      songlist[0] = song;

      // setting cookies
      setCookie('nm_songs_active', JSON.stringify(songlist), 7);
      setCookie('nm_songs_active_idx', 0, 7);
  }
};

function shuffleArray(array) {
  var currentindex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentindex) {
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentindex);
      currentindex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentindex];
      array[currentindex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
  }

  return array;
};

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = 'expires=' + d.toUTCString();
  document.cookie = cname + '=' + encodeURIComponent(cvalue) + ';' + expires;
}

function getCookie(cname) {
  var name = cname + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          var result = c.substring(name.length, c.length);
          result = result.replace(/\+/g, '%20');
          return decodeURIComponent(result);
      }
  }
  return '';
};

document.addEventListener("DOMContentLoaded", function() {
  var audio = document.getElementById('audio');

  audio.addEventListener('error', function() {
      document.getElementById('error').innerHTML = 'Playback error';
      document.getElementById('error').style.display = 'block';
      setTimeout(function(){ advance('next'); }, 2000);
  });

  audio.addEventListener('ended', function() {
      advance('next');
  });


  audio.addEventListener('volumechange', function() {
      setCookie('nm_volume', audio.volume, 14);
  });

  var volume = getCookie('nm_volume');
  if (volume != null && volume) {
      audio.volume = volume;
  }

  {$onloadgoto}
}, false);

document.onkeydown = function(e){
  switch (e.keyCode) {
      case 90: // z
          advance('previous');
          break;
      case 88: // x
          document.getElementById('audio').play();
          document.getElementById('audio').fastSeek(0);
          break;
      case 67: // c
          var audio = document.getElementById('audio');
          if (audio.paused) {
              audio.play();
          } else {
              audio.pause();
          }
          break;
      case 86: // v
          document.getElementById('audio').pause();
          document.getElementById('audio').fastSeek(0);
          break;
      case 66: // b
          advance('next');
          break;
      case 37: // left
          advance('previous');
          break;
      case 39: // right
          advance('next');
          break;
  }
};

function swipedetect(el, callback){
  // based on code from JavaScript Kit @ http://www.javascriptkit.com/javatutors/touchevents2.shtml
  var touchsurface = el,
      swipedir,
      startX,
      startY,
      distX,
      distY,
      threshold = 50,
      handleswipe = callback || function(swipedir){}
  touchsurface.addEventListener('touchstart', function(e){
      var touchobj = e.changedTouches[0]
      swipedir = 'none'
      dist = 0
      startX = touchobj.pageX
      startY = touchobj.pageY
  }, false)
  touchsurface.addEventListener('touchend', function(e){
      var touchobj = e.changedTouches[0]
      distX = touchobj.pageX - startX
      distY = touchobj.pageY - startY
      if (Math.abs(distX) >= threshold && Math.abs(distX) > Math.abs(distY)){
          swipedir = (distX < 0)? 'left' : 'right'
      } else if (Math.abs(distY) >= threshold && Math.abs(distY) > Math.abs(distX)){
          swipedir = (distY < 0)? 'up' : 'down'
      }
      handleswipe(swipedir)
  }, false)
};
window.addEventListener('load', function(){
  var el = document.getElementById('interactioncontainer');
  swipedetect(el, function(swipedir){
      if (swipedir == 'left'){
          advance('next');
      } else if (swipedir == 'right'){
          advance('previous');
      }
  })
// Get and set volume with cookie
  var audio = document.getElementById('audio');
  audio.addEventListener('volumechange', function() {
      setCookie('volume', audio.volume, 14);
  });
  var volume = getCookie('volume');
  if (volume != null && volume) {
      audio.volume = volume;
  }
}, false);
