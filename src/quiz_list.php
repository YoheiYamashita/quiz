<?php
require_once('quiz_func.php');
$quiz = new Quiz();
$quizData = $quiz->getAll();

// var_dump($quizData);


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ一覧および編集</title>
    <!-- <link rel="stylesheet" type="text/css" href="./views/css/list.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">


</head>

<body>
    <div class="container flex flex-col items-center">


        <div class="mb-3  bg-gray-500 w-screen text-center py-3 text-white sticky top-0  flex flex-row justify-center items-center">
            <div class="text-3xl">クイズ一覧</div>
            <div class="absolute right-16 "> <a class="ml-32 bg-blue-400 hover:bg-blue-500 p-3 rounded-lg " href="./quiz_admin.php">管理トップページに戻る</a></div>

        </div>
        <table class="table-auto border-collapse border border-slate-400 w-auto" border="1" style="border-collapse: collapse">
            <thead>
                <tr align="center">
                    <td class="border border-slate-300 text-center font-bold py-3">ID</td>
                    <td class="border border-slate-300 text-center font-bold py-3">質問</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答1</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答2</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答3</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答1の画像</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答2の画像</td>
                    <td class="border border-slate-300 text-center font-bold py-3">回答3の画像</td>
                    <td class="border border-slate-300 text-center font-bold py-3"> 正答番号</td>

                </tr>
            </thead>

            <!-- ここに、データ一覧を表示 -->
            <tbody>
                <?php foreach ($quizData as $quiz) : ?>

                    <tr>
                        <td class="border border-slate-300 text-center  py-3"><?php echo $quiz["id"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3" style="max-width: 150px;"><?php echo $quiz["question"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3" style="max-width: 150px;"><?php echo $quiz["response_1"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3" style="max-width: 150px;"><?php echo $quiz["response_2"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3" style="max-width: 150px;"><?php echo $quiz["response_3"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3 content-center">
                            <div class="w-">
                                <img class="w-36 h-28 " src="<?php echo $quiz["response_pic_1"]; ?>" alt="画像なし">
                            </div>

                            <div class="break-words text-xs">
                                <?php echo $quiz["response_pic_1"]; ?>
                            </div>
                        </td>
                        <td class="border border-slate-300 text-center py-3">
                            <div>
                                <img class="w-36 h-28 " src="<?php echo $quiz["response_pic_2"]; ?>" alt="画像なし">
                            </div>
                            <div class="break-words text-xs">
                                <?php echo $quiz["response_pic_2"]; ?>
                            </div>
                        </td>
                        <td class="border border-slate-300 text-centerpy-3">
                            <div>
                                <img class="w-36 h-28" src="<?php echo $quiz["response_pic_3"]; ?>" alt="画像なし">
                            </div>
                            <div class="break-words text-xs">
                                <?php echo $quiz["response_pic_3"]; ?>
                            </div>
                        </td>
                        <td class="border border-slate-300 text-center  py-3"><?php echo $quiz["correct_answer"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3 w-auto">
                            <form action="quiz_edit.php" method="POST">
                                <div>

                                    <button class="rounded-lg bg-blue-400 p-2 text-white mb-1 mx-2 block hover:bg-blue-500">編集<input type="hidden" value="<?php echo $quiz["id"]; ?>" name="id" placeholder="編集"></button>
                                </div>
                            </form>
                            <form action="quiz_delete.php" method="POST">
                                <button class="rounded-lg bg-red-400 p-2 text-white mt-1 mx-2 inline-block hover:bg-red-500">削除</button><input type="hidden" value="<?php echo $quiz["id"]; ?>" name="id" placeholder="削除">

                            </form>
                        </td>

                    </tr>
                <?php endforeach ?>


            </tbody>
        </table>

       
    </div>
</body>

</html>