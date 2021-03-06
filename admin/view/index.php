<?php
require_once("../../backend/includes.php");
if (empty($_SESSION['npb-5jkl'])) {
  header('location: /');
}
$token = mysqli_query($sql, "SELECT token FROM ff_api_tokens");
$row = mysqli_fetch_assoc($token);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_admin ?></title>
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
        <?php include('../../frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_admin ?></h2><div class="alert alert-info"><?php echo $board_msg ?></div>
      <!-- SUBHEADER START -->

      <!-- ADMIN PANEL START -->
      <form method="post">
        <div class="bg-light p-3 mb-3">
          <h4><?php echo $locale_board_info ?></h4>
          <p><?php echo $locale_board_title ?></p>
          <input placeholder="<?php echo $locale_board_title ?>" id="board_title" value="<?php echo $board_title ?>" name="board_title" class="form-control text-ltr" size="70">
          <br>
          <p><?php echo $locale_board_message ?></p>
          <input placeholder="<?php echo $locale_board_message ?>" id="board_message" value="<?php echo $board_msg ?>" name="board_message" class="form-control text-ltr" size="70">
          <br>
          <p><?php echo $locale_language ?></p>
          <select id="board_locale" name="board_locale" class="form-control text-ltr"><option value="en">English (EN)</option><option value="ru">Русский (RU)</option></select>
          <br>
          <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="change_board" id="change_board" type="submit"><?php echo $locale_save ?></button>
        </div>
      </form>
      <div class="bg-light p-3 mb-3">
        <h4><?php echo $locale_token; ?></h4>
        <p><?php echo $row['token']; ?></p>
      </div>
      <?php
      if (isset($_POST['change_board'])) {
        $new_bt = mysqli_real_escape_string($sql, $_POST['board_title']);
        $new_bm = mysqli_real_escape_string($sql, $_POST['board_message']);
        $new_bl = mysqli_real_escape_string($sql, $_POST['board_locale']);

        $query_1 = mysqli_query($sql, "UPDATE ff_config SET board_title='$new_bt', board_msg='$new_bm' WHERE id='1'");

        // switch lang
        $filename1 = "../../backend/langs/config.php";
        $FileHandle1 = fopen($filename1, 'w');
        $container1 = "<?php
require(\"" . $new_bl . ".php\");
?>";
        fwrite($FileHandle1, $container1);
        fclose($FileHandle1);
      }
      ?>
      <h4><?php echo $locale_threads ?></h4>
      <?php renderAdminThreads(); echo $locale_no_more_threads; ?>
      <br><br>
      <h4><?php echo $locale_replies ?></h4>
      <?php renderAdminReplies(); echo $locale_no_more_replies; ?>
      <br><br>
      <h4><?php echo $locale_users ?></h4>
      <?php renderUsers(); echo $locale_no_more_users; ?>
      <br><br>
      <h4><?php echo $locale_admins ?></h4>
      <div class="bg-light p-3 mb-3">
        <h4><?php echo $locale_create_admin ?></h4>
        <form method="post">
          <input placeholder="<?php echo $locale_username ?>" id="admin_username" name="admin_username" class="form-control text-ltr" size="70">
          <br>
          <input placeholder="<?php echo $locale_password ?>" id="admin_password" name="admin_password" class="form-control text-ltr" size="70">
          <br>
          <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="admin_create" id="admin_create" type="submit"><?php echo $locale_create ?></button>
        </form>
      </div>
      <?php renderAdmins(); echo $locale_no_more_admins; ?>
      <br><br>
      <form method="post">
        <div class="bg-light p-3 mb-3">
          <h4><?php echo $locale_exit ?></h4>
          <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="admin-logout" id="admin-logout" type="submit"><?php echo $locale_exit ?></button>
        </div>
      </form>
      <!-- ADMIN PANEL END -->
      <?php include('../../frontend/footer.php') ?>
    </div>
  </body>
</html>
