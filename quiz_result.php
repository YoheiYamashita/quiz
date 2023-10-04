<?php
require_once('quiz_func.php');
// 取得したデータを表示
ini_set('display_errors', "On");

$quiz = new Quiz();




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
session_start();
$id1=$_SESSION['id1'];
?>

<?php
$result = $quiz->getById($id1);
$response = $_POST['response'];
$answer = $result['correct_answer'];

if ($response == $answer) {
  $t_or_f = 1;
  $num_correct = $num_correct + 1;
} else {
  $t_or_f = 0;
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Result</title>
  <link rel="stylesheet" type="text/css" href="./views/css/quiz.css">
</head>

<body>


  <div class="main">
  <?php
if ($t_or_f == 1) {
?>
  <div class="true">正解</div>
<?php
} else {
?>
  <div class="false">不正解</div>
<?php
} ?>
    <div class="question-title">第<?php echo $times ?>問</div>

    <div class="border-hedder"></div>

   

    <div class="question-instruction">
      <?php echo $result['question'] ?></div>

    <!-- <div class="question-box"> -->
    <?php $res_num = 1;
    while ($res_num < 4) { ?>
      <!-- 回答と選択肢と正答が一致したとき：チェックと丸をつける -->
      <?php if ($response == $res_num && $response == $answer) { ?>
        <div class="question-box-<?php echo $res_num ?>">
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
      <?php } elseif ($response == $res_num) { ?>
        <div class="question-box-<?php echo $res_num ?>">
        <div class="c-mark">
        <svg xmlns="http://www.w3.org/2000/svg" height="160" viewBox="0 0 329.26933 329" width="160" fill="blue" >
          <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/>
      </svg>
      </div>
          <div class="question-number<?php echo $res_num ?>"><?php echo $res_num ?></div>
          <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
            <input id="check-<?php $res_num ?>" type="radio" name="response" value="<?php echo $res_num ?>" checked><label for="check-<?php echo $res_num ?>"></label>
          </div>
          <div class="question-image"><img src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="logo"></div>
        </div>

      <?php } else { ?>

        <div class="question_box_<?php echo $res_num ?>_white">
          <div class="question-number<?php echo $res_num ?>"><?php echo $res_num ?></div>
          <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
            <input id="check-<?php $res_num ?>" type="radio" name="response" value="<?php echo $res_num ?>"><label for="check-<?php echo $res_num ?>"></label>
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
        <input id="send_button" type="submit" value="次の問題へ" class="send_button">
        <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
      <?php } else { ?>
        <!-- もし3問回答してたら -->
        <?php 
        session_destroy(); ?>
        <form method="POST" class="form" action="result_final.php">
          <input id="send_button" type="submit" value="結果を表示" class="send_button">
          <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
        </form>
      <?php } ?>

      <!-- </div> -->
  </div>
</body>

</html>