<?php
  // DB接続はajax.phpと重複するからdbconnect.phpみたいなファイル作って移動が良いと思う。
  // インデント4つがいいかも
  $dsn = 'mysql:dbname=phpajax;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES UTF8MB4');

  $selection = $dbh->prepare('SELECT * FROM chat');
  $selection->execute();
  $records = $selection->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- defer つけたほうがいいと思う -->
  <!-- https://qiita.com/phanect/items/82c85ea4b8f9c373d684 -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="./app.js"></script>
</head>
<body>
  <form action="" id="form-ajax">
    <textarea name="" id="content" cols="30" rows="10"></textarea>
    <input type="submit" value="submit">
  </form>
  <div id="container">
    <?php foreach($records as $record):?>
    <div>
      <p><?php echo $record['content'] ?></p>
    </div>
    <? endforeach;?>
  </div>
</body>
</html>