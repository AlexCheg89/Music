<?php

require './config/db.php';

$db = new Database();

$data ='genre';

$genre = $db->GetData($data);

?>

<section class="genre">
  <div class="container genre__container">
    <h2 class="title genre__title">Discover genre</h2>




    <ul class="genre__list genre-list">
      <?php
        foreach ($genre as $row) {
          ?>
            <li class="genre-list__item list-reset">
              <img class="genre-list__img" src="<?=$row['path_image']; ?>" alt="<?=$row['name']; ?>">
              <div class="genre-list__content">
                <div>
                  <h3 class="genre-list__title"><?=$row['name']; ?></h3>
                  <p class="genre-list__quantity"><?=$db->TotalSongsOfGenre($row["id"]); ?> треков</p>
                </div>
                <img src="/img/svg/genre_play.svg" alt="play">
              </div>
            </li>
          <?php } ?>
    </ul>
    <a class="genre__link" href="">show more &gt;&gt;</a>
  </div>
</section>
