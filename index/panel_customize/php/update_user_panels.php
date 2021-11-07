<?php
    require_once __DIR__ . '/../../common/user_session.php';
    require_once __DIR__ . '/../../common/dbaccess.php';
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");

    /*
        制作者：towa1204
        更新日：2021/10/08
        概要：
        渡された連想配列をDBに反映させる処理
    */

    // // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');

    // t_user_panelのanchor_num, panel_sizeの範囲
    const ANCHORNUMMIN = 0;
    const ANCHORNUMMAX = 15;
    const PANELSIZEMIN = 2;
    const PANELSIZEMAX = 5;

    // t_user_panel_infoのuser_id以外のカラム
    const PANELCOL = ["panel_name", "anchor_num", "panel_size"];
    // 渡される1レコードあたりの連想配列の数(panel_name, anchor_num, panel_size)
    const DICTSIZE = 3;

    // phpの実行結果のステータス
    const STATUS_OK = "OK";
    const STATUS_NG = "NG";

    // ステータスを格納するための変数
    $status = STATUS_NG;

    try {
        // POSTで送られてきたデータの取得
        $body = file_get_contents("php://input");
        $json = json_decode($body, true);
        if (is_null($json)) {
            // JSONのデコードに失敗
            throw new Exception('can not decode json');
        }

        // jsから渡された連想配列の配列の形式チェック, 戻り値は存在するアンカー番号の配列
        $anchorNumArray = dataValidationAndReturnAnchorNum($json["panelData"]);

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

        try {
            // トランザクション処理開始
            $db->beginTransaction($pdo);

            // プレースホルダを用いたSQL文を生成（プリペアドステートメント）
            // panel_nameがNULLのレコードは取得していないことに注意
            $sql = "UPDATE t_user_panel_info SET panel_name = :panel_name, panel_size = :panel_size WHERE user_id = :user_id AND anchor_num = :anchor_num";

            // 存在するアンカー番号についての更新処理
            for ($i = 0; $i < count($json["panelData"]); $i++) {
                $parameter = array(":user_id" => $userId);
                foreach ($json["panelData"][$i] as $col => $val) {
                    $parameter[":" . $col] = $val;
                }
                // SQL文を実行
                $stmt = $db->executePrepareSQL($pdo, $sql, $parameter);
            }

            // 存在しないアンカー番号についての更新処理
            for ($i = ANCHORNUMMIN; $i <= ANCHORNUMMAX; $i++) {
                if (!in_array($i, $anchorNumArray, true)) {
                    $parameter = array(":user_id" => $userId, ":panel_name" => NULL, ":panel_size" => NULL, ":anchor_num" => $i);
                    // SQL文を実行
                    $stmt = $db->executePrepareSQL($pdo, $sql, $parameter);
                }
            }
            // コミット
            $db->commitTransaction($pdo);
            $status = STATUS_OK;

            // データベースから切断
            $db->disconnectDB($pdo);
        } catch (PDOException $ex) {
            // ロールバック
            $db->rollbackTransaction($pdo);
            // 例外のステータスを設定
            $status = STATUS_NG;
            echo $ex;

            // データベースから切断
            $db->disconnectDB($pdo);
        }
    } catch(Exception $ex){
        // 例外のステータスを設定
        $status = STATUS_NG;
        echo $ex;
    }

    // JSONの出力
    $result = array(
        "status" => $status,
    );
    echo json_encode($result);

    // 連想配列の配列について検証を行い、存在するアンカー番号を返す関数
    function dataValidationAndReturnAnchorNum($records) {
        // m_panelにあるpanel_nameを取得
        $panelNameArray = getPanelName();

        // $records中に含まれるアンカー番号を格納する配列
        $anchorNumArray = array();
        for ($i = 0; $i < count($records); $i++) {
            // 連想配列の数が正しいかどうかチェック
            if (count($records[$i]) !== DICTSIZE) {
                throw new Exception("連想配列の数が正しくありません");
            }

            // 連想配列$records[i]からキー名のみの配列を取得
            $recordCol = array_keys($records[$i]);
            for ($j = 0; $j < DICTSIZE; $j++) {
                // 変なカラム名が含まれていないかチェック
                if (!in_array(PANELCOL[$j], $recordCol, true)) {
                    throw new Exception("正しくないキー名が含まれています");
                }
            }

            // $records[i]["panel_name"]がm_panelに含まれているpanel_nameかどうかチェック
            if (!(is_string($records[$i]["panel_name"]) && in_array($records[$i]["panel_name"], $panelNameArray, true))) {
                throw new Exception("panel_nameの値が不正です");
            }

            // アンカー番号が範囲内かどうかチェック
            if (!(is_int($records[$i]["anchor_num"]) && ($records[$i]["anchor_num"] >= ANCHORNUMMIN && $records[$i]["anchor_num"] <= ANCHORNUMMAX))) {
                throw new Exception("anchor_numの値が不正です");
            } else {
                // アンカー番号の重複チェック
                if (in_array($records[$i]["anchor_num"], $anchorNumArray, true)) {
                    throw new Exception("anchor_numに重複があります");
                } else {
                    // 重複していなかったら代入
                    $anchorNumArray[] = $records[$i]["anchor_num"];
                }
            }

            // パネルサイズが範囲内かどうかチェック
            if (!(is_int($records[$i]["panel_size"]) && ($records[$i]["panel_size"] >= PANELSIZEMIN && $records[$i]["panel_size"] <= PANELSIZEMAX))) {
                throw new Exception("panel_sizeの値が不正です");
            }
        }
        return $anchorNumArray;
    }

    // panel_nameを取得する関数
    function getPanelName() {
        // 連想配列の配列の初期化
        $resultArray = array();
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
            return $resultArray;
        } catch (Exception $ex) {
            throw Exception("getPanelNameの呼び出しに失敗");
        }
    }
?>
