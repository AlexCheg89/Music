<?php
/**
 * Страница регистрации
*/

require './config/db.php';

require("components/header.php");

$db = new Database();



// Получение данных из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  // Очистка даннных от возможных вредоностных символов
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  // Проверка совпадения паролей
  if ($password !== $confirmPassword) {
    echo "Пароли не совпадают";
    die();
  }

  // Хэширование пароля
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Добавление пользователя в базу данных

  $db->CreateUser($email, $hashedPassword);

}

?>

<main class="main">

<section class="container section-login__container">
  <div class="section-login__content">
    <h2 class="title section-login__title">Регистрация</h2>
    <form action="register.php" method="post" class="form section-login__form">
      <label for="email" class="label form__label-email">Почта</label>
      <input type="text"class="input form__input" placeholder="example@example.com" id="email" name="email">
      <label for="password" class="label form__label-pass">Пароль</label>
      <input type="password"class="input form__input" placeholder="•••••••" id="password" name="password">
      <label for="confirm_password" class="label form__label-pass">Повторный пароль</label>
      <input type="password"class="input form__input" placeholder="•••••••" id="confirm_password" name="confirm_password">
      <label class="custom-checkbox">
        <input type="checkbox" class="custom-checkbox__field">
        <span class="custom-checkbox__content">Нажимая на кнопку "Зарегистрироваться" я даю согласие на обработку персональных данных</span>
      </label>
      <button class="btn section-login__btn">Зарегистрироваться</button>
    </form>
  </div>
</section>

</main>
<?php require('componets/footer.php') ?>
