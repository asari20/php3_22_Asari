<?php
// 1.POST取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$login_status = false;

// 2.DB接続
require_once("../funcs.php");
$pdo = db_conn();

// 3.SQL用意
$stmt = $pdo->prepare("SELECT lid,lpw FROM gs_user_table
    WHERE lid = :lid
");

$stmt -> bindValue(':lid',$lid,PDO::PARAM_STR);

$status = $stmt->execute();

// 4.パスワードチェック
if($status == false){
    // エラー対応
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($lpw == $result['lpw']){
            $login_status = true;
        }

    };
    
    if($login_status == true){
        redirect('../select.php');
    }else{
        echo "<script>
            alert('ユーザーID・パスワードに誤りがあります。');
            window.location.href = 'login.php'
        </script>";
    }
    
}

?>
