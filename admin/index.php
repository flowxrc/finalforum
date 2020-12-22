<?php
require('../backend/config.php');
require('../backend/langs/config.php');
require('../backend/admin.php');
require('../backend/accounts.php');
if (!empty($_SESSION['npb-5jkl'])) {
  header('location: /admin/view');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_login ?></title>
    <link rel="stylesheet" href="/frontend/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?php echo $board_title ?></h1>
          <div class="headermenu">&nbsp;</div>
        </div>
        <?php include('../frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_admin; echo " "; echo $locale_login; ?></h2><div class="alert alert-info"><?php echo $board_msg ?></div>
      <!-- SUBHEADER START -->

      <!-- FORM START -->
      <form method="post">
        <input placeholder="<?php echo $locale_username ?>" id="username" name="username" class="form-control text-ltr" size="70">
        <br>
        <input placeholder="<?php echo $locale_password ?>" id="password" type="password" name="password" class="form-control text-ltr" size="70">
        <br>
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="admin-login" id="admin-login" type="submit"><?php echo $locale_login ?></button>
      </form>
      <!-- FORM END -->
    </div>
  </body>
</html>
