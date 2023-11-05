<?php
require_once('quiz_func.php');
$quiz=new Quiz();
$quizzes=$_POST['id'];
$result=$quiz->deleteById($quizzes);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ削除</title>
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

</head>
<body>
<div class="container flex flex-col items-center ">
        <div class="mt-3 w-auto h-auto border rounded-xl border-gray-500">



            <div class="text-2xl md:text-3xl mx-5 my-7">
                <?php echo $result ?>
            </div>
            <div class="flex flex-col items-center m-3">
                <a class="text-white bg-blue-400 hover:bg-blue-500  p-3  rounded-lg" href="./quiz_list.php">一覧に戻る</a>
            </div>
        </div>
    </div>

</body>
</html>