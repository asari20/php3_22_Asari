<?php
// 1.POSTデータ取得
$name = $_POST["name"];
$author = $_POST["author"];
$url = $_POST["url"];
$comment = $_POST["comment"];

// 2.DB接続
require_once('funcs.php');
$pdo = db_conn();

// 3.SQL文を用意
$stmt = $pdo->prepare(
 "INSERT INTO gs_bm_table(unique_key,name,author,url,comment,indate)
  VALUES(NULL, :name, :author, :url, :comment, sysdate())
 "
);

// 4.バインド変数
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5.実行
$status = $stmt ->execute();

// 6.データ登録処理後
if($status == false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  redirect('index.php');
  
}


?>