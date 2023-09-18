<?php
require_once('quiz_func.php');
// 取得したデータを表示
ini_set('display_errors', "On");


$quiz = new Quiz();
$quizData = $quiz->getAll();
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}



?>


<?php
//入力された値の設定

if (isset($_POST['times'])) {
    $times = $_POST['times'];
} else {
    //エラー
    //今何問目か、の変数
    $times = 1;
}
if (isset($_POST['num_correct'])) {
    $num_correct = $_POST['num_correct'];
} else {
    //エラー
    //正解数の変数
    $num_correct = 0;
}
?>


<!-- dbのデータを$resultに入れる -->
<?php
// $timesを引数にすると、4問目以上は表示されない。乱数にすればよい？ただし、IDの最大数以下で
$result = $quiz->getById($times);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" type="text/css" href="quiz.css">
</head>


<body>
    <div class="main">

        <!-- <?php var_dump($quiz) ?> -->

        <div class="question-title">第<?php echo $times ?>問</div>

        <div class="border-hedder"></div>

        <div class="question-instruction">
        <?php echo $result['question'] ?>
</div>
        <form class="form" action="quiz_result.php" method="post">

            <?php $res_num = 1;

            while ($res_num < 4) { ?>
                <div class="question-box-<?php echo $res_num?>">
                    <div class="question-number<?php echo $res_num?>"><?php echo $res_num ?></div>
                    <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
                        <input type="radio" name="response" id="check-<?php echo  $res_num; ?>" value="<?php echo $res_num; ?>" checked><label for="check-<?php echo $res_num?>"></label>

                        <div class="question-image"><img src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="logo"></div>
                    </div>

                </div>


            <?php $res_num += 1;
            } ?>



            <input type="hidden" name="times" value=<?php echo $times; ?>>
            <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
            <input id="send_button" type="submit" value="決定する">
        </form>




    </div>
</body>

</html>