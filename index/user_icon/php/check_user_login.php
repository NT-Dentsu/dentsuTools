<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/dbaccess.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/user_session.php';
    // ヘッダー情報の明記
    header('Content-Type: application/json; charset=UTF-8');

    // SQLのカラム名
    const RESULT_COLUMN_NAME = 'result';
    // 連想配列のキー
    const KEY_LOGIN_STATUS = 'login_status';
    // 連想配列の値
    const VALUE_LOGIN_STATUS = 'login';
    const VALUE_LOGOUT_STATUS = 'logout';

    try{
        // セッションスタート
        if(session_start() == false){
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }

        // 戻り値を初期化(デフォルトはログアウト状態)
        $arrResult = array(
            KEY_LOGIN_STATUS => VALUE_LOGOUT_STATUS
        );

        // セッションからユーザーIDを取得する
        $userId = $_SESSION['user_id'];
        // ユーザーIDがNULLまたは空だった場合
        if(is_null($userId) || empty($userId)){
            // 結果をjsonにする
            echo json_encode($arrResult);
            return;
        }

        // DBアクセスクラスを生成
        $clsDb = new DBAccess();
        // 発行するクエリの定義
        $query = 'select count(*) as ' . RESULT_COLUMN_NAME . ' from m_user where user_id = :user_id;';
        // クエリに埋め込むパラメーターを設定
        $param = array(
            ':user_id' => $userId,
        );

        // DB接続
        $pdo = $clsDb->connectDB();
        // クエリ実行
        $result = $clsDb->executePrepareSQL($pdo, $query, $param);
        // 結果を1行取り出す
        $arrRecord = $result->fetch(PDO::FETCH_ASSOC);
        // DB切断
        $clsDb->disconnectDB($pdo);

        // 結果が0以外だった場合
        if($arrRecord[RESULT_COLUMN_NAME] != '0'){
            $arrResult[KEY_LOGIN_STATUS] = VALUE_LOGIN_STATUS;
        }

        // 結果をjsonにする
        echo json_encode($arrResult);
    }
    catch(Exception $ex){
        // ログアウト状態とする
        $arrResult[KEY_LOGIN_STATUS] = VALUE_LOGOUT_STATUS;

        // 結果をjsonにする
        echo json_encode($arrResult);
    }
?>
