<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者画面</title>
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

</head>
<body>
    <div class="container flex flex-col items-center w-screen">
    <div class="mb-3  bg-gray-500 w-screen text-center py-3 text-white sticky top-0  flex flex-row justify-center items-center">
            <div class="text-3xl">クイズ管理画面</div>
            <div class="absolute right-16"> <a class="ml-32 bg-blue-400 p-3 rounded-lg  hover:bg-blue-500" href="./index.php">クイズトップページに戻る</a></div>

        </div>

		
    <div class="rounded-full my-3 bg-blue-200 hover:bg-blue-500 hover:text-white p-2 text-black cursor-pointer">        
        <a href="./quiz_form.php" class="   ">クイズの新規作成</a>
    </div>
    <div class="rounded-full my-3 bg-blue-200 hover:bg-blue-500 hover:text-white text-black p-2 cursor-pointer">
        <a href="./quiz_list.php" class="">クイズ一覧および編集</a>
    </div>
    </div>
</body>
</html>