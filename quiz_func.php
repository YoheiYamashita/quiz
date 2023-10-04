<?php
require_once('dbc.php');

class Quiz extends Dbc
{

    protected $table_name = 'quiz';


    public function quizCreate($quizzes)
    {

        if (isset($quizzes['img_upload'])) {
           
            $dir = './img/';
            
            for ($i = 1; $i <= 3; $i++) {
                $temp_file_variable_name = "temp_file_$i";
                $response_pic_variable_name = "response_pic_$i";
                $img_path_name="img_path_$i";
                
                $$temp_file_variable_name = $_FILES[$response_pic_variable_name]['tmp_name'];
                
                if (file_exists($$temp_file_variable_name)) {
                    $image = uniqid(mt_rand(), false);
                    switch (@exif_imagetype($$temp_file_variable_name)) {
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
                            echo '拡張子を変更してください';
                            break;
                    }
                    move_uploaded_file($$temp_file_variable_name, $dir . $image);
                    $$img_path_name = $dir . "/" . $image;
                   
            }
        }

            // ここから、mySQLに接続していく。
            $sql =   "INSERT INTO
            $this->table_name(question,response_1,response_2,response_3,response_pic_1,response_pic_2,response_pic_3,correct_answer)
            VALUES
             (:question,:response_1,:response_2,:response_3,:response_pic_1,:response_pic_2,:response_pic_3,:correct_answer) ";


            $dbh = $this->dbConnect();

            $dbh->beginTransaction(); //トランザクション。整合性をチェック。この後のcommitとrollbackで実行している。
            try {
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':question', $quizzes['question'], PDO::PARAM_STR);
                $stmt->bindValue(':response_1', $quizzes['response_1'], PDO::PARAM_STR);
                $stmt->bindValue(':response_2', $quizzes['response_2'], PDO::PARAM_STR);
                $stmt->bindValue(':response_3', $quizzes['response_3'], PDO::PARAM_STR);
                $stmt->bindValue(':response_pic_1', $img_path_1, PDO::PARAM_STR);
                $stmt->bindValue(':response_pic_2', $img_path_2, PDO::PARAM_STR);
                $stmt->bindValue(':response_pic_3', $img_path_3, PDO::PARAM_STR);
                $stmt->bindValue(':correct_answer', $quizzes['correct_answer'], PDO::PARAM_STR);
                $stmt->execute();
                $dbh->commit();
                echo 'クイズを作成しました';
            } catch (PDOException $e) {
                $dbh->rollBack();
                exit($e);
            }
        }
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
            title=:title,content=:content,category=:category,publish_status=:publish_status
        WHERE
            id=:id ";


        $dbh = $this->dbConnect();

        $dbh->beginTransaction(); //トランザクション。整合性をチェック。この後のcommitとrollbackで実行している。
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title', $quizzes['title'], PDO::PARAM_STR);
            $stmt->bindValue(':content', $quizzes['content'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $quizzes['category'], PDO::PARAM_INT);
            $stmt->bindValue(':publish_status', $quizzes['publish_status'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $quizzes['id'], PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo 'ブログを更新しました';
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

