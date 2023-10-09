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
    <link rel="stylesheet" type="text/css" href="./views/css/list.css?<?php echo date('Ymd-Hi'); ?>">

</head>

<body>
    <table class="list-table" border="1" style="border-collapse: collapse">
        <thead>
            <tr align="center">
                <td>ID</td>
                <td>質問</td>
                <td>回答1</td>
                <td>回答2</td>
                <td>回答3</td>
                <td >回答1の画像</td>
                <td>回答2の画像</td>
                <td>回答3の画像</td>
                <td>正答番号</td>

            </tr>
        </thead>

        <!-- ここに、データ一覧を表示 -->
        <tbody>
            <?php foreach ($quizData as $quiz) : ?>

                <tr>
                    <td><?php echo $quiz["id"]; ?></td>
                    <td style="max-width: 150px;"><?php echo $quiz["question"]; ?></td>
                    <td style="max-width: 150px;"><?php echo $quiz["response_1"]; ?></td>
                    <td style="max-width: 150px;"><?php echo $quiz["response_2"]; ?></td>
                    <td style="max-width: 150px;"><?php echo $quiz["response_3"]; ?></td>
                    <td style="max-width: 150px;vertical-align: top;">
                        <div>
                            <img class="quiz-img" src="<?php echo $quiz["response_pic_1"]; ?>" alt="画像なし">
                        </div>

                        <div class="pic-address">
                            <?php echo $quiz["response_pic_1"]; ?>
                        </div>
                    </td>
                    <td style="max-width: 150px;vertical-align: top">
                        <div>
                            <img class="quiz-img" src="<?php echo $quiz["response_pic_2"]; ?>" alt="画像なし">
                        </div>
                        <div class="pic-address">
                            <?php echo $quiz["response_pic_2"]; ?>
                        </div>
                    </td>
                    <td style="max-width: 150px;vertical-align: top">
                        <div>
                            <img class="quiz-img" src="<?php echo $quiz["response_pic_3"]; ?>" alt="画像なし">
                        </div>
                        <div class="pic-address">
                            <?php echo $quiz["response_pic_3"]; ?>
                        </div>
                    </td>
                    <td><?php echo $quiz["correct_answer"]; ?></td>
                    <form action="quiz_edit.php" method="POST">
                        <td><button>編集</button><input type="hidden" value="<?php echo $quiz["id"]; ?>" name="id" placeholder="編集"></td>
                    </form>
                </tr>
            <?php endforeach ?>


        </tbody>
    </table>

    <a href="./quiz_admin.php">管理トップページに戻る</a>
</body>

</html>