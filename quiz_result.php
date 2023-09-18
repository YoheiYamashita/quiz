<?php
require_once('quiz_func.php');
// 取得したデータを表示
ini_set('display_errors', "On");

$quiz = new Quiz();
// ↓いらないかも
// $quizData = $quiz->getAll();


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
$result = $quiz->getById($times);
$response = $_POST['response'];
$answer = $result['correct_answer'];

if ($response == $answer) {
  $t_or_f = 1;
  $num_correct = $num_correct + 1;
} else {
  $t_or_f = 0;
}

if ($t_or_f == 1) {
?>
  <div>正解</div>
<?php
} else {
?>
  <div>不正解</div>
<?php
} ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Result</title>
  <link rel="stylesheet" type="text/css" href="./quiz_result.css">
</head>

<body>


<div class="main">
  <!-- <div class="question-box"> -->
  <?php $res_num = 1;
  while ($res_num < 4) { ?>
    <!-- 回答と選択肢と正答が一致したとき：チェックと丸をつける -->
      <?php if ($response==$res_num&&$response==$answer) { ?>
        <div class="question-box-<?php echo $res_num?>">
          <div class="c-mark">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
            </svg>
          </div>
          <div class="question-number<?php echo $res_num ?>"><?php echo $res_num ?></div>
          <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
            <input id="check-<?php $res_num ?>" type="radio" name="response" value="<?php echo $res_num ?>" checked><label for="check-<?php echo $res_num ?>"></label>
          </div>
          <div class="question-image"><img src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="logo"></div>
        </div>
<!-- 回答と選択肢が一致したとき：チェックをつける -->
        <?php }elseif ($response==$res_num){?>
          <div class="question_box_<?php echo $res_num?>_white">
          <div class="question-number<?php echo $res_num ?>"><?php echo $res_num ?></div>
          <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
            <input id="check-<?php $res_num ?>" type="radio" name="response" value="<?php echo $res_num ?>" checked><label for="check-<?php echo $res_num ?>"></label>
          </div>
          <div class="question-image"><img src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="logo"></div>
        </div>

      <?php } else { ?>

        <div class="question_box_<?php echo $res_num?>_white">
          <div class="question-number<?php echo $res_num ?>"><?php echo $res_num ?></div>
          <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
            <input id="check-<?php $res_num ?>" type="radio" name="response" value="<?php echo $res_num ?>" ><label for="check-<?php echo $res_num ?>"></label>
          </div>
          <div class="question-image"><img src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="logo"></div>
        </div>

      <?php } ?>
    <?php $res_num += 1;
  } ?>

    <br>
    <?php $times = $times + 1; ?>
    <!-- もし3問以下なら -->
    <?php if ($times != 4) { ?>
      <form method="POST" class="form" action="quiz.php">
        <input type="hidden" name="times" value=<?php echo $times; ?>>
        <input id="send_button" type="submit" value="次の問題へ" style="background-color:#FFFF99;">
        <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
      <?php } else { ?>
        <!-- もし3問回答してたら -->
        <form method="POST" class="form" action="result_final.php">
          <input id="send_button" type="submit" value="結果を表示" style="background-color:#FFFF99;">
          <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
        </form>
      <?php } ?>

    <!-- </div> -->
    </div>
</body>

</html>