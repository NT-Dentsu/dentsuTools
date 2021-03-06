<?php
# 制作者:KARASU-2000
# 更新日:2021/3/24
# 機能:DBアクセスクラス
Class DBAccess{
    # 定数宣言
    # DB名
    const DBNAME = 'dentsudb';
    # ホスト名
    const HOST_NAME = 'localhost';
    # DBにアクセスするユーザー名
    const USER_NAME = 'dentsu_user';
    # DBにアクセスするパスワード
    const PASSWORD = 'DentsuTool';

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:DBアクセスの用のインスタンスを生成する
    public function connectDB(){
        try{
            # 接続文字列を生成
            $dns = 'mysql:dbname='.self::DBNAME.';host='.self::HOST_NAME;
            $user = self::USER_NAME;
            $password = self::PASSWORD;

            # DB接続
            $pdo = new PDO($dns, $user, $password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));

            return $pdo;
        }
        catch(PDOException $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:DBから切断する
    public function disconnectDB(&$pdo){
        try{
            # インスタンスを破棄
            $pdo = null;
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:受け取ったクエリを実行する(SELECT)
    public function getTableSQL($pdo, $sql){
        try{
            # クエリ実行
            $dataTable = $pdo->query($sql);
            # テーブルを返却
            return $dataTable;
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:受け取ったクエリを実行する(INSERT, UPDATE, DELETE)
    public function executeSQL($pdo, $sql){
        try{
            # クエリ実行
            $result = $pdo->exec($sql);
            # 操作したレコード件数を返却
            return $result;
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:受け取ったクエリに値をバインドして実行する
    public function executePrepareSQL($pdo, $sql, $parameter){
        try{
            # SQLを準備する
            $stmt = $pdo->prepare($sql);
            # 値をバインドする
            foreach($parameter as $key => $value){
                if(is_int($value) == true){
                    # 数値の場合
                    $stmt->bindValue($key, $value, PDO::PARAM_INT);
                }
                else{
                    # 文字列の場合
                    $stmt->bindValue($key, $value, PDO::PARAM_STR);
                }
            }
            # クエリ実行
            $stmt->execute();

            # 実行結果を返却
            return $stmt;
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:トランザクションを開始する
    public function beginTransaction($pdo){
        try{
            # トランザクション開始
            $pdo->beginTransaction();
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:ロールバックを実行する
    public function rollbackTransaction($pdo){
        try{
            # ロールバック実行
            $pdo->rollBack();
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/24
    # 機能:コミットを実行する
    public function commitTransaction($pdo){
        try{
            # コミット実行
            $pdo->commit();
        }
        catch(Exception $ex){
            # 例外をスロー
            throw $ex;
        }
    }
}
 ?>
