<?php
// 1.対象のID取得
$id = $_GET['id'];

// 2.DB接続
require_once('../funcs.php');
$pdo = db_conn();

// 3.削除SQL
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id = :id");
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt -> execute();

// 4.データ削除処理後
if($status == false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
}else{
    redirect('user_select.php');
}


?>