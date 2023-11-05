<?php
require_once('quiz_func.php');
$id = $_POST['id'];
$quiz = new Quiz();
$quizData = $quiz->getById($id);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集</title>
    <!-- <link rel="stylesheet" type="text/css" href="./views/css/quiz.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

</head>

<body class="overflow-x-auto w-full">
    <div class=" flex-auto flex-col items-center scroll-m-0 w-full">
        <div class="mb-3  bg-gray-500 w-full text-center py-3 text-white sticky top-0  flex flex-row justify-center items-center">

            <div  class="text-3xl">クイズ編集</div>
            <div class="  absolute right-16 ">
                <a class="bg-blue-400 hover:bg-blue-500  p-3  rounded-lg" href="./quiz_list.php">一覧に戻る</a>


            </div>
        </div>

        <form action="quiz_edit_done.php" method="POST" enctype="multipart/form-data">

            <table class="left-12 border-collapse border border-slate-400">
                <thead>
                    <tr>
                        <td class="border border-slate-300 text-center font-bold py-3">ID</td>
                        <td class="border border-slate-300 text-center font-bold py-3">質問</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答1</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答2</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答3</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答1の画像</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答2の画像</td>
                        <td class="border border-slate-300 text-center font-bold py-3">回答3の画像</td>
                        <td class="border border-slate-300 text-center font-bold py-3">正答番号</td>

                    </tr>
                </thead>

                <!-- ここに、データ一覧を表示 -->
                <tbody>
                    <tr>
                        <td class="border border-slate-300 text-center  py-3"><?php echo $quizData["id"]; ?></td>
                        <td class="border border-slate-300 text-center  py-3">
                            <textarea class="resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" id="" cols="" rows="" name="question"><?php echo $quizData["question"]; ?></textarea>
                        </td>
                        <td class="border border-slate-300 text-center  py-3">
                            <textarea class="resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal " cols="" rows="1" name="response_1"><?php echo $quizData["response_1"]; ?> </textarea>
                        </td>
                        <td class="border border-slate-300 text-center  py-3">
                            <textarea class="resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" cols="" rows="1" name="response_2"><?php echo $quizData["response_2"]; ?> </textarea>
                        </td>
                        <td class="border border-slate-300 text-center  py-3">
                            <textarea class="resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" cols="" rows="1" name="response_3"><?php echo $quizData["response_3"]; ?> </textarea>
                        </td>


                        <td class="border border-slate-300 text-center items-center py-3">
                            <div class="flex flex-col items-center">
                                <img class="w-36 h-28 " src="<?php echo $quizData["response_pic_1"]; ?>" alt="画像なしです">
                                <input class="text-center w-auto" type="file" value="<?php echo $quizData["response_pic_1"]; ?>" name="response_pic_1">
                                <textarea class=" mt-3 resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" name="response_pic_1_text" id="" cols="20" rows=""><?php echo $quizData["response_pic_1"]; ?>
                                </textarea>
                            </div>


                        </td>
                        <td class="border border-slate-300 text-center py-3">
                            <div class="flex flex-col items-center">
                                <img class="w-36 h-28 " src="<?php echo $quizData["response_pic_2"]; ?>" alt="画像なしです">
                                <input class="text-center" type="file" value="<?php echo $quizData["response_pic_2"]; ?>" name="response_pic_2">
                                <textarea class=" mt-3 resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" name="response_pic_2_text" id="" cols="30" rows=""><?php echo $quizData["response_pic_2"]; ?>
                            </textarea>
                            </div>

                        </td>
                        <td class="border border-slate-300 text-center py-3">
                            <div class="flex flex-col items-center">
                                <img class="w-36 h-28 " src="<?php echo $quizData["response_pic_3"]; ?>" alt="画像なしです">
                                <input class="text-center" type="file" value="<?php echo $quizData["response_pic_3"]; ?>" name="response_pic_3">
                                <textarea class=" mt-3 resize-none border rounded-md px-3 py-1 border-gray-400 hover:bg-gray-200 whitespace-normal h-auto" name="response_pic_3_text" id="" cols="30" rows=""><?php echo $quizData["response_pic_3"]; ?>
                            </textarea>
                            </div>

                        </td>


                        <td class="border border-slate-300 text-center">
                            <input class="text-center w-3" type="text" value="<?php echo $quizData["correct_answer"]; ?>" name="correct_answer">
                        </td>


                    </tr>
                </tbody>


            </table>
            <div class="flex flex-col items-center mt-3">
                
                <button class="bg-red-400 hover:bg-red-500  p-3  rounded-lg mx-3 text-white" type="submit">決定</button><input type="hidden" value="<?php echo $quizData["id"]; ?>" name="id">
            </div>
        </form>


    </div>
</body>

</html>