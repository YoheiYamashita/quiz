<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizForm</title>
</head>

<body>
    <h2>クイズを新規作成する</h2>
    <form action="quiz_create.php" method="POST" enctype="multipart/form-data">
        <p>質問</p>
        <textarea name="question" cols="30" rows="3"></textarea>

        <p>選択肢を入力し、正解を選択してください</p>
        <input type="radio" name="correct_answer" value="1">選択肢1
        <textarea name="response_1" cols="30" rows="2"></textarea>
        <input type="radio" name="correct_answer" value="2">選択肢2
        <textarea name="response_2" cols="30" rows="2"></textarea>
        <input type="radio" name="correct_answer" value="3">選択肢3
        <textarea name="response_3" cols="30" rows="2"></textarea>

        <br>
        <a href="creat_comp.html"><input type="submit" value="送信"></a>
        <p><a href="./index.html">戻る</a></p>
    </form>
</body>

</html>