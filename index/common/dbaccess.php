<?php
# 制作者:KARASU-2000
# 更新日:2021/3/12
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
    # 更新日:2021/3/12
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
            # エラーメッセージ表示
            echo $ex->getMessage();
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/12
    # 機能:受け取ったクエリを実行する(SELECT)
    public function getTableSQL($pdo, $sql){
        try{
            # クエリ実行
            $dataTable = $pdo->query($sql);
            # テーブルを返却
            return $dataTable;
        }
        catch(Exception $ex){
            # エラーメッセージ表示
            echo $ex->getMessage();
        }
    }

    # 制作者:KARASU-2000
    # 更新日:2021/3/12
    # 機能:受け取ったクエリを実行する(INSERT, UPDATE, DELETE)
    public function executeSQL($pdo, $sql){
        try{
            # クエリ実行
            $result = $pdo->exec($sql);
            # 操作したレコード件数を返却
            return $result;
        }
        catch(Exception $ex){
            # エラーメッセージ表示
            echo $ex->getMessage();
        }
    }
}
 ?>
