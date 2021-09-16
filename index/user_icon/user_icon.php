<?php
    // セッションスタート
    require_once __DIR__ . '/../common/user_session.php';
    user_session_start();
?>
<!-- ユーザーアイコン -->
<div class="user_icon">
    <!-- ユーザーがアップロードした画像を表示する -->
    <img src="/content/default_icon.jpg" alt="user_icon">
    <!-- imgのpathを画像のパスに置き換える -->
    <div id="user_icon_list">
    <!-- クリック時に出現するリスト -->
    <ul>
        <li><a href="/profile_form/profile.php"><item>プロフィール</item></a></li>
        <!-- クリック時はログアウトしてメイン画面に飛ばす -->
        <li><a href="/index.php"><item>ログアウト</item></a></li>
    </ul>
    </div>
    <!-- スクリプト -->
    <script src="/user_icon/js/user_icon_img.js"></script>
    <script src="/user_icon/js/user_icon_click.js"></script>
</div>
