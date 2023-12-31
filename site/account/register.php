<?php
require "../../global.php";
require "../../dao/user.php";

extract($_POST);

$error = [];

if ($_POST) {
  if ($password !== $passwordConfirm) {
    $error['password'] = "Password";
  } else {
    if (users_exist($email)) {
      $error['exist'] = "Email is exist";
    } else {
      users_insert($fullname, $email, $password);
      include './popup.php';

    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../output.css" />
  <script src="./script.js" defer></script>
  <title>Đăng kí</title>
</head>

<style></style>

<body>
  <section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="/site/homepage/index.php" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
        <svg class=" fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24">
          <path
            d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
        </svg>
        Men's Fashion
      </a>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
            Đăng kí tài khoản mới
          </h1>
          <form class="space-y-4 md:space-y-6" action="" method="post">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
              <input type="email" name="email" id="email" value="<?= $email ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="name@company.com" required="" />
              <?php if (isset($error['exist'])) {
                echo '<p class="alert">Email is exist, please choose another email</p>';
              } ?>
            </div>
            <div>
              <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 ">Họ và tên</label>
              <input type="fullname" name="fullname" id="fullname" value="<?= $fullname ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="Họ tên của bạn" required="" />
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Mật khẩu</label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-[#2563eb] block w-full p-2.5"
                required="" />
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Xác nhận mật
                khẩu</label></label>
              <input type="password" name="passwordConfirm" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-[#2563eb] block w-full p-2.5"
                required="" />
              <?php if (isset($error['password'])) {
                echo '<p class="alert">Passwords must be the same</p>';
              } ?>
            </div>
            <button type="submit"
              class="w-full text-white bg-[#2563eb] hover:bg-[#1d4ed8] rounded-lg text-sm px-5 py-4 text-center">
              Đăng nhập
            </button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
              Đã có tài khoản?
              <a href="./login.php" class="font-medium text-[#2563eb] hover:underline">Đăng nhập</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>