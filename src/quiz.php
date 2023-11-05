<?php
require_once('quiz_func.php');
// 取得したデータを表示
ini_set('display_errors', "On");


$quiz = new Quiz();
$quizData = $quiz->getAll();
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}



?>


<?php
//入力された値の設定

if (isset($_POST['times'])) {
    $times = $_POST['times'];
} else {
    //エラー
    //今何問目か、の変数
    $times = 1;
}
if (isset($_POST['num_correct'])) {
    $num_correct = $_POST['num_correct'];
} else {
    //エラー
    //正解数の変数
    $num_correct = 0;
}
?>

<!-- IDをランダムにする。使用したIDは、arrayに入れる。arrayにあるIDと一致した（既出のID）場合は、再度ランダムにする。 -->
<?php
$allId = $quiz->getAllId();

// $idValueArrayに、idの値を入れていく
$idValueArray = [];
foreach ($allId as $idArray) {

    foreach ($idArray as $key => $value) {
        if ($key === 'id') {

            array_push($idValueArray, $value);
        }
    }
}


// session変数に、ランダムなidを入れていく

session_start();

if (!isset($_SESSION['idArray'])) {
    // session変数のidarrayが空の場合、つまりは1問目の場合
    shuffle($idValueArray);
    $id1 = array_shift($idValueArray);
    $_SESSION['idArray'] = $idValueArray;
    $_SESSION['id1'] = $id1;
} else {
    $reducedIdArray = [];
    shuffle($_SESSION['idArray']);
    $reducedIdArray = $_SESSION['idArray'];
    $id1 = array_shift($reducedIdArray);
    $_SESSION['idArray'] = $reducedIdArray;
    $_SESSION['id1'] = $id1;
}

$result = $quiz->getById($id1);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- <link rel="stylesheet" type="text/css" href="./views/css/quiz.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">
</head>


<body>
    <div class="container flex flex-col items-center ">
        <div class="mt-3  border border-gray-400 flex flex-col items-center w-max">
            <div class="mt-3 font-bold text-2xl ">クイズに挑戦してください!</div>

            <div class="mt-5">第<?php echo $times ?>問</div>

            <div class="question-instruction underline decoration-dotted mb-7">
                <?php echo $result['question'] ?>
            </div>

            <form class="form" action="quiz_result.php" method="post">
                <div class="flex flex-row justify-between my-3">
                    <?php $res_num = 1;

                    while ($res_num < 4) { ?>
                        <div class="question-box-<?php echo $res_num ?> mx-2 flex flex-col items-center w-max">
                            <!-- <div class="question-number<?php echo $res_num ?> my-3"><?php echo $res_num ?></div> -->
                            <div class="question-text"><?php echo $result['response_' . $res_num]; ?>
                                <input type="radio" name="response" id="check-<?php echo  $res_num; ?>" value="<?php echo $res_num; ?>" checked><label for="check-<?php echo $res_num ?>"></label>

                            </div>
                            <!-- もし画像のパスが空欄であれば、画像なし用の画像を表示する -->
                            <?php if (empty($result['response_pic_' . $res_num])) : ?>
                                <div class="question-image"><img class="w-32 h-28 lg:w-44 lg:h-36" src="./img/noimage.jpg" alt="画像がありません"></div>
                            <?php else : ?>
                                <div class="question-image "><img class="w-32 h-28 lg:w-44 lg:h-36" src="<?php echo $result['response_pic_' . $res_num]; ?>" alt="画像がありません"></div>
                            <?php endif ?>

                        </div>
                    <?php $res_num += 1;
                    } ?>

                </div>

                <div class="flex flex-row justify-center">
                    <input type="hidden" name="times" value=<?php echo $times; ?>>
                    <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
                    <input id="send_button" type="submit" value="決定する" class="send_button 
                    rounded-full 
                    bg-blue-500
                    text-white 
                    p-2
                    hover:bg-blue-800
                    cursor-pointer
                    my-3">


                </div>
            </form>


        </div>





    </div>
</body>

</html>