<?php
require_once('dbc.php');

class Quiz extends Dbc
{

    protected $table_name = 'quiz';
    

    public function quizCreate($quizzes)
    {
        // ここから、mySQLに接続していく。
        $sql =   "INSERT INTO
        $this->table_name(question,response_1,response_2,response_3,correct_answer)
        VALUES
        (:question,:response_1,:response_2,:response_3,:correct_answer) ";


        $dbh = $this->dbConnect();

        $dbh->beginTransaction(); //トランザクション。整合性をチェック。この後のcommitとrollbackで実行している。
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':question', $quizzes['question'], PDO::PARAM_STR);
            $stmt->bindValue(':response_1', $quizzes['response_1'], PDO::PARAM_STR);
            $stmt->bindValue(':response_2', $quizzes['response_2'], PDO::PARAM_STR);
            $stmt->bindValue(':response_3', $quizzes['response_3'], PDO::PARAM_STR);
            $stmt->bindValue(':correct_answer', $quizzes['correct_answer'], PDO::PARAM_STR);

            $stmt->execute();
            $dbh->commit();
            echo 'クイズを作成しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
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
}
