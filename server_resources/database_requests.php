<?
class DatabaseRequests {
  static function get_value($mysql_connection, $table, $node) {
    $query = mysqli_query($mysql_connection, "SELECT $node FROM $table") or die(mysqli_error($mysql_connection));
    $query_row = mysqli_fetch_assoc($query);

    return $query_row[$node];
  }

  static function get_value_by_filter($mysql_connection, $table, $row, $node, $filter) {
    $query = mysqli_query($mysql_connection, "SELECT $row FROM $table WHERE $node = '$filter'") or die(mysqli_error($mysql_connection));
    $query_row = mysqli_fetch_assoc($query);

    return $query_row[$row];
  }

  static function check_existance($mysql_connection, $table, $node, $value) {
    $query = mysqli_query($mysql_connection, "SELECT * FROM $table WHERE $node = '$value'") or die(mysqli_error($mysql_connection));
    $count = mysqli_num_rows($query);

    if ($count > 0) {
      return true;
    }
    else {
      return false;
    }
  }
}
?>
