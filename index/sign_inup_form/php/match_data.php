<?php
    // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");
    $uid = filter_input(INPUT_POST, 'uid');
    $password = filter_input(INPUT_POST, 'password');

    // データベース共通クラスの読み込み
    require_once('../../common/dbaccess.php');
    require_once('./input_check.php');

    // 入力値チェックを行う
    if (input_check($uid) && input_check($password)) {
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
        $sql = "SELECT COUNT(*) FROM m_user WHERE user_id=:user_id AND password=:password";

        // プレースホルダに対応する値を設定
        $parameter = array(':user_id'=>$uid, ':password'=>$password);

        // 照合一致:true, 照合不一致:falseを代入
        $result = false;
        $massage = 'ユーザIDまたはパスワードが異なります';
        try {
            // SQL文を実行
            $stmt = $db->executePrepareSQL($pdo, $sql, $parameter);
            // 1のとき照合成功，0のとき照合失敗
            $count = $stmt->fetchColumn();
            if ($count === 1) {
                $result = true;
                $massage = 'ログイン成功しました';
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
        'result' => $result,
        'message' => $massage
    ];
    echo json_encode($array_lists);
?>