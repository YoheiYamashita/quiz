<?php
require_once('quiz_func.php');
$quiz=new Quiz();
$quizzes=$_POST;

$quiz->quizUpdate($quizzes);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./quiz_list.php">一覧に戻る</a>

</body>
</html>