<?php
require_once('quiz_func.php');
$quiz = new Quiz();
$quizData = $quiz->getAll();

// var_dump($quizData);

foreach ($quizData as $quiz){
    echo "質問：".$quiz["question"];
    echo "<br>";
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ一覧および編集</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>質問</td>
                <td>回答1</td>
                <td>回答2</td>
                <td>回答3</td>
                <td>回答1の画像アドレス</td>
                <td>回答2の画像アドレス</td>
                <td>回答3の画像アドレス</td>
                <td>正答番号</td>

            </tr>
        </thead>
        
        <!-- ここに、データ一覧を表示 -->
        <tbody>
            <tr>
                
            </tr>



        </tbody>
    </table>
</body>
</html>