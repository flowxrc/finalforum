<?
session_start();

function set_user_session($username, $email, $regdate) {
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $email;
  $_SESSION['regdate'] = $regdate;
  header('location: /pages/my');
}

function unset_user_session() {
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['regdate']);
}

// Check if account exists when updating page, if it doesn't, log user out
/*if ($_SESSION['username'] || $_SESSION['email'] || $_SESSION['regdate']) {
  $username_exists = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "username", "username", $_SESSION['username']);
  $email_exists = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "email", "username", $_SESSION['username']);
  $regdate_exists = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "regdate", "username", $_SESSION['username']);

  if ($username_exists != true) {
    unset_user_session();
  }
  if ($email_exists != true) {
    unset_user_session();
  }
  if ($regdate_exists != true) {
    unset_user_session();
  }
}*/

if (isset($_POST['ff_login'])) {
  $username = $_POST['ff_username'];
  $password = md5($_POST['ff_password']);

  if (DatabaseRequests::check_existance($mysql_connection, "web_users", "username", $username) == true) {
    if (DatabaseRequests::check_existance($mysql_connection, "web_users", "password", $password) == true) {
      $email = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "email", "username", $username);
      $regdate = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "regdate", "username", $username);
      set_user_session($username, $email, $regdate);
    }
  }
}

if (isset($_POST['ff_register'])) {
  $username = $_POST['ff_username'];
  $password = md5($_POST['ff_password']);
  $confirm_password = md5($_POST['ff_c_password']);
  $email = $_POST['ff_email'];
  $regdate = date("y-m-d");

  if (DatabaseRequests::check_existance($mysql_connection, "web_users", "username", $username) != true && DatabaseRequests::check_existance($mysql_connection, "web_users", "email", $email) != true && $password == $confirm_password) {
    mysqli_query($mysql_connection, "INSERT INTO web_users (username, email, password, regdate) VALUES ('$username', '$email', '$password', '$regdate')");
    set_user_session($username, $email, $regdate);
  }
}

if (isset($_POST['ff_logout'])) {
  unset_user_session();
  session_destroy();
}
?>
