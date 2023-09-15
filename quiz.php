<?php
require_once('quiz_func.php');
// 取得したデータを表示
ini_set('display_errors', "On");


$quiz = new Quiz();
$quizData = $quiz->getAll();
function h($s){
    return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
}

?>


<?php
//入力された値の設定

if (isset($_POST['times'])) {
    $times = $_POST['times'];
} else {
    //エラー
    //今何問目か、の変数
    $times = 0;
}
if (isset($_POST['num_correct'])) {
    $num_correct = $_POST['num_correct'];
} else {
    //エラー
    //正解数の変数
    $num_correct = 0;
}
?>
<?php
$question0 = [
    "世界で2番目に高い山は？", "富士山", "K2", "エベレスト",
    "img/huzi.jpg", "img/k2.jpg", "img/everest.jfif"
];
$question1 = [
    "最初に桃太郎の仲間になったのは？", "老夫婦", "犬", "サル",
    "img/grandpm.jpg", "img/dog.jpg", "img/monky.jpg"
];
$question2 = [
    "円周率の5番目の数字は？", "3", "2", "5",
    "img/3.png", "img/2.png", "img/5.png"
];

?>

<?php
$arr = [$question0, $question1, $question2];
$response_left = $arr[$times][1];
$response_center = $arr[$times][2];
$response_right = $arr[$times][3];

$response_pic_left = $question0[4];
$response_pic_center = $question0[5];
$response_pic_right = $question0[6];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" type="text/css" href="quiz.css">
</head>


<body>
    <div class="main">

    <!-- <?php var_dump($quiz)?> -->

       

        <div class="question-title">
            <?php
            $a = $times + 1;
            echo "第", "$a", "門";
            ?>
        </div>

        <div class="border-hedder"></div>

        <div class="question-instruction">
            <?php
            echo $arr[$times][0];
            ?>
        </div>

      

        <div>
            <form class="form" action="quiz_result.php" method="post">
                <div class="question-box-left">
                    <div class="question-number1">➀</div>
                    <div class="question-text"><?php echo $response_left; ?>
                        <input type="radio" name="response" id="check-a" value="left" checked><label for="check-a"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_left; ?>" alt="logo"></div>

                </div>

                <div class="question-box-center">
                    <div class="question-number2">➁</div>
                    <div class="question-text"><?php echo $response_center; ?>
                        <input type="radio" name="response" id="check-b" value="center" checked><label for="check-b"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_center; ?>" alt="logo"></div>

                </div>

                <div class="question-box-right">
                    <div class="question-number3">➂</div>
                    <div class="question-text"><?php echo $response_right; ?>
                        <input type="radio" name="response" id="check-c" value="right" checked><label for="check-c"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_right; ?>" alt="logo"></div>

                </div>

                <input type="hidden" name="times" value=<?php echo $times; ?>>
                <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
                <input id="send_button" type="submit" value="決定する">

            </form>

        </div>

    </div>
</body>

</html>