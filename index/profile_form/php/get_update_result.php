<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once __DIR__ . '/../../common/user_session.php';
    // ヘッダー情報の明記
    header('Content-Type: application/json; charset=UTF-8');

    // 連想配列のキー
    const KEY_STATUS = 'update_status';
    // 連想配列の値
    const VALUE_NONE = 'NONE';
    const VALUE_OK = 'OK';
    CONST VALUE_NG = 'NG';

    try{
        // 結果の初期化
        $result = array(
            KEY_STATUS => VALUE_NONE,
        );

        // セッションスタート
        if(session_start() == false){
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }
        // セッション変数が定義されているか確認
        if(isset($_SESSION['profile_update']) == false){
            // 未定義の場合は更新がされなかったとする
            echo json_encode($result);
            exit;
        }

        // 更新結果から戻り値を変更する
        if($_SESSION['profile_update'] == 'OK'){
            $result[KEY_STATUS] = VALUE_OK;
        }
        else{
            $result[KEY_STATUS] = VALUE_NG;
        }

        // セッション変数を削除する
        unset($_SESSION['profile_update']);
        // 結果を返却する
        echo json_encode($result);
        exit;
    }
    catch(Exception $ex){
        // 例外が発生した場合はNGを返す
        $result[KEY_STATUS] = VALUE_NG;
        echo json_encode($result);
        exit;
    }
?>
