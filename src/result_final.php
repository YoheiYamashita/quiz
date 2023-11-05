<?php
$num_correct = $_POST['num_correct'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>3択クイズ 結果</title>
  <link rel="stylesheet" type="text/css" href="./views/css/quiz.css?<?php echo date('Ymd-Hi'); ?>">
  <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

</head>

<body>
  <div class="container flex flex-col items-center">
    <div class="mt-3 border border-gray-400 flex flex-col items-center w-max">

      <div class="question-title font-bold my-3 text-3xl">
        最終結果！
      </div>
      <div class="border-hedder"></div>

      <div class="question-instruction my-5 leading-8 px-3">
        あなたは、3問中<?php echo "$num_correct"; ?>問正解しました。
      </div>

      <div class="end-button-wrapper">

        <div class="end-button rounded-full bg-blue-500 shadow-lg shadow-blue-500/50 p-3 text-white hover:bg-blue-900 my-3" >
          <a href="./index.php">
            トップに戻る
          </a>
        </div>

      </div>
    </div>

  </div>
</body>

</html>