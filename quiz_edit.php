<?php
require_once('quiz_func.php');
$id = $_POST['id'];
$quiz = new Quiz();
$quizData = $quiz->getById($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./views/css/quiz.css?<?php echo date('Ymd-Hi'); ?>">

</head>

<body>
    <div>編集します</div>
    <form action="quiz_edit_done.php" method="POST" enctype="multipart/form-data">

    <table class="list-table" border="1" style="border-collapse: collapse">
        <thead>
            <tr align="center">
                <td>ID</td>
                <td>質問</td>
                <td>回答1</td>
                <td>回答2</td>
                <td>回答3</td>
                <td>回答1の画像アドレス</td>
                <td>回答2の画像アドレス</td>
                <td>回答3の画像アドレス</td>
                <td>正答番号</td>

            </tr>
        </thead>

        <!-- ここに、データ一覧を表示 -->
        <tbody>
            <tr>
                <td><?php echo $quizData["id"]; ?></td>
                <td><input type="text" value="<?php echo $quizData["question"]; ?>" name="question"></td>
                <td><input type="text" value="<?php echo $quizData["response_1"]; ?>" name="response_1" ></td>
                <td><input type="text" value="<?php echo $quizData["response_2"]; ?>" name="response_2" ></td>
                <td><input type="text" value="<?php echo $quizData["response_3"]; ?>" name="response_3" ></td>
                <div>

                    <td  class="question-image">
                        <img src="<?php echo $quizData["response_pic_1"]; ?>" alt="画像なしです">
                        <input type="file" value="<?php echo $quizData["response_pic_1"]; ?>" name="response_pic_1" >
                        <input type="text" value="<?php echo $quizData["response_pic_1"]; ?>" name="response_pic_1_text" >

                    </td>
                    <td class="question-image">
                        <img src="<?php echo $quizData["response_pic_2"]; ?>" alt="画像なしです">
                        <input type="file" value="<?php echo $quizData["response_pic_2"]; ?>" name="response_pic_2" >
                        <input type="text" value="<?php echo $quizData["response_pic_2"]; ?>" name="response_pic_2_text" >

                    </td>
                    <td  class="question-image">
                        <img src="<?php echo $quizData["response_pic_3"]; ?>" alt="画像なしです">
                        <input type="file" value="<?php echo $quizData["response_pic_3"]; ?>" name="response_pic_3" >
                        <input type="text" value="<?php echo $quizData["response_pic_3"]; ?>" name="response_pic_3_text" >

                    </td>
                </div>
                <td><input type="text" value="<?php echo $quizData["correct_answer"]; ?>" name="correct_answer" ></td>

                    <td>
                        <button type="submit">決定</button>
                        <input type="hidden" value="<?php echo $quizData["id"]; ?>" name="id">
                        
                    </td>
                </tr>
            </tbody>
            
            
        </table>
    </form>
    <a href="./quiz_list.php">一覧に戻る</a>
</body>

</html>