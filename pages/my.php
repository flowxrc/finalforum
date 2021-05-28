<?
require_once('../server_resources/client_includes.php');
if (empty($_SESSION['username'])) {
  header('location: /pages/login');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $config['board_title'] ?> - <?= $phrases['page_profile'] ?></title>
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

      <div class='bg-light p-3 mb-3'>
        <h3 class='m-0'><?= $phrases['header_profile'] ?> - <?= $_SESSION['username'] ?></h3>
        <small><?= $phrases['caption_regdate'] ?> - <?= DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "regdate", "username", $_SESSION['username']) ?></small>
        <br>
        <form method="post">
          <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="ff_logout" id="ff_logout" type="submit"><?= $phrases['button_logout'] ?></button>
        </form>
      </div>

      <!-- FOOTER START -->
      <? require_once('../client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
