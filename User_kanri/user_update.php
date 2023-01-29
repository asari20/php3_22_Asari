<?php
// 1.POSTデータ取得
$id = $_POST['id'];
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];

// 2.DB接続
require_once("../funcs.php");
$pdo = db_conn();

// 3.SQL文用意（update）
$stmt = $pdo->prepare(
    "UPDATE gs_user_table
    SET name = :name, lid = :lid, lpw = :lpw, kanri_flg = $kanri_flg, life_flg = $life_flg
    WHERE id = :id

");

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);

$status = $stmt->execute();


// 4.データ登録
if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
}else{
    //５．select.phpへリダイレクト
    redirect('user_select.php');
}



?>