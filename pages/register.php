<?
require_once('../server_resources/client_includes.php');
if (!empty($_SESSION['username'])) {
  header('location: /pages/my');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $config['board_title'] ?> - <?= $phrases['page_login'] ?></title>
    <link rel="stylesheet" href="/client_resources/css/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?= $config['board_title'] ?></h1>
          <? require_once('../client_resources/view/navbar.php'); ?>
        </div>
      </div>
      <!-- HEADER END -->

      <!-- FORM START -->
      <form method="post">
        <h4><?= $phrases['header_reg'] ?></h4>
        <input placeholder="<?= $phrases['form_username'] ?>" id="ff_username" name="ff_username" class="form-control text-ltr" size="70" style="margin-bottom: 15px;">
        <input placeholder="<?= $phrases['form_email'] ?>" id="ff_email" name="ff_email" class="form-control text-ltr" size="70" style="margin-bottom: 15px;">
        <input placeholder="<?= $phrases['form_password'] ?>" id="ff_password" name="ff_password" type="password" class="form-control text-ltr" size="70" style="margin-bottom: 15px;">
        <input placeholder="<?= $phrases['form_confirm_password'] ?>" id="ff_c_password" name="ff_c_password" type="password" class="form-control text-ltr" size="70" style="margin-bottom: 15px;">
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="ff_register" id="ff_register" type="submit"><?= $phrases['button_register'] ?></button>
        <a href="/pages/login"><?= $phrases['notify_login'] ?></a>
      </form>
      <!-- FORM END -->

      <!-- FOOTER START -->
      <? require_once('../client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
