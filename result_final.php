<?php
$num_correct = $_POST['num_correct'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>3択クイズ 結果</title>
  <link rel="stylesheet" type="text/css" href="./views/css/quiz.css?<?php echo date('Ymd-Hi'); ?>">
</head>

<body>
  <div class="main">

    <div class="question-title">
      クイズ!
    </div>
    <div class="border-hedder"></div>

    <div class="question-instruction">
      あなたは、3問中<?php echo "$num_correct"; ?>問正解しました。
    </div>

    <div class="end-button-wrapper">

      <div class="end-button">
        <a href="./index.php">
          トップに戻る
        </a>
      </div>

    </div>
  </div>
</body>

</html>