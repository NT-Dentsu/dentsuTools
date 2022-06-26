<!-- sticky-topでタイトルバーを常に上に表示する -->
<nav class="navbar navbar-dark sticky-top bg-dark p-0 shadow">
    <!-- pt-3でpadding-topを1rem、pb-3でpadding-bottomに1rem、mr-0でmargin-rightに0remを指定する -->
    <a class="navbar-brand col-md-3 col-lg-2 pt-3 pb-3 mr-0" href="/index.php">NT-dentsu</a>
    <!-- px-3でpadding-rightとpadding-leftに1remを指定する -->
    <ul class="navbar-nav px-3">
        <li class="nav-item">
            <!-- ユーザーアイコン -->
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/user_icon/user_icon.php") ?>
        </li>
    </ul>
</nav>
