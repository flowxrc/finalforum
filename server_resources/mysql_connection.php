<?
$mysql = [
  'sql_host' => 'localhost',
  'sql_user' => 'root',
  'sql_password' => 'root',
  'sql_database' => 'finalforum',
];

$mysql_connection = mysqli_connect($mysql['sql_host'], $mysql['sql_user'], $mysql['sql_password'], $mysql['sql_database']);
?>
