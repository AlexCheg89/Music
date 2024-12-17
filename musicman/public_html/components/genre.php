<?php

$db = new Database();

$genre = $db->GetData(null, 'genre');

?>

<section class="genre">
  <div class="container genre__container">
    <h2 class="section-title title genre__title">Откройте для себя жанр</h2>

    <ul class="genre__list genre-list">
      <?php
        foreach ($genre as $row) {
          ?>
            <li class="genre-list__item list-reset">
              <img class="genre-list__img" src="<?=$row['genrePath_image']; ?>" alt="<?=$row['genreName']; ?>">
              <div class="genre-list__content">
                <div>
                  <h3 class="genre-list__title"><?=$row['genreName']; ?></h3>
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
