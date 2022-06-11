<?php
    // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");
    $uid = filter_input(INPUT_POST, 'uid');
    $input_password = filter_input(INPUT_POST, 'password');

    // データベース共通クラスの読み込み
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/dbaccess.php';
    // パスワードハッシュ値生成に使う関数の読み込み
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/password_hash.php';
    // 入力チェック関数の読み込み
    require_once $_SERVER['DOCUMENT_ROOT'] . '/sign_inup_form/php/input_check.php';

    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/user_session.php';

    // 入力値チェックを行う
    if (input_check($uid) && input_check($input_password)) {
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
        $sql = "SELECT password_hash FROM m_user WHERE user_id=:user_id";
        // プレースホルダに対応する値を設定
        $parameter = array(':user_id'=>$uid);

        // 照合一致:true, 照合不一致:falseを代入
        $result = false;
        $massage = 'ユーザIDまたはパスワードが異なります';
        try {
            // SQL文を実行
            $stmt = $db->executePrepareSQL($pdo, $sql, $parameter);
            // SQL文にあてはまる最初の値を取得（同じuser_idをもつカラムがないことを前提）
            $value = $stmt->fetchColumn();
            if ($value != false && verifyPasswordHash($input_password, $value)) {
                // user_idが一致　かつ　パスワードが一致　のとき
                $result = true;
                $massage = 'ログイン成功しました';

                session_login($uid);
            }
        } catch(Exception $ex){
            // すでに同じIDのユーザが存在したときの処理
            // echo $ex->getMessage();
            $result = false;
        }

        // データベースから切断
        $db->disconnectDB($pdo);
    } else {
        $result = false;
        $massage = '指定された入力範囲を満たしていません';
    }

    // jsの方にデータ渡して、動作確認をする　DB操作が成功のときはtrue, 失敗の場合はfalseを返す
    $array_lists = [
        'type' => "match",
        'result' => $result,
        'message' => $massage
    ];
    echo json_encode($array_lists);
?>
