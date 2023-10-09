<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizForm</title>
    <link rel="stylesheet" type="text/css" href="./views/css/create.css?<?php echo date('Ymd-Hi'); ?>">

    
</head>

<body>
    <h2>クイズを新規作成する</h2>
    <form action="quiz_create.php" method="POST" enctype="multipart/form-data">
        <p>質問</p>
        <textarea name="question" cols="30" rows="3"></textarea>
        
        <table class="create-table" border="1" style="border-collapse: collapse">
            <thead class="create-head" >
                
                <tr align="center">
                    <td>項目</td>
                    <td>選択肢1</td>
                    <td>選択肢2</td>
                    <td>選択肢3</td>
                </tr>
            </thead>
            <tbody>
                
                <tr align="center" class="">
                    <td>文章</td>
                    <td><textarea name="response_1" cols="30" rows="1"></textarea></td>
                    <td><textarea name="response_2" cols="30" rows="1"></textarea></td>
                    <td><textarea name="response_3" cols="30" rows="1"></textarea></td>
                </tr>
                <tr>
                    <td>画像</td>
                    <td> <input type="file" name="response_pic_1"></td>
                    <td> <input type="file" name="response_pic_2"></td>
                    <td> <input type="file" name="response_pic_3"></td>
                </tr>
                <tr align="center">
                    <td>正答</td>
                    <td><input type="radio" name="correct_answer" value="1"></td>
                    <td><input type="radio" name="correct_answer" value="2"></td>
                    <td><input type="radio" name="correct_answer" value="3"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <input type="submit" name="img_upload" value="送信">
        <p><a href="./quiz_admin.php">戻る</a></p>
        
    </form>
</body>

</html>