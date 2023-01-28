<?php
// 1.DB接続
require_once('funcs.php');
$pdo = db_conn();

// 2.SQL用意
$stmt = $pdo ->prepare("SELECT * FROM gs_bm_table");

// 3.実行
$status = $stmt->execute();

// 4.データ表示
$view = "";

if($status == false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
 //Selectデータの数だけ自動でループしてくれる
 while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

   $view .= '<div class="m-1 p-1 border border-gray-300 w-1/3 rounded text-center">';
   $view .= '<div class="flex justify-end">';
   $view .= '<a href="detail.php?unique_key='.$result['unique_key'].'" 
                class="inline-block mr-1 mb-1"
            >
                <i class="fa-solid fa-pen"></i>
            </a>';
   $view .= '<a href="delete.php?unique_key='.$result['unique_key'].'" 
                class="inline-block mr-1 mb-1"
            >
                <i class="fa-solid fa-trash"></i>
            </a>';
   $view .= '</div>';
   $view .= '<div class="text-center mb-1">登録日時：'.$result['indate'].'</div>';
   $view .= '<div class="text-center mb-1">タイトル：'.$result['name'].'</div>';
   $view .= '<div class="text-center mb-2">著者：'.$result['author'].'</div>';
   $view .= '<label class="
                    text-center text-white
                    bg-indigo-500
                    rounded border-0
                    py-2 px-8
                    mb-2
                    hover:bg-indigo-600 hover:cursor-pointer
                "
            >
                <a href='.$result['url'].'>リンク</a>
            </label>';
   $view .= '<div class="text-center my-2">コメント：'.$result['comment'].'</div>';
   $view .= "</div>";
 }

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c117fbda8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ブックマーク表示</title>
</head>
<body>
<header class="text-gray-600 body-font border-b border-gray-500">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a href="index.php" 
                class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">BookMark</span>
            </a>

            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="select.php" 
                    class="
                        mr-5
                        hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
                    ">
                    ブックマーク登録
                </a>
            </nav>
    </div>
</header>


<main>
    <div class="lg:w-3/4 md:w-2/3 mx-auto container px-5 py-5 mx-auto flex flex-wrap justify-center">
        <?= $view?>
    </div>
</main>


</body>
</html>

