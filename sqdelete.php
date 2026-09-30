<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])
   && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{

  if (isset($_POST['request']))
  {
      echo $_POST['request'];

  }
  else
  {
      echo 'not found.';
  }
}







  $title = date('Y年m月d日 H時i分s秒');
  //$body = $_SERVER["REMOTE_ADDR"];
  $body = $_POST['request'];
  $kiji = $_POST['action'];
  $delno = (int)$_POST['delno'];
  $db = new SQLite3('db.sqlite3');
  $db->exec('CREATE TABLE IF NOT EXISTS entries(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, kiji TEXT, body TEXT)');

  $stmt = $db->prepare('DELETE FROM entries WHERE id = :delno');
  $stmt->bindValue(':delno', $delno, SQLITE3_TEXT);
  $stmt->bindValue(':title', $title, SQLITE3_TEXT);
  $stmt->bindValue(':kiji', $kiji, SQLITE3_TEXT);
  $stmt->bindValue(':body', $body, SQLITE3_TEXT);
  $stmt->execute();

  $msg="DBに書き込みました";
  echo  $msg;