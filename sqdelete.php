<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])
   && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{

  if (isset($_POST['delete']))
  {
      echo $_POST['delete'];

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
 $delete=(int)$_POST['delete'];
  $db = new SQLite3('db.sqlite3');
  $db->exec('CREATE TABLE IF NOT EXISTS entries(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, kiji TEXT, body TEXT)');
  $stmt = $db->prepare('DELETE FROM entries WHERE id = 1’);

  $stmt->execute();

  $msg="削除しました";
$br="</br>";
echo  $msg;
echo  $br;
echo  $body;
echo  $br;
echo  $kiji;
echo  $br;
echo  $delete;
echo  $br;
