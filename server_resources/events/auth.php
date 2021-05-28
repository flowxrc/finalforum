<?
session_start();

function set_user_session($username) {
  $_SESSION['username'] = $username;
  header('location: /pages/my');
}

if (isset($_POST['ff_login'])) {
  $username = $_POST['ff_username'];
  $password = md5($_POST['ff_password']);

  if (DatabaseRequests::check_existance($mysql_connection, "web_users", "username", $username) == true) {
    if (DatabaseRequests::check_existance($mysql_connection, "web_users", "password", $password) == true) {
      set_user_session($username);
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
    set_user_session($username);
  }
}

if (isset($_POST['ff_logout'])) {
  unset($_SESSION['username']);
  session_destroy();
}
?>
