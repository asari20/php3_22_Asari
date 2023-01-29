<?php
// 1.DB接続
require_once('../funcs.php');
$pdo = db_conn();

// 2.SQL用意
$stmt = $pdo ->prepare("SELECT * FROM gs_user_table");

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

    $view .='<tr>';
    $view .='<th class="border border-gray-300">'.$result["name"].'</th>';
    $view .='<th class="border border-gray-300">'.$result["lid"].'</th>';
    $view .='<th class="border border-gray-300">'.$result["kanri_flg"].'</th>';
    $view .='<th class="border border-gray-300">'.$result["life_flg"].'</th>';
    $view .='<th class="border border-gray-300">';
    $view .= '<a href="user_detail.php?id='.$result['id'].'" 
        class="
            inline-block mr-3 mb-1
            hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
        ">
            <i class="fa-solid fa-pen"></i>
        </a>';
    $view .= '<a href="user_delete.php?id='.$result['id'].'" 
            class="inline-block mb-1
            hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
        ">
            <i class="fa-solid fa-trash"></i>
        </a>';
    $view .='</th>';
    $view .='</tr>';


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
            <a href="../index.php" 
                class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">BookMark</span>
            </a>

            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="../select.php" 
                    class="
                        mr-5
                        hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
                    ">
                    ブックマーク登録
                </a>
                <a href="./user_select.php" 
                    class="
                        mr-5
                        hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
                    "
                    hidden
                    >
                    ユーザー管理
                </a>
            </nav>
    </div>
</header>


<main>
    <table class="
        lg:w-3/4 md:w-2/3
        mx-auto mt-10
        border-collapse border border-gray-300
        text-center
    ">
        <tr class="bg-gray-100 bg-opacity-50">
            <th class="border border-gray-300">ユーザー名</th>
            <th class="border border-gray-300">ユーザーID</th>
            <th class="border border-gray-300">管理フラグ</th>
            <th class="border border-gray-300">有効フラグ</th>
            <th class="border border-gray-300">編集・削除</th>
        </tr>
        <?=$view?>
    </table>

    <button id="new_user" 
        class="
            flex
            mx-auto mt-5
            text-white text-lg
            bg-indigo-500
            rounded border-0
            py-2 px-8
            focus:outline-none hover:bg-indigo-600
        "
        onclick="userReg()"
        >
        新規ユーザー登録
    </button>




</main>

<script>
    function userReg(){
        window.location.href = 'user_register.php'
    }


</script>

</body>
</html>

