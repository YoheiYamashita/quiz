<?php
require_once('dbc.php');

class Quiz extends Dbc
{
    // 対象のテーブル
    protected $table_name = 'quiz';

    // 画像の保存先ディレクトリ
    protected $upload_dir = './img/';

    // クイズの新規作成
    public function quizCreate($quizzes)
    {
        // 画像アップロード処理
        $imagePaths = $this->uploadImages($quizzes);

        // データベースにクイズを挿入
        $sql = "INSERT INTO
            $this->table_name(question,response_1,response_2,response_3,response_pic_1,response_pic_2,response_pic_3,correct_answer)
            VALUES
            (:question,:response_1,:response_2,:response_3,:response_pic_1,:response_pic_2,:response_pic_3,:correct_answer)";

        $dbh = $this->dbConnect();

        $dbh->beginTransaction(); // トランザクション
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':question', $quizzes['question'], PDO::PARAM_STR);
            $stmt->bindValue(':response_1', $quizzes['response_1'], PDO::PARAM_STR);
            $stmt->bindValue(':response_2', $quizzes['response_2'], PDO::PARAM_STR);
            $stmt->bindValue(':response_3', $quizzes['response_3'], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_1', $imagePaths[0], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_2', $imagePaths[1], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_3', $imagePaths[2], PDO::PARAM_STR);
            $stmt->bindValue(':correct_answer', $quizzes['correct_answer'], PDO::PARAM_STR);
            $stmt->execute();
            $dbh->commit();
            return 'クイズを作成しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e->getMessage());
        }
    }

    // 新規作成用の画像アップロード
    public function uploadImages()
    {
        for ($i = 1; $i <= 3; $i++) {
            $responsePicName = "response_pic_$i";
            $tempFileName = $_FILES[$responsePicName]['tmp_name'];
            $picNameText = "response_pic_" . $i . "_text";

            if (file_exists($tempFileName)) {
                $image = uniqid(mt_rand(), false);

                switch (@exif_imagetype($tempFileName)) {
                    case IMAGETYPE_GIF:
                        $image .= '.gif';
                        break;
                    case IMAGETYPE_JPEG:
                        $image .= '.jpg';
                        break;
                    case IMAGETYPE_PNG:
                        $image .= '.png';
                        break;
                    default:
                        throw new Exception('サポートされていない画像形式です');
                }

                $imagePath = $this->upload_dir . $image;
                move_uploaded_file($tempFileName, $imagePath);
                $imagePaths[] = $imagePath;
            } elseif (!empty($_POST[$picNameText])) {
                // response_pic_textがあれば、それをパス配列に入れる。これは更新の時に使用される。
                $imagePaths[] = $_POST[$picNameText];
            } else {
                // 作成の時、画像がなければ、noimagesのパスをimagePathに入れる
                $res_pic = "./img/noimage.jpg";
                $imagePaths[] = $res_pic;
            }
        }
        return $imagePaths;
    }


    // バリデーション
    function quizValidate($quizzes)
    {
        if (empty($quizzes['question'])) {
            exit('質問を入力してください');
        }
        if (mb_strlen($quizzes['question']) > 190) {
            exit('質問を190文字以下にしてください。');
        }
        if (empty($quizzes['response_1'])) {
            exit('選択肢1を入力してください');
        }
        if (empty($quizzes['response_2'])) {
            exit('選択肢2を入力してください');
        }
        if (empty($quizzes['response_3'])) {
            exit('選択肢3を入力してください');
        }
        if (empty($quizzes['correct_answer'])) {
            exit('正解を選択をしてください');
        }
    }


    // 記事の更新
    public function quizUpdate($quizzes)
    {
        // ここから、mySQLに接続していく。
        $sql =   "UPDATE $this->table_name SET
            question=:question,response_1=:response_1,response_2=:response_2,response_3=:response_3,response_pic_1=:response_pic_1,response_pic_2=:response_pic_2,response_pic_3=:response_pic_3,response_pic_1=:response_pic_1,correct_answer=:correct_answer
        WHERE
            id=:id ";

        $dbh = $this->dbConnect();

        $imagePaths = $this->uploadImages();

        $dbh->beginTransaction(); //トランザクション。整合性をチェック。この後のcommitとrollbackで実行している。
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':question', $quizzes['question'], PDO::PARAM_STR);
            $stmt->bindValue(':response_1', $quizzes['response_1'], PDO::PARAM_STR);
            $stmt->bindValue(':response_2', $quizzes['response_2'], PDO::PARAM_STR);
            $stmt->bindValue(':response_3', $quizzes['response_3'], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_1', $imagePaths[0], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_2', $imagePaths[1], PDO::PARAM_STR);
            $stmt->bindValue(':response_pic_3', $imagePaths[2], PDO::PARAM_STR);
            $stmt->bindValue(':correct_answer', $quizzes['correct_answer'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $quizzes['id'], PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            return 'クイズの編集が完了しました！';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
        }
    }



    public function getAllId()
    {
        $dbh = $this->dbConnect();
        // SQLの準備
        $sql = "SELECT `id` FROM $this->table_name";
        // SQLの実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
}
