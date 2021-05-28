<?
class DatabaseRequests {
  static function get_value($mysql_connection, $table, $node) {
    $query = mysqli_query($mysql_connection, "SELECT $node FROM $table") or die(mysqli_error($mysql_connection));
    $query_row = mysqli_fetch_assoc($query);
    return $query_row[$node];
  }
}
?>
