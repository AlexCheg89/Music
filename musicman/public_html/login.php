<?php

require './config/db.php';

session_start();
if(isset($_SESSION['Name'])) {
  header('location:user.php');
}
try {

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $user = $db->GetUser($username);

    if ($user && ($password === $user['password']) || (password_verify($password, $user['password']))) {
      $_SESSION['Name'] = $user['email'];

      // Авторизация успешна
      header('Location: /user.php');
      exit;
    } else {
      // Ошибка авторизации
      header('Location: /login.php');
    }

  }
} catch (PDOException $e) {
  die("Ошибка подключения:" . $e->getMessage());
}

?>

<?php require('components/header.php'); ?>

<main class="main">
  <section class="section-login">
    <div class="container section-login__container">
      <div class="section-login__content">
        <h2 class="title section-login__title">Вход в систему</h2>
        <form action="login.php"  method="post" class="form section-login__form">
          <label for="username" class="label form__label-email">Почта</label>
          <input type="text" class="input form__input" placeholder="Почта" id="username" name="username">
          <label for="password" class="label form__label-pass">Пароль</label>
          <input type="password"class="input form__input" placeholder="•••••••" id="password" name="password">
          <button type="submit" class="btn section-login__btn">Войти</button>
          <a class="section-login__link section-register__link" href="/register.php">Регистрация</a>
          <a class="section-login__link" href="">Забыли пароль?</a>
        </form>
      </div>
    </div>
  </section>
</main>

<?php require('components/footer.php'); ?>
