<?php

try {
  $conn = new PDO('mysql:host=localhost;dbname=springboard', 'root', 'root');
} catch (PDOException $e) {
  echo $e;
  exit('Database Error.');
}

?>
