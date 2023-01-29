<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c117fbda8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ブックマーク:ログイン</title>
</head>
<body class="text-gray-600 body-font">
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
                    ブックマーク一覧
                </a>
                <a href="login.php" 
                    class="
                        mr-5
                        hover:text-gray-900 hover:cursor-pointer hover:bg-indigo-300
                    "
                    hidden
                >
                    ログイン
                </a>
            </nav>
    </div>
</header>

<main>
    <section class="container px-5 py-5 mx-auto">
        <div class="flex flex-col text-center w-full mb-5">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-700">ログイン</h1>
        </div>
        <form method="POST" action="login_act.php"  class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full flex">
                    
                    <p class="leading-7 text-sm text-gray-600 w-2/5 inline-block text-center">ユーザーID：</p>
                    <input type="text" id="lid" name="lid" 
                        class="
                            w-full
                            bg-gray-100 bg-opacity-50
                            rounded border border-gray-300
                            focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
                            text-base text-gray-700
                            py-1 px-3
                        " 
                        require
                    >

                </div>
                <div class="p-2 w-full flex">
            
                    <p class="leading-7 text-sm text-gray-600 w-2/5 text-center">パスワード:</p>
                    <input type="password" id="lpw" name="lpw" 
                        class="
                            w-full
                            bg-gray-100 bg-opacity-50
                            rounded border border-gray-300
                            focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
                            text-base text-gray-700
                            py-1 px-3
                        " 
                        require
                    >
            
                </div>
            <input type="submit" value="ログイン" 
                class="
                    flex
                    mx-auto mt-5
                    text-white text-lg
                    bg-indigo-500
                    rounded border-0
                    py-2 px-8
                    focus:outline-none hover:bg-indigo-600
                "
            >
        </form>
    </section>

    <section id="search_result" class="lg:w-3/4 md:w-2/3 mx-auto container px-5 py-5 mx-auto">
        <div class="flex flex-col text-center w-full mb-5">
            <h1 id="result_title" 
                class="
                    sm:text-3xl
                    text-2xl font-medium
                    title-font
                    mb-4
                    text-gray-700
                " 
                style="display: none;"
            >検索結果</h1>
        </div>
        <ul id="results" class="flex flex-wrap justify-center"></ul>

    </section>

</main>

</body>
</html>