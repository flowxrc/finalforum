<?
function list_threads($mysql_connection) {
  $query = mysqli_query($mysql_connection, "SELECT * FROM web_threads ORDER BY creation_date DESC LIMIT 10");
  $count = mysqli_num_rows($query);
  if ($count > 0)
  {
    while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <div class='bg-light p-3 mb-3'>
          <h3 class='m-0'><a href="/pages/threads?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h3>
          <? $author_id = DatabaseRequests::get_value_by_filter($mysql_connection, "web_users", "id", "username", $row['author']); ?>
          <small>by <a href="/pages/users?id=<?= $author_id  ?>"><?= $row['author'] ?></a></small>
        </div>
      <?
    }

    return true;
  }
  else {
    return false;
  }
}

function get_thread_information($mysql_connection, $id) {
  $name = DatabaseRequests::get_value_by_filter($mysql_connection, "web_threads", "name", "id", $id);
  $author = DatabaseRequests::get_value_by_filter($mysql_connection, "web_threads", "author", "id", $id);
  $content = DatabaseRequests::get_value_by_filter($mysql_connection, "web_threads", "content", "id", $id);
  $creation_date = DatabaseRequests::get_value_by_filter($mysql_connection, "web_threads", "creation_date", "id", $id);

  $thread_info = [
    'id' => $id,
    'name' => $name,
    'author' => $author,
    'content' => $content,
    'creation_date' => $creation_date,
  ];
  return $thread_info;
}

if (isset($_POST['ff_new_thread'])) {
  $name = $_POST['ff_title'];
  $author = $_SESSION['username'];
  $content = $_POST['ff_content'];
  //$parent = $_POST['t_parent'];
  $date = date("y-m-d H:i:s");

  if ($_SESSION['username']) {
    mysqli_query($mysql_connection, "INSERT INTO web_threads (name, author, content, parent_id, creation_date) VALUES ('$name', '$author', '$content', '0', '$date')") or die(mysqli_error($mysql_connection));
  }
}
?>
