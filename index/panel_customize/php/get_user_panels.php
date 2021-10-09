<?php
    require_once __DIR__ . '/../../common/user_session.php';
    require_once __DIR__ . '/../../common/dbaccess.php';
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    /*
        制作者：towa1204
        更新日：2021/10/01
        概要：
        セッション変数に格納されているユーザIDのパネルデータを取得
        結果(ステータス)は"取得できたとき", "レコードの数が0のとき", "例外発生のとき"
        の3つに場合分けしてjsonを出力しています
    */

    // // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');

    // phpの実行結果のステータス
    const STATUS_EMPTY = "EMPTY";
    const STATUS_OK = "OK";
    const STATUS_NG = "NG";

    // 連想配列の配列の初期化
    $resultArray = array();
    // ステータスを格納するための変数
    $status = STATUS_NG;

    try {
        if (user_session_start() == false) {
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }

        $userId = $_SESSION['user_id'];
        if(is_null($userId) || empty($userId)){
            // ユーザーIDを取得できなかったらスローする
            throw new Exception('session did not work');
        }

        // セッションのユーザIDをもとに、DBからパネルのデータを取り出す
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
        // panel_nameがNULLのレコードは取得していないことに注意
        $sql = "SELECT panel_name, anchor_num, panel_size, content_link, content_image "
        ."FROM m_panel INNER JOIN t_user_panel_info USING(panel_name) "
        ."WHERE user_id=:user_id";
        // プレースホルダに対応する値を設定
        $parameter = array(':user_id'=>$userId);
        // SQL文を実行
        $stmt = $db->executePrepareSQL($pdo, $sql, $parameter);

        // なくなるまで1レコードずつ取り出す, 空のときfalse
        while ($buff = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // 得られたレコードを連想配列
            $dict = array('panel_name'=>$buff['panel_name'], 'anchor_num'=>$buff['anchor_num'], 
                          'panel_size'=>$buff['panel_size'], 'content_link'=>$buff['content_link'], 
                          'content_image'=>$buff['content_image']);
            // 配列に連想配列を追加
            $resultArray[] = $dict;
        }

        if (count($resultArray) == 0) {
            // レコードの数が0のとき
            $status = STATUS_EMPTY;
        } else {
            // レコードの数が0でないとき
            $status = STATUS_OK;
        }
    } catch(Exception $ex){
        // 例外のステータスを設定
        $status = STATUS_NG;
        $resultArray = array();
    }

    // JSONの出力
    $result = array(
        "status" => $status,
        "array"  => $resultArray
    );
    echo json_encode($result);
?>