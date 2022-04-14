<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/dbaccess.php';
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    /*
        制作者：towa1204
        更新日：2022/04/01
        概要：
        m_panelテーブルにあるレコードをすべて取得

        出力するJSONの形式：{"status": 結果（ステータス）, "array": m_panelテーブルのすべてのレコード}
        "status"の形式:
          "取得できたとき": "OK"
          "レコードの数が0のとき": "EMPTY"
          "例外発生のとき": "NG"
          の3つに場合分けしています。
        "array"(連想配列を要素とする配列)の形式:
          [{"panel_name": 値, "content_link": 値, "content_image": 値}, {...}, ...]
          つまり、arrayの要素数がm_panelテーブルにあるレコードの数と一致します。
    */


    // // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');

    // phpの実行結果のステータス
    const STATUS_OK = "OK";
    const STATUS_EMPTY = "EMPTY";
    const STATUS_NG = "NG";

    // 連想配列の配列の初期化
    $resultArray = array();
    // ステータスを格納するための変数
    $status = STATUS_NG;

    try {
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // m_panelのデータすべてを取り出すSQL文
        $sql = "SELECT * FROM m_panel";
        $stmt = $pdo->query($sql);

        while ($buff = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultArray[] = array("panel_name"=>$buff["panel_name"],
                                   "content_link"=>$buff["content_link"],
                                   "content_image"=>$buff["content_image"]);
        }
        $status = STATUS_OK;
    } catch (Exception $ex) {
        $status = STATUS_NG;
    }

    // JSONの出力
    $result = array(
        "status" => $status,
        "array"  => $resultArray
    );
    echo json_encode($result);
?>
