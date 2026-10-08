<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <title>PHP ajax</title>
  <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#send').click(function() {
      var data = {
        'request' : $('#request').val(),
        'action' : $('#action').val(),
    
    };
      $.ajax({
        type: "POST",
        url: "sqwrite.php",
        data: data,
      }).success(function(data, dataType) {
        alert(data);
      }).error(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error : ' + errorThrown);
      });
      return false;
    });
    $('#read').click(function() {
      var data = {
        'request' : $('#request').val(),
        'action' : $('#action').val(),
    
    };
      $.ajax({
        type: "POST",
        url: "sqread.php",
        data: data,
      }).success(function(data, dataType) {
               var smp=document.getElementById("request1");
               smp.innerHTML = data;



      }).error(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error : ' + errorThrown);
      });
      return false;
    });

    $('#delete').click(function() {
      var data = {
        'request' : $('#request').val(),
        'action' : $('#action').val(),
        'delno' : $('#delno').val(),
    
    };
      $.ajax({
        type: "POST",
        url: "sqdelete.php",
        data: data,
      }).success(function(data, dataType) {
               var smp=document.getElementById("request1");
               smp.innerHTML = data;



      }).error(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error : ' + errorThrown);
      });
      return false;
    });


  });
  </script>
</head>
<body>
  <h1>AJAXでお気に入り登録</h1>

  <form method="post">
    <p><input id="send" value="登録" type="submit" />
    <input id="read" value="読み出し" type="submit" /></p>
    <p><textarea name="request" id="request" cols="80" rows="1">リンク名</textarea></p>
    <p><textarea name="action" id="action" cols="80" rows="1">url</textarea></p>
     <input id="delete" value="削除" type="submit" /></p>
    <p><textarea name="delno" id="delno" cols="10" rows="1">削除no</textarea></p>
  <p " id="request1" ></p>

  </form>
</body>
</html>