<?php

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>クイズ</title>
  <!-- <link rel="stylesheet" href="./views/css/style.css?<?php echo date('Ymd-Hi'); ?>" /> -->
  <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

</head>

<body>


  <div class="flex flex-col items-center container">

    <div class="mt-3 w-1/2 border border-gray-400 flex flex-col items-center">
      <div class="question-title font-bold my-3 text-3xl">クイズ！</div>
      <div class="border-hedder"></div>
      <div class="question-instruction my-5 leading-8">
        これからクイズが出題されます。<br />
        必ずいずれかの選択肢を選んでください。
      </div>

      <div class="my-7">
        <a href="quiz.php" class=" rounded-full bg-blue-500 shadow-lg shadow-blue-500/50 p-3 text-white hover:bg-blue-900">
          クイズ開始
        </a>
      </div>

    </div>
    <div class="create-par flex flex-row-reverse justify-items-end w-1/2">
      <div class="mt-3">
        <a href="quiz_admin.php" class=" bg-gray-500 font-norma text-xs  text-white p-2 rounded-lg shadow-md hover:bg-gray-800 ">
          クイズを管理</a>
      </div>
    </div>
  </div>

</body>

</html>