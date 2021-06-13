<?php
    // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    // データベース共通クラスの読み込み
    require_once __DIR__ . '/../../common/dbaccess.php';
    // パスワードハッシュ値生成に使う関数の読み込み
    require_once __DIR__ . '/../../common/password_hash.php';
    // 入力チェック関数の読み込み
    require_once __DIR__ . '/input_check.php';

    // ajax通信で受け取ったuser_id,passwordを変数に代入
    $uid = filter_input(INPUT_POST, 'uid');
    $password = filter_input(INPUT_POST, 'password');

    // 入力値チェックを行う
    if (input_check($uid) && input_check($password)) {
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // パスワードのハッシュ値生成
        $password_hash = generatePasswordHash($password);

        // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
        $sql = "INSERT INTO m_user(user_id, user_name, password_hash, insert_time, update_time, user_icon) VALUES(:user_id, :user_name, :password_hash, now(), now(), NULL)";
        // プレースホルダに対応する値を設定
        $parameter = array(':user_id'=>$uid, ':user_name'=>$uid, ':password_hash'=>$password_hash);

        // 挿入成功:true, 挿入不一致:falseを代入
        $result = false;
        try {
            // SQLを実行
            $db->executePrepareSQL($pdo, $sql, $parameter);
            $result = true;
            $massage = '登録完了しました';
        } catch(Exception $ex){
            // すでに同じIDのユーザが存在したときの処理
            // echo $ex->getMessage();
            $result = false;
            $massage = 'すでにユーザIDが使われています';
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
