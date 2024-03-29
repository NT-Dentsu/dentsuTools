<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/user_session.php';
    user_session_start();
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>NT-Dentsu</title>

    <link rel="stylesheet" href="/user_icon/css/user_icon.css">
    <link rel="stylesheet" href="/profile_form/css/profile.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/common/css/dashboard.css" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    inegrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- タイトルバー -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/titlebar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- サイドバー -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/sidebar.php'; ?>
            <!-- メイン部分 -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Profile</h1>
                </div>
                <form method="post" name="profile_form" action="/profile_form/php/recive_profile_info.php" enctype="multipart/form-data">
                    <!-- プロフィール画面 -->
                    <div class="profile">
                        <!-- ユーザーアイコン -->
                        <div class="user_icon">
                            <!-- ファイル選択ボックスをユーザーアイコンで隠す -->
                            <label>
                                <img src="/content/default_icon.jpg" alt="user_icon">
                                <input type="file" name="selected_user_icon" id="selected_user_icon" accept="image/jpeg, image/x-png">
                            </label>
                        </div>
                        <!-- ユーザー名 -->
                        <div class="user_name">
                            ニックネーム<br>
                            <input type="text" name="user_name" id="txt_user_name" maxlength="20" placeholder="ニックネームを入力">
                            <img src="/profile_form/images/edit_black_36dp.svg" alt="編集">
                            <div class="invalid-feedback">半角英数字ハイフン, 20文字以内</div>
                        </div>
                        <!-- パスワード -->
                        <div class="password">
                            パスワード<br>
                            <input type="password" name="password" id="txt_password" maxlength="20" placeholder="パスワードを入力">
                            <img src="/profile_form/images/edit_black_36dp.svg" alt="編集">
                            <div class="invalid-feedback">半角英数字ハイフン，6文字以上20文字以内</div>
                        </div>
                        <!-- 保存ボタンとキャンセルボタン -->
                        <div class="profile_button">
                            <button type="button" name="cancel" class="btn btn-danger" id="btn_cancel">キャンセル</button>
                            <button type="submit" name="update" class="btn btn-primary" id="btn_update">保存</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <!-- cdn読み込み -->
    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous"></script>
    <!-- script -->
    <script src="/common/js/settings.js"></script>
    <script src="/common/js/sidebar.js"></script>
    <script src="/profile_form/js/profile_init.js"></script>
    <script src="/profile_form/js/profile_change.js"></script>
    <script src="/profile_form/js/profile_edit.js"></script>
</body>
</html>
