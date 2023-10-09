
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>クイズ</title>
    <link rel="stylesheet" href="./views/css/style.css?<?php echo date('Ymd-Hi'); ?>" />
  </head>
  <body>
    
    <div class="create-par">
      <div class="create">
      <a href="quiz_admin.php">クイズを管理</a>
    </div>
  </div>
    <div class="main">
      <div class="question-title">クイズ！</div>
      <div class="border-hedder"></div>
      <div class="question-instruction">
        これからクイズが出題されます。<br />
        必ずいずれかの選択肢を選んでください。
      </div>

      <div class="start-button">
        <a href="quiz.php" >
          <img src="img/start-button.png" alt="logo" />
        </a>
      </div>

    </div>
  </body>
</html>
