<?php
    header("Content-type: application/json; charset=UTF-8");
    $content = $_POST['content'];
    // $list = array("content" => $content);
    $list = ["content" => $content]; // こっちのほうが今風
    
    // 別ファイルに移動したほうがよいかな
    $dsn = 'mysql:dbname=phpajax;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES UTF8MB4');

    $stmt = $dbh->prepare('INSERT INTO chat SET content=?');
    $stmt->execute([$content]);

    /**
     * 送られてきたデータがそのまま返されてるだけでちょっと気になる。
     * 本来はDBにデータ保存する箇所でtry catchして成功したら保存したデータ
     * 失敗したら失敗したよってフロントに返してあげると良いと思う。
     * 返ってきた値で画面に表示する内容もかえる。
     * 今回は本論と関係ないと思うけど一応共有
     */
    echo json_encode($list);
