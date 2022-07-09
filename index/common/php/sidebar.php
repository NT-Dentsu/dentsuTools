<!-- d-md-blockで、768px以上で要素を表示するようにする -->
<nav id="sidebarMenu" class="sidebar col-md-3 col-lg-2 d-md-block bg-light collapse">
    <!-- スクロール時に追従させる -->
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <!-- メイン画面へのリンク -->
            <li class="nav-item">
                <a class="nav-link" href="/index.php">
                    <!-- 表示されるアイコンを設定する -->
                    <span data-feather="home"></span>
                    Home
                </a>
            </li>
            <!-- カスタマイズ画面へのリンク -->
            <li class="nav-item">
                <a class="nav-link" href="/panel_customize/panel_customize.php">
                    <!-- 表示されるアイコンを設定する -->
                    <span data-feather="layout"></span>
                    Customize
                </a>
            </li>
            <!-- プロフィール画面へのリンク -->
            <li class="nav-item">
                <a class="nav-link" href="/profile_form/profile.php">
                    <!-- 表示されるアイコンを設定する -->
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <!-- ダミーリンク -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <!-- 表示されるアイコンを設定する -->
                    <span data-feather="file"></span>
                    Contents
                </a>
            </li>
        </ul>
    </div>
</nav>
