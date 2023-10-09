<?php
require_once('quiz_func.php');
$quiz=new Quiz();
$quizzes=$_POST['id'];

$quiz->deleteDb($quizzes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ削除</title>
</head>
<body>
    <a href="./quiz_list.php">クイズ一覧に戻る</a>
</body>
</html>