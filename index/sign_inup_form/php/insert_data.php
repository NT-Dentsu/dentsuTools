<?php
    // デバッグ用の処理
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
    //ヘッダー情報の明記。必須。
    header("Content-Type: application/json; charset=UTF-8");
    $uid = filter_input(INPUT_POST, 'uid');
    $password = filter_input(INPUT_POST, 'password');
    // jsの方にデータ渡して、動作確認をする
    $array_lists = [
        'uidLength' => $uid,
        'passwordLength' => $password
    ];
    echo json_encode($array_lists);
?>
