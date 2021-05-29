<? require_once('server_resources/client_includes.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $config['board_title'] ?> - <?= $phrases['page_home'] ?></title>
    <link rel="stylesheet" href="/client_resources/css/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?= $config['board_title'] ?></h1>
          <? require_once('client_resources/view/navbar.php'); ?>
        </div>
      </div>
      <!-- HEADER END -->

      <!-- CONTENT START -->
      <?
      if (!empty($_SESSION['username'])) {
        ?>
        <div class='bg-light p-3 mb-3'>
          <h3 class='m-0' style="display: inline;"><?= $phrases['notify_threads'] ?></h3>
          <form method="post" style="display: inline; float: right;" action="/pages/create_thread">
            <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" type="submit"><?= $phrases['button_create_thread'] ?></button>
          </form>
        </div>
        <?
      }
      else {
        ?>
        <div class='bg-light p-3 mb-3'>
          <h3 class='m-0' style="display: inline;"><?= $phrases['notify_threads'] ?></h3>
          <form method="post" style="display: inline; float: right;" action="/pages/register">
            <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" type="submit"><?= $phrases['button_register'] ?></button>
          </form>
        </div>
        <?
      }
      ?>

      <?
      if (list_threads($mysql_connection) == false) {
        echo $phrases['notify_nothreads'];
      }
      ?>
      <!-- CONTENT END -->

      <!-- FOOTER START -->
      <? require_once('client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
