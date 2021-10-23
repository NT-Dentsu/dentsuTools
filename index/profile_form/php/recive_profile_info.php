<?php
    // 自身のディレクトリからの絶対パスを指定する
    require_once __DIR__ . '/../../common/dbaccess.php';
    require_once __DIR__ . '/../../common/user_session.php';

    // アップロード先のパス
    const UPLOAD_PATH = '/content/user_icon';

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
                // アップロードに失敗していればfalseを返す
                return false;
            }
            // ファイル名を作成する
            $fileName = UPLOAD_PATH . '/' . $userId . '_' . $_FILES['selected_user_icon']['name'];
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
