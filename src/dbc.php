<?php
// 関数とか変数の名前が被らないように、ここではDbcという名前を付ける。ただし、PDOはグローバルなので、ここはBlog\Dbcと関係ないことを明示するために、\を付ける
// index、detailでも使える。その時はuseで出来る。
// namespace Blog\Dbc;

// 詳細画面を表示

// 一覧画面からブログのidを送る　GETリクエストでidをURLにつけて送る
// 詳細ページでidを受け取る　PHPの$_GETでidを取得

require_once('env.php');

// 関数一つに一つの機能のみを持たせる
// データベース接続
// 引数：なし
// 返り値：接続結果

class Dbc
{
    protected $table_name;


    protected function dbConnect()
    {
        $host = DB_HOST;
        $dbname = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {

            $dbh = new \PDO($dsn, $user, $pass, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (\PDOException $e) {
            echo '接続失敗' . $e->getMessage();
            exit();
        }

        return $dbh;
    }


    // データ取得
    // 引数：なし
    // 返り値：取得したデータ
    public function getAll()
    {
        $dbh = $this->dbConnect();
        // SQLの準備
        $sql = "SELECT * FROM $this->table_name";
        // SQLの実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
    // 取得したデータを表示



    // detai.php用ブログの詳細を取得する。
    // 引数：id
    // 返り値：result
    public function getById($id)
    {
        if (empty($id)) {
            exit('IDが不正です');
        }


        $dbh = $this->dbConnect();

        // SQL準備
        $stmt = $dbh->prepare("SELECT * FROM $this->table_name where id=:id");
        $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT); //ここでプレイスホルダーにしてる。idが、間接的に代入されている
        // SQL実行
        $stmt->execute();
        // 結果を取得
        $result = $stmt->fetch(\PDO::FETCH_ASSOC); //今回は、一つのデータ（行）だけだから、fetchAllでは無い。

        if (!$result) {
            exit('クイズがありません');
        }
        return $result;
    }

    public function deleteById($id)
    {
        if (empty($id)) {
            exit('IDが不正です');
        }


        $dbh = $this->dbConnect();

        // SQL準備
        $stmt = $dbh->prepare("DELETE FROM $this->table_name where id=:id");
        $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT); //ここでプレイスホルダーにしてる。idが、間接的に代入されている
        // SQL実行
        $stmt->execute();
        return 'クイズの削除が完了しました';
        // return $result;
    }
}
