<?php
    # セッションに関する関数群

    #定数定義
    define("ONEHOUR", 3600);
    define("PAST", time()-42000);

    # 制作者:towa1204
    # 更新日:2021/6/26
    # 機能:セッションの開始とセッションタイムアウトのチェックを行う
    function user_session_start() {
        try {
            if (session_start() == false) {
                throw new Exception("session did not work");
            }
            if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > ONEHOUR)) {
                # 最後にアクセスしてから1時間経過したとき
                # セッション変数の初期化
                $_SESSION = array();
                # セッションファイルの破棄
                session_destroy();
                # セッションタイムアウトの通知、signin.phpへ遷移
                echo "<script>alert('セッションタイムアウトしました');</script>";
                echo "<script>location.href = '/sign_inup_form/signin.php';</script>";
            }
            # 最終アクセス時間の更新
            $_SESSION["last_activity"] = time();   
            return true;
        } catch(Exception $ex) {
            return false;
        }
    }

    # 制作者:towa1204
    # 更新日:2021/6/26
    # 機能:ユーザのログインを行う
    function session_login($uid) {
        try {
            if (session_start() == false) {
                throw new Exception("session did not work");
            }
            session_regenerate_id(true) == false;
            // セッションファイルにユーザIDを格納する
            $_SESSION['user_id'] = $uid;
            return true;
        } catch(Exception $ex) {
            return false;
        }
    }

    # 制作者:towa1204
    # 更新日:2021/6/26
    # 機能:全ユーザのログアウトを行う
    function session_logout() {
        try {
            if (session_start() == false) {
                throw new Exception("session did not work");
            }
            # セッション変数の初期化
            $_SESSION = array();
            # セッションクッキーを削除
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', PAST,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            # セッションファイルの破棄
            session_destroy();
            return true;
        } catch(Exception $ex) {
            return false;
        }
    }
?>
