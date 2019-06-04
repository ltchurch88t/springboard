<?php

class Content {
  public function fetch_all($table) {
    global $conn;

    $content_query = $conn->prepare("SELECT * from $table");
    $content_query->execute();
    return $content_query->fetchAll();
  }
}

?>
