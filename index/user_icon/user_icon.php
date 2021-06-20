<!-- ToDo:ここからテスト用のオブジェクト -->
<form>
    user_iconテスト用部品：<input type="text" id="test_id">
    <button type="button" id="test_button">ユーザーID送信</button>
</form>
<!-- ToDo:ここまでテスト用のオブジェクト -->

<!-- ユーザーアイコン -->
<div class="user_icon">
    <!-- ユーザーがアップロードした画像を表示する -->
    <img src="/content/default_icon.jpg" alt="user_icon">
    <!-- imgのpathを画像のパスに置き換える -->
    <div id="user_icon_list">
    <!-- クリック時に出現するリスト -->
    <ul>
        <!-- ToDo:プロフィール画面作ったらリンクを変更する -->
        <li><a href="/index.php"><item>プロフィール</item></a></li>
        <!-- クリック時はログアウトしてメイン画面に飛ばす -->
        <li><a href="/index.php"><item>ログアウト</item></a></li>
    </ul>
    </div>
    <!-- スクリプト -->
    <script src="/user_icon/js/user_icon_img.js"></script>
    <script src="/user_icon/js/user_icon_click.js"></script>
</div>
