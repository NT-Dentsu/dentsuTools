<?php
    #パスワードのハッシュ関連の関数群

    # 制作者:towa1204
    # 更新日:2021/5/1
    # 機能:パスワードのハッシュ値を生成
    function generatePasswordHash($password) {
        # 60文字のハッシュ値を生成 失敗時false
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        return $password_hash;
    }

    # 制作者:towa1204
    # 更新日:2021/5/1
    # 機能:入力されたパスワードのハッシュ値とDB中のハッシュ値が一致するか検証
    function verifyPasswordHash($input_password, $db_passwordHash) {
        $result = password_verify($input_password, $db_passwordHash);
        return $result;
    }

?>
