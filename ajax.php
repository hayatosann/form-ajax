<?php
    header("Content-type: application/json; charset=UTF-8");
    $content = $_POST['content'];
    $list = array("content" => $content);
    

    $dsn = 'mysql:dbname=phpajax;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES UTF8MB4');

    $stmt = $dbh->prepare('INSERT INTO chat SET content=?');
    $stmt->execute([$content]);

    echo json_encode($list);
