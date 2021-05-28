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

      <!-- FOOTER START -->
      <? require_once('client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
