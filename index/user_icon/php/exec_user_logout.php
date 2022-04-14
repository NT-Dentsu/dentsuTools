<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/user_session.php';
    // ヘッダー情報の明記
    header('Content-Type: application/json; charset=UTF-8');

    // 連想配列のキー
    const KEY_LOGOUT_RESULT = 'logout_result';
    // 連想配列の値
    const VALUE_LOGOUT_OK = 'logout_ok';
    const VALUE_LOGOUT_NG = 'logout_ng';

    try{
        // セッションスタート
        if(session_start() == false){
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }

        // 戻り値を初期化(デフォルトはログアウト状態)
        $arrResult = array(
            KEY_LOGOUT_RESULT => VALUE_LOGOUT_NG
        );

        // ログアウト実行
        if(session_logout() == false){
            // ログアウトが失敗したらスローする
            throw new Exception('session did not work');
        }

        // 結果を更新する
        $arrResult[KEY_LOGOUT_RESULT] = VALUE_LOGOUT_OK;
        // 結果をjsonにする
        echo json_encode($arrResult);
    }
    catch(Exception $ex){
        // 結果を更新する
        $arrResult[KEY_LOGOUT_RESULT] = VALUE_LOGOUT_NG;
        // 結果をjsonにする
        echo json_encode($arrResult);
    }
?>
