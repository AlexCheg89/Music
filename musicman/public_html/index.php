<?php
  require 'components/header.php';
?>

<main class="main">
  <div class="container main__container">
    <section class="menu">
      <h2 class="title menu__title">Menu</h2>
      <ul class="menu__list menu-list list-reset">
        <li class="menu-list__item">
          <a href="" class="menu-list__link">
            <svg width="17" height="18" viewBox="0 0 17 18" fill="" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.49999 8.88835C10.6783 8.88835 12.4442 7.12248 12.4442 4.94417C12.4442 2.76587 10.6783 1 8.49999 1C6.32169 1 4.55582 2.76587 4.55582 4.94417C4.55582 7.12248 6.32169 8.88835 8.49999 8.88835Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M16 16.7767C15.4905 15.1879 14.4897 13.802 13.1417 12.8187C11.7938 11.8355 10.1685 11.3056 8.5 11.3056C6.83155 11.3056 5.2062 11.8355 3.85827 12.8187C2.51035 13.802 1.50949 15.1879 1 16.7767H16Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Profile</span>
          </a>
        </li>
        <li class="menu-list__item">
          <a href="" class="menu-list__link menu-list__link--active">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.61538 1H2.15385C1.51659 1 1 1.51659 1 2.15385V5.61538C1 6.25264 1.51659 6.76923 2.15385 6.76923H5.61538C6.25264 6.76923 6.76923 6.25264 6.76923 5.61538V2.15385C6.76923 1.51659 6.25264 1 5.61538 1Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14.8462 1H11.3846C10.7474 1 10.2308 1.51659 10.2308 2.15385V5.61538C10.2308 6.25264 10.7474 6.76923 11.3846 6.76923H14.8462C15.4834 6.76923 16 6.25264 16 5.61538V2.15385C16 1.51659 15.4834 1 14.8462 1Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M5.61538 10.2308H2.15385C1.51659 10.2308 1 10.7474 1 11.3846V14.8461C1 15.4834 1.51659 16 2.15385 16H5.61538C6.25264 16 6.76923 15.4834 6.76923 14.8461V11.3846C6.76923 10.7474 6.25264 10.2308 5.61538 10.2308Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14.8462 10.2308H11.3846C10.7474 10.2308 10.2308 10.7474 10.2308 11.3846V14.8461C10.2308 15.4834 10.7474 16 11.3846 16H14.8462C15.4834 16 16 15.4834 16 14.8461V11.3846C16 10.7474 15.4834 10.2308 14.8462 10.2308Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="menu-list__item">
          <a href="" class="menu-list__link">
            <svg width="17" height="15" viewBox="0 0 17 15" fill="" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.50472 13.518L2.13916 7.75207C-1.32038 4.29253 3.76514 -2.34979 8.50472 3.02403C13.2443 -2.34979 18.3068 4.31559 14.8703 7.75207L8.50472 13.518Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Favorite</span>
          </a>
        </li>
      </ul>

      <h2 class="title menu__title">Help</h2>
      <ul class="menu__list menu-list list-reset">
        <li class="menu-list__item">
          <a href="" class="menu-list__link">
            <svg width="17" height="18" viewBox="0 0 17 18" fill="" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.27561 3.19925L6.816 1.8043C6.90714 1.56812 7.06748 1.36496 7.27602 1.22145C7.48457 1.07793 7.73159 1.00075 7.98475 1H9.01525C9.26841 1.00075 9.51543 1.07793 9.72398 1.22145C9.93252 1.36496 10.0929 1.56812 10.184 1.8043L10.7244 3.19925L12.5592 4.25489L14.0421 4.02868C14.289 3.99517 14.5404 4.03582 14.7641 4.14546C14.9879 4.25511 15.174 4.4288 15.2988 4.64448L15.8015 5.52418C15.9303 5.74328 15.9897 5.9963 15.9717 6.24983C15.9538 6.50336 15.8594 6.74549 15.701 6.94427L14.7836 8.11301V10.2243L15.7261 11.393C15.8845 11.5918 15.9789 11.8339 15.9969 12.0875C16.0148 12.341 15.9555 12.594 15.8267 12.8131L15.324 13.6928C15.1991 13.9085 15.013 14.0822 14.7893 14.1918C14.5655 14.3015 14.3142 14.3421 14.0672 14.3086L12.5843 14.0824L10.7495 15.1381L10.2091 16.533C10.118 16.7692 9.95766 16.9723 9.74911 17.1159C9.54057 17.2594 9.29354 17.3366 9.04039 17.3373H7.98475C7.73159 17.3366 7.48457 17.2594 7.27602 17.1159C7.06748 16.9723 6.90714 16.7692 6.816 16.533L6.27561 15.1381L4.44081 14.0824L2.95788 14.3086C2.71096 14.3421 2.45965 14.3015 2.23588 14.1918C2.01211 14.0822 1.82599 13.9085 1.70117 13.6928L1.19848 12.8131C1.06967 12.594 1.01032 12.341 1.02827 12.0875C1.04622 11.8339 1.14062 11.5918 1.29902 11.393L2.21642 10.2243V8.11301L1.27389 6.94427C1.11549 6.74549 1.02109 6.50336 1.00314 6.24983C0.985189 5.9963 1.04454 5.74328 1.17335 5.52418L1.67603 4.64448C1.80086 4.4288 1.98698 4.25511 2.21074 4.14546C2.43451 4.03582 2.68583 3.99517 2.93275 4.02868L4.41567 4.25489L6.27561 3.19925ZM5.98657 9.16865C5.98657 9.66576 6.13398 10.1517 6.41016 10.565C6.68634 10.9784 7.07888 11.3005 7.53815 11.4908C7.99742 11.681 8.50279 11.7308 8.99035 11.6338C9.4779 11.5368 9.92575 11.2974 10.2773 10.9459C10.6288 10.5944 10.8682 10.1466 10.9651 9.659C11.0621 9.17144 11.0123 8.66607 10.8221 8.2068C10.6319 7.74753 10.3097 7.35499 9.89639 7.07881C9.48306 6.80263 8.99711 6.65522 8.5 6.65522C7.8334 6.65522 7.1941 6.92003 6.72274 7.39139C6.25138 7.86275 5.98657 8.50205 5.98657 9.16865V9.16865Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Settings</span>
          </a>
        </li>
        <li class="menu-list__item">
          <a href="" class="menu-list__link">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.15385 7.34613H3.30769C3.4607 7.34613 3.60744 7.40691 3.71564 7.51511C3.82383 7.6233 3.88462 7.77004 3.88462 7.92305V10.8077C3.88462 10.9607 3.82383 11.1074 3.71564 11.2156C3.60744 11.3238 3.4607 11.3846 3.30769 11.3846H2.15385C1.84783 11.3846 1.55434 11.263 1.33795 11.0466C1.12157 10.8302 1 10.5368 1 10.2307V8.49998C1 8.19396 1.12157 7.90047 1.33795 7.68408C1.55434 7.4677 1.84783 7.34613 2.15385 7.34613V7.34613Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14.8461 11.3846H13.6923C13.5393 11.3846 13.3925 11.3238 13.2844 11.2156C13.1762 11.1074 13.1154 10.9607 13.1154 10.8077V7.92307C13.1154 7.77007 13.1762 7.62332 13.2844 7.51513C13.3925 7.40693 13.5393 7.34615 13.6923 7.34615H14.8461C15.1522 7.34615 15.4457 7.46772 15.662 7.68411C15.8784 7.90049 16 8.19398 16 8.5V10.2308C16 10.5368 15.8784 10.8303 15.662 11.0467C15.4457 11.263 15.1522 11.3846 14.8461 11.3846V11.3846Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M11.3846 14.5577C11.9967 14.5577 12.5836 14.3146 13.0164 13.8818C13.4492 13.449 13.6923 12.862 13.6923 12.25V11.3846" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M9.94231 13.1154C10.3248 13.1154 10.6917 13.2673 10.9622 13.5378C11.2327 13.8083 11.3846 14.1752 11.3846 14.5577C11.3846 14.9402 11.2327 15.3071 10.9622 15.5776C10.6917 15.848 10.3248 16 9.94231 16H8.21154C7.82901 16 7.46216 15.848 7.19167 15.5776C6.92119 15.3071 6.76923 14.9402 6.76923 14.5577C6.76923 14.1752 6.92119 13.8083 7.19167 13.5378C7.46216 13.2673 7.82901 13.1154 8.21154 13.1154H9.94231Z" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.30769 7.34615V6.19231C3.30769 4.81522 3.85474 3.49454 4.82849 2.52079C5.80223 1.54705 7.12292 1 8.5 1C9.87709 1 11.1978 1.54705 12.1715 2.52079C13.1453 3.49454 13.6923 4.81522 13.6923 6.19231V7.34615" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6.76923 5.03845V6.76922" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.2308 5.03845V6.76922" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6.76923 9.07693C6.76923 10.6116 10.2308 10.6116 10.2308 9.07693" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>FAQs</span>
          </a>

        </li>
      </ul>
    </section>

    <div class="content">
      <section class="genre">
        <div class="container genre__container">
          <h2 class="title genre__title">Discover genre</h2>
          <ul class="genre__list genre-list">
            <li class="genre-list__item list-reset">
              <img class="genre-list__img" src="/img/Acoustic.jpg" alt="Acoustic">
              <div class="genre-list__content">
                <div>
                  <h3 class="genre-list__title">Acoustic</h3>
                  <p class="genre-list__quantity">120 tracks</p>
                </div>
                <img src="/img/svg/genre_play.svg" alt="play">
              </div>
            </li>
            <li class="genre-list__item list-reset">
              <img class="genre-list__img" src="/img/Death_Metal.jpg" alt="Death Metal">
              <div class="genre-list__content">
                <div>
                  <h3 class="genre-list__title">Death Metal</h3>
                  <p class="genre-list__quantity">180 tracks</p>
                </div>
                <img src="/img/svg/genre_play.svg" alt="play">
              </div>
            </li>
            <li class="genre-list__item list-reset">
              <img class="genre-list__img" src="/img/Pop.jpg" alt="Pop">
              <div class="genre-list__content">
                <div>
                  <h3 class="genre-list__title">Pop</h3>
                  <p class="genre-list__quantity">200 tracks</p>
                </div>
                <img src="/img/svg/genre_play.svg" alt="play">
              </div>
            </li>
          </ul>
          <a class="genre__link" href="">show more &gt;&gt;</a>
        </div>
      </section>

      <section class="topmusic">
        <div class="container topmusic__container">
          <h2 class="title topmusic__title">Top music</h2>
          <ul class="topmusic__list topmusic-list list-reset">
            <li class="topmusic-list__item">
              <a href="" class="topmusic-list__link">
                <span>01</span>
                <img src="" alt="">
                <p>Name</p>
                <span>time</span>
              </a>
            </li>
            <li class="topmusic-list__item">
              <a href="" class="topmusic-list__link">
                <span>dsdsd</span>
                <img src="" alt="">
                <p>Name1566</p>
                <span>time</span>
              </a>
            </li>
          </ul>
        </div>
      </section>

    </div>

    <section class="menu-music">
      <h2 class="title menu-music__title">Artist</h2>
      <ul class="menu-music__list menu-music-list list-reset">
        <li class="menu-music-list__item">
          <a href="" class="menu-music-list__link">
            <div>
              <img class="menu-music-list__img" src="/img/jackie_burhan.png" alt="">
              <h3 class="menu-music-list__name">jackie burhan</h3>
            </div>

            <button class="menu-music-list__btn">
              <img src="/img/svg/more.svg" alt="">
            </button>
          </a>
        </li>
        <li class="menu-music-list__item">
          <a href="" class="menu-music-list__link">
            <div>
              <img src="/img/jackie_burhan.png" alt="">
              <h3 class="menu-music-list__name">Jackie Burhan</h3>
            </div>
            <button class="menu-music-list__btn">
              <img src="/img/svg/more.svg" alt="">
            </button>
          </a>
        </li>
        <li class="menu-music-list__item">
          <a href="" class="menu-music-list__link">
            <div>
              <img src="/img/Maria.png" alt="">
              <h3 class="menu-music-list__name">Maria</h3>
            </div>
            <button class="menu-music-list__btn">
              <img src="/img/svg/more.svg" alt="">
            </button>
          </a>
        </li>
        <li class="menu-music-list__item">
          <a href="/img/jackie_burhan.png" class="menu-music-list__link">
            <div>
              <img src="/img/jackie_burhan.png" alt="">
              <h3 class="menu-music-list__name">Jackie burhan</h3>
            </div>
            <button class="menu-music-list__btn">
              <img src="/img/svg/more.svg" alt=""> </button>
          </a>
        </li>
        <li class="menu-music-list__item">
          <a href="" class="menu-music-list__link">
            <div>
              <img src="/img/jackie_burhan.png" alt="">
              <h3 class="menu-music-list__name">jackie burhan</h3>
            </div>

            <button class="menu-music-list__btn">
              <img src="/img/svg/more.svg" alt="">
            </button>
          </a>
        </li>
      </ul>
    </section>

  </div>
</main>

<?php
  require 'components/footer.php';
?>