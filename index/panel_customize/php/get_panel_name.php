<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/dbaccess.php';
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    // // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');

    // phpの実行結果のステータス
    const STATUS_OK = "OK";
    const STATUS_NG = "NG";

    // 連想配列の配列の初期化
    $resultArray = array();
    // ステータスを格納するための変数
    $status = STATUS_NG;

    try {
        $db = new DBAccess();
        // データベース接続開始
        $pdo = $db->connectDB();

        // panel_nameを取り出すSQL文
        $sql = "SELECT panel_name FROM m_panel";
        $stmt = $pdo->query($sql);

        while ($buff = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultArray[] = $buff['panel_name'];
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