<?php
  $num_correct = $_POST['num_correct'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>3択クイズ 結果</title>
    <link rel="stylesheet" type="text/css" href="result.css">
  </head>
  <body>
        <div class="main">
     
      <div class="question-title">
        クイズ! 
      </div>
      <div class="border-hedder"></div>

    <div class="question-instruction">
      あなたは、3問中<?php echo "$num_correct";?>問正解しました。
    </div>

      <div class="end-button">
        <a href= "./index.html" >
         トップに戻る
        </a>
      </div>
    </div>
  </body>
</html>