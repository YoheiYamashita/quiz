<?php
require_once('dbc.php');

class Quiz extends Dbc
{

    protected $table_name = 'quiz';
    // カテゴリー名を表示
    // 引数：数字
    // 返り値：カテゴリーの文字列
    public function setCategoryName($category)
    {
        if ($category === 1) {
            return '日常';
        } elseif ($category === 2) {
            return 'プログラミング';
        } else {
            'その他';
        }
    }

    public function blogCreate($blogs)
    {
        // ここから、mySQLに接続していく。
        $sql =   "INSERT INTO
        $this->table_name(title,content,category,publish_status)
        VALUES
        (:title,:content,:category,:publish_status) ";


        $dbh = $this->dbConnect();

        $dbh->beginTransaction(); //トランザクション。整合性をチェック。この後のcommitとrollbackで実行している。
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
            $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
            $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo 'ブログを投稿しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
        }
    }
    // バリデーション
    function blogValidate($blogs)
    {
        if (empty($blogs['title'])) {
            exit('タイトルを入力してください');
        }
        if (mb_strlen($blogs['title']) > 190) {
            exit('タイトルを190文字以下にしてください。');
        }
        if (empty($blogs['content'])) {
            exit('本文を入力してください');
        }
        if (empty($blogs['category'])) {
            exit('カテゴリを選択してください');
        }
        if ($blogs['category'] > 2) {
            exit('カテゴリを正しく選択してください');
        }
        if (empty($blogs['publish_status'])) {
            exit('公開ステータスを選択してください');
        }
    }

    // 記事の更新
    public function blogUpdate($blogs)
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
            $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
            $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
            $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $blogs['id'], PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo 'ブログを更新しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
        }
    }
}
