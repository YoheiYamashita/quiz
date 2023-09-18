<?php 

require_once('quiz_func.php');

$quiz=new Quiz();

$quizzes=$_POST;

$quiz->quizValidate($quizzes);
$quiz->quizCreate($quizzes);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ作成</title>
</head>
<body>
 <a href="./quiz_form.php">戻る</a>

    
</body>
</html>