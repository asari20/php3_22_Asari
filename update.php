<?php
// 1.POSTデータ取得
$key = $_POST['key'];
$name = $_POST["name"];
$author = $_POST["author"];
$url = $_POST["url"];
$comment = $_POST["comment"];

// 2.DB接続
require_once('funcs.php');
$pdo = db_conn();

// 3.データ更新SQL作成
$stmt = $pdo->prepare(
    "UPDATE gs_bm_table
    SET name=:name, author=:author, url=:url, comment=:comment, indate=sysdate()
    WHERE unique_key=:key
");

$stmt->bindValue(':key', $key, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

// 4.データ登録
if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
}else{
    //５．select.phpへリダイレクト
    redirect('select.php');
}


?>