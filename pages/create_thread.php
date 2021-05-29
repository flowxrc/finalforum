<?
require_once('../server_resources/client_includes.php');
if (empty($_SESSION['username'])) {
  header('location: /pages/my');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $config['board_title'] ?> - <?= $phrases['page_create_thread'] ?></title>
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
        <h4><?= $phrases['header_create_thread'] ?></h4>
        <input placeholder="<?= $phrases['form_thread_title'] ?>" id="ff_title" name="ff_title" class="form-control text-ltr" size="70" style="margin-bottom: 15px;">
        <textarea placeholder="<?= $phrases['form_thread_content'] ?>" id="ff_content" name="ff_content" type="password" class="form-control text-ltr" size="70" style="margin-bottom: 15px;"></textarea>
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="ff_new_thread" id="ff_new_thread" type="submit"><?= $phrases['button_create_thread'] ?></button>
      </form>
      <!-- FORM END -->

      <!-- FOOTER START -->
      <? require_once('../client_resources/view/footer.php'); ?>
      <!-- FOOTER END -->
    </div>
  </body>
</html>
