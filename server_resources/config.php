<?
require_once('database_requests.php');
require_once('mysql_connection.php');

$config = [
  'board_title' => DatabaseRequests::get_value($mysql_connection, "web_configuration", "board_title"),
];
?>
