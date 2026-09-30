<?php
  header('Content-Type: text/plain; charset=UTF-8');

  $db = new SQLite3('db.sqlite3');

  $result = $db->query('SELECT * FROM entries');
  while ($row = $result->fetchArray()) {

$text = $row['body'];
    $kai="</br>";
$url=$row['kiji'];
$link="<a href=\"$url\" target=\"_blank\">$text</a>";
    print_r($row['id']);
    print_r($kai);
    print_r($link);
    print_r($kai);
  }
