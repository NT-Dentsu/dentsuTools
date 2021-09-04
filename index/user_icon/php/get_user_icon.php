<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once __DIR__ . '/../../common/dbaccess.php';
    require_once __DIR__ . '/../../common/user_session.php';
    // ヘッダー情報の明記
    header('Content-Type: application/json; charset=UTF-8');

    // デフォルトユーザー名
    const DEFAULT_USER_NAME = 'default_user';
    // デフォルトアイコンのパス
    const DEFAULT_ICON_PATH = '/content/default_icon.jpg';
    // 連想配列のキー
    const KEY_USER_ICON = 'user_icon';

    try{
        // セッションスタート
        if(session_start() == false){
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }

        // セッションからユーザーIDを取得する
        $userId = $_SESSION['user_id'];
        // ユーザーIDがNULLまたは空だった場合
        if(is_null($userId) || empty($userId)){
            // デフォルトユーザー名を設定する
            $userId = DEFAULT_USER_NAME;
        }

        // DBアクセスクラスを生成
        $clsDb = new DBAccess();
        // 発行するクエリの定義
        $query = 'select user_icon from m_user where user_id = :user_id;';
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

        // 結果がNULLまたは空だった場合
        if(is_null($arrRecord[KEY_USER_ICON]) || empty($arrRecord[KEY_USER_ICON])){
            // デフォルトのパスを結果に格納する
            $arrRecord[KEY_USER_ICON] = DEFAULT_ICON_PATH;
        }

        // 結果をjsonにする
        echo json_encode($arrRecord);
    }
    catch(Exception $ex){
        // デフォルトのパスを返却する
        $arrRecord = array(
            KEY_USER_ICON => DEFAULT_ICON_PATH,
        );

        // 結果をjsonにする
        echo json_encode($arrRecord);
    }
?>
