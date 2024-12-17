<?php

$db = $db = new Database();

$songs = $db->GetSongsList();
?>

<div id="stickycontainer">
  <div id="playercontainer">
    <div id="player">
      <div id="albumart"></div>
      <?php
      foreach ($songs as $row) { ?>
      <div id="song">
        <div id="songinfo">
          <div id="songTitle"><b><?= $row ["songName"]; ?></b></div>
          <div id="artist"><?= $row["performerName"]; ?></div>
          <div id="album"><?= $row["songAlbum"]; ?><span id="year">2024</span></div>
        </div>
        <div id="audiocontainer">
          <audio id="audio" autoplay controls<?=$row["songPath"]; ?>></audio>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <div id="divider"></div>
  <div id="error">{$error}</div>
  <div id="interactioncontainer"></div>
</div>
