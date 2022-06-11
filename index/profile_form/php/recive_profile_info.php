<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/dbaccess.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/user_session.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/password_hash.php';

    // アップロード先のパス
    const UPLOAD_PATH = '/content/user_icon';
    // ユーザーアイコンの拡張子のパターン(iを付けることで大文字小文字を区別しない)
    const PATTERN_USER_ICON = '/.jtif$|.pjpeg$|.jpeg$|.pjp$|.jpg$|.png$/i';
    // ユーザー名のパターン
    const PATTERN_USER_NAME = '/^[a-z,A-Z,\-,\d]{1,20}$/';
    // パスワードのパターン
    const PATTERN_PASSWORD = '/^[a-z,A-Z,\-,\d]{6,20}$/';

    // ----- ここからユーザーアイコン関係 -----

    // 制作者:KARASU-2000
    // 更新日:2021/9/25
    // 機能:受け取ったユーザーアイコンのアップロードを行う(失敗したらfalseを返す)
    function uploadUserIcon($usreId, $tempFile, $removeFile){
        try{
            if(move_uploaded_file($tempFile, $removeFile) != true){
                // 失敗したらfalseを返す
                return false;
            }

            // 処理が成功すればtrueを返す
            return true;
        }
        catch(Exception $ex){
            // 例外が発生したらfalseを返す
            return false;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/9/25
    // 機能:アップロードしたパスでユーザーマスタを更新する
    function updateIconPath($userId, $updatePath){
        try{
            // DBアクセスクラスを生成する
            $clsDb = new DBAccess();
            // 発行するクエリの定義
            $query = 'update m_user set user_icon = :user_icon where user_id = :user_id;';

            // DB接続
            $pdo = $clsDb->connectDB();
            // トランザクション開始
            $clsDb->beginTransaction($pdo);
            // 更新行数を取得するため一度NULLでクリアする
            $param = array(
                ':user_icon' => NULL,
                ':user_id' => $userId,
            );
            // SQL実行
            $clsDb->executePrepareSQL($pdo, $query, $param);
            // パラメーター変更
            $param[':user_icon'] = $updatePath;
            // SQL実行
            $result = $clsDb->executePrepareSQL($pdo, $query, $param);
            // 更新された件数を取り出す
            $updateCount = $result->rowCount();
            if($updateCount <= 0){
                // ロールバック
                $clsDb->rollbackTransaction($pdo);
                // 更新結果が0件以下だったらfalseを返す
                return false;
            }
            // コミット
            $clsDb->commitTransaction($pdo);
            // DB切断
            $clsDb->disconnectDB($pdo);

            // 処理が成功すればtrueを返す
            return true;
        }
        catch(Exception $ex){
            // 例外が発生したらfalseを返す
            return false;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/9/25
    // 機能:ユーザーアイコンを更新する
    function updateUserIcon($userId){
        try{
            // ファイルが正常にアップロードされたかチェック
            if($_FILES['selected_user_icon']['error'] != UPLOAD_ERR_OK){
                // アップロードに失敗していればスローする
                throw new Exception('file upload error');
            }

            // ファイルが画像形式かチェック
            $matches = array();
            if(preg_match(PATTERN_USER_ICON, $_FILES['selected_user_icon']['name'], $matches) == 0){
                // 拡張子が一致しなければスローする
                throw new Exception('file extension error');
            }

            // マッチしたテキスト(拡張子)を取り出す
            $extension = $matches[0];
            // ファイル名を作成する(ユーザーID_icon.拡張子)
            $fileName = UPLOAD_PATH . '/' . $userId . '_' . 'icon' . $extension;
            // 一時ファイルパスを取得する
            $tempFile = $_FILES['selected_user_icon']['tmp_name'];
            // アップロード後のファイルパスを作成する
            $removeFile = $_SERVER['DOCUMENT_ROOT'] . $fileName;

            // ファイルのアップロードを実行する
            if(uploadUserIcon($userId, $tempFile, $removeFile) == false){
                // 失敗したらスローする
                throw new Exception('upload did not work');
            }
            // ユーザーマスタを更新する
            if(updateIconPath($userId, $fileName) == false){
                // 失敗したらスローする
                throw new Exception('update did not work');
            }
        }
        catch(Exception $ex){
            // 呼び出し元にスローする
            throw $ex;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/11/14
    // 機能:ユーザー名の入力チェックをする
    function validationUserName($userName){
        try{
            // パターンにマッチすればtrueを返す
            if(preg_match(PATTERN_USER_NAME, $userName) == 1){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $ex){
            // 例外が発生したらfalseを返す
            return false;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/11/14
    // 機能:パスワードの入力チェックする
    function validationPassword($password){
        try{
            // パターンにマッチすればtrueを返す
            if(preg_match(PATTERN_PASSWORD, $password)){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $ex){
            // 例外が発生したらfalseを返す
            return false;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/11/14
    // 機能:受け取ったユーザー名でユーザーマスタを更新する
    function updateUserName($userId, $userName){
        try{
            // DBアクセスクラスを生成する
            $clsDb = new DBAccess();
            // 発行するクエリの定義
            $query = 'update m_user set user_name = :user_name where user_id = :user_id;';

            // DB接続
            $pdo = $clsDb->connectDB();
            // トランザクション開始
            $clsDb->beginTransaction($pdo);
            // 更新行数を取得するため一度ブランクでクリアする
            $param = array(
                ':user_name' => '',
                ':user_id' => $userId,
            );
            // SQL実行
            $clsDb->executePrepareSQL($pdo, $query, $param);
            // パラメーター変更
            $param[':user_name'] = $userName;
            // SQL実行
            $result = $clsDb->executePrepareSQL($pdo, $query, $param);
            // 更新された件数を取り出す
            $updateCount = $result->rowCount();
            if($updateCount <= 0){
                // ロールバック
                $clsDb->rollbackTransaction($pdo);
                // 更新結果が0件以下だったらfalseを返す
                return false;
            }
            // コミット
            $clsDb->commitTransaction($pdo);
            // DB切断
            $clsDb->disconnectDB($pdo);
        }
        catch(Exception $ex){
            // 呼び出し元にthrowする
            throw $ex;
        }
    }

    // 制作者:KARASU-2000
    // 更新日:2021/11/14
    // 機能:受け取ったパスワードでユーザーマスタを更新する
    function updatePassword($userId, $password){
        try{
            // DBアクセスクラスを生成する
            $clsDb = new DBAccess();
            // 発行するクエリの定義
            $query = 'update m_user set password_hash = :password where user_id = :user_id;';
            // パスワードのハッシュ化
            $passwordHash = generatePasswordHash($password);

            // DB接続
            $pdo = $clsDb->connectDB();
            // トランザクション開始
            $clsDb->beginTransaction($pdo);
            // 更新行数を取得するため一度ブランクでクリアする
            $param = array(
                ':password' => '',
                ':user_id' => $userId,
            );
            // SQL実行
            $clsDb->executePrepareSQL($pdo, $query, $param);
            // パラメーター変更
            $param[':password'] = $passwordHash;
            // SQL実行
            $result = $clsDb->executePrepareSQL($pdo, $query, $param);
            // 更新された件数を取り出す
            $updateCount = $result->rowCount();
            if($updateCount <= 0){
                // ロールバック
                $clsDb->rollbackTransaction($pdo);
                // 更新結果が0件以下だったらfalseを返す
                return false;
            }
            // コミット
            $clsDb->commitTransaction($pdo);
            // DB切断
            $clsDb->disconnectDB($pdo);
        }
        catch(Exception $ex){
            // 呼び出し元にthrowする
            throw $ex;
        }
    }

    // ----- ここまでユーザーアイコン関係 -----

    // main処理
    try{
        // セッションスタート
        if(session_start() == false){
            // セッションスタートが失敗したらスローする
            throw new Exception('session did not work');
        }
        // セッションからユーザーIDを取得する
        $userId = $_SESSION['user_id'];

        // ファイルサイズが0バイトでなければ
        if($_FILES['selected_user_icon']['size'] > 0){
            // ユーザーアイコンを更新する
            updateUserIcon($userId);
        }

        // ユーザー名がNULLでなければ
        if(isset($_POST['user_name']) == true){
            $userName = $_POST['user_name'];
            // 入力チェック
            if(validationUserName($userName) == false){
                throw new Exception('invalid user name');
            }
            // ユーザーマスタ更新
            updateUserName($userId, $userName);
        }

        // パスワードがNULLでなければ
        if(isset($_POST['password']) == true){
            $password = $_POST['password'];
            // 入力チェック
            if(validationPassword($password) == false){
                throw new Exception('invalid password');
            }
            // ユーザーマスタ更新
            updatePassword($userId, $password);
        }

        // アラートを出す(ヒアドキュメントはインデントがあると動作しない)
        echo <<<EOM
            <script>
                if(!alert('更新しました')){
                    window.location.href = '/profile_form/profile.php';
                }
            </script>;
EOM;
        exit;
    }
    catch(Exception $ex){
        // アラートを出す(ヒアドキュメントはインデントがあると動作しない)
        echo <<<EOM
            <script>
                if(!alert('更新失敗しました')){
                    window.location.href = '/profile_form/profile.php';
                }
            </script>;
EOM;
        exit;
    }
?>
