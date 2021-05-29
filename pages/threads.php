<?
require_once('../server_resources/client_includes.php');
$curThread = get_thread_information($mysql_connection, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $config['board_title'] ?> - <?= $curThread['name'] ?></title>
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
        <h3 class='m-0'><?= $curThread['name'] ?></h3>
        <small><?= $phrases['caption_regdate'] ?> - <?= $curThread['creation_date'] ?> by <a href="/pages/users?id=<?= DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "id", "username", $curThread['author'])  ?>"><?= $curThread['author'] ?></a></small>
        <br><br>
        <p class='m-0'><?= $curThread['content'] ?></p>
      </div>

      <!-- FOOTER START -->
      <? require_once('../client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
