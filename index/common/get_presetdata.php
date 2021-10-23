<?php
    require_once __DIR__ . '/dbaccess.php';
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    /*
        制作者：towa1204
        更新日：2021/10/23
        概要：
        入力されたプリセットidに応じたプリセットデータを返す
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

    $preset_id = filter_input(INPUT_POST, 'preset_id');

    try {
        if (is_null($preset_id) || empty($preset_id) || !presetid_check($preset_id)) {
            // プリセットidを取得できなかったらスローする
            throw new Exception('preset_idが不正な値です。');
        }

        // セッションのユーザIDをもとに、DBからパネルのデータを取り出す
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
        // panel_nameがNULLのレコードは取得していないことに注意
        $sql = "SELECT panel_name, anchor_num, panel_size, content_link, content_image "
        ."FROM m_panel INNER JOIN t_user_panel_info USING(panel_name) "
        ."WHERE user_id=:preset_id";
        // プレースホルダに対応する値を設定
        $parameter = array(':preset_id'=>$preset_id);
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


    // プリセットidが形式/^preset.*$/にマッチするとき1を返す関数
    function presetid_check($preset_id) {
        if (preg_match('/^preset.*$/', $preset_id)) {
            return true;
        }
        return false;
    }
?>
