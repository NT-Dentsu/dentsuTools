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

    // アンカー番号の範囲
    const ANCHORNUM_START = 0;
    const ANCHORNUM_END = 15;

    // ajax通信で受け取ったuser_id,passwordを変数に代入
    $uid = filter_input(INPUT_POST, 'uid');
    $password = filter_input(INPUT_POST, 'password');

    // 入力値チェックを行う
    if (input_check($uid) && input_check($password)) {
        try {
            $db = new DBAccess();
            // データベース接続開始
            $pdo = $db->connectDB();

            // トランザクション処理開始
            // (1)m_userテーブルでのレコード作成 (2)t_user_panel_infoテーブルでのレコード作成
            $db->beginTransaction($pdo);

            // m_userテーブルでのレコード作成
            // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
            $sql = "INSERT INTO m_user(user_id, user_name, password_hash, insert_time, update_time, user_icon) VALUES(:user_id, :user_name, :password_hash, now(), now(), NULL)";
            // パスワードのハッシュ値生成
            $password_hash = generatePasswordHash($password);
            // プレースホルダに対応する値を設定
            $parameter = array(':user_id'=>$uid, ':user_name'=>$uid, ':password_hash'=>$password_hash);

            // t_user_panel_infoテーブルでのレコード作成
            $sqlAndParam = generateAnchorNumSQL($uid);


            // 挿入成功:true, 挿入不一致:falseを代入
            $result = false;
            try {
                // SQLを実行
                $db->executePrepareSQL($pdo, $sql, $parameter);
                $db->executePrepareSQL($pdo, $sqlAndParam["sql"], $sqlAndParam["parameter"]);

                // コミット
                $db->commitTransaction($pdo);

                $result = true;
                $massage = '登録完了しました';
            } catch(PDOException $ex){
                // すでに同じIDのユーザが存在したときの処理
                // ロールバック
                $db->rollbackTransaction($pdo);
                $result = false;
                $massage = 'すでにユーザIDが使われています';
            }

        } catch (Exception $ex) {
            $result = false;
            $massage = '何らかのエラーが発生しました';
        } finally {
            // データベースから切断
            $db->disconnectDB($pdo);
        }

    } else {
        $result = false;
        $massage = '指定された入力範囲を満たしていません';
    }
    // jsの方にデータ渡して、動作確認をする　DB操作が成功のときはtrue, 失敗の場合はfalseを返す
    $array_lists = [
        'type' => "insert",
        'result' => $result,
        'message' => $massage
    ];
    echo json_encode($array_lists);

    // 0~15のアンカー番号をのレコードをinsertするためのSQL文およびパラメータを返す関数
    function generateAnchorNumSQL($uid) {

        try {
            // 値を設定する前のSQL文を生成
            $sql = "INSERT INTO t_user_panel_info (user_id, panel_name, anchor_num, panel_size) VALUES";

            $parameter = array();

            for ($i = ANCHORNUM_START; $i <= ANCHORNUM_END; $i++) {
                if ($i != ANCHORNUM_END) {
                    $sql .= "(:user_id" . $i . ", NULL, :i" . $i . ", NULL), ";
                } else {
                    $sql .= "(:user_id" . $i . ", NULL, :i" . $i . ", NULL);";
                }
                $parameter[":i" . $i] = $i;
                $parameter[":user_id" . $i] = $uid;
            }

            return array("sql"=>$sql, "parameter"=>$parameter);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
?>
