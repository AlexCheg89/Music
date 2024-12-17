<?php

$db = new Database();

$performer = $db->GetData(null, 'performer');

?>

<section class="menu-music">
  <h2 class="title menu-music__title">Исполнители</h2>
  <ul class="menu-music__list menu-music-list list-reset">
    <?php
      foreach ($performer as $row) {
        ?>
          <li class="menu-music-list__item">
            <a href="band.php?id=<?=$row['id'];?>" class="menu-music-list__link">
              <div>
                <img class="menu-music-list__img" src="<?=$row['performerPath_image']; ?>" alt="<?=$row['name']; ?>">
                <h3 class="menu-music-list__name"><?=$row['performerName']; ?></h3>
              </div>
              <button class="menu-music-list__btn">
                <img src="/img/svg/more.svg" alt="">
              </button>
            </a>
          </li>
        <?php } ?>
  </ul>
</section>
