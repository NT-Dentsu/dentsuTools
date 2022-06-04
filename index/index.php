<?php
    require_once __DIR__ . '/common/user_session.php';
    user_session_start();
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>NT-Dentsu</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link rel="stylesheet" href="/user_icon/css/user_icon.css">
    <!-- Custom styles for this template -->
    <link href="/common/css/dashboard.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- cssの読み込み -->
    <link href="/common/css/grid_layout.css" rel="stylesheet">
</head>

<body>
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

    <!-- タイトルバー -->
    <?php require_once __DIR__ . '/common/titlebar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- サイドバー -->
            <?php require_once __DIR__ . '/common/sidebar.php'; ?>
            <!-- メイン部分 -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Home</h1>
                </div>

                <!-- 「id=”container”」という親要素（div 要素）内に配置した「class=”panel_wrap”」という要素（div 要素）を整列させる処理を行う -->
                <!-- グリッドレイアウトを使用 -->
                <div id="wrapper">
                    <div id="container">
                        <!-- グリッドのサイズ調整用 -->
                        <div class="panel-wrap" style="grid-area: 1 / 1;"></div>
                        <div class="panel-wrap" style="grid-area: 1 / 2;"></div>
                        <div class="panel-wrap" style="grid-area: 1 / 3;"></div>
                        <div class="panel-wrap" style="grid-area: 1 / 4;"></div>
                        <div class="panel-wrap" style="grid-area: 2 / 1;"></div>
                        <div class="panel-wrap" style="grid-area: 3 / 1;"></div>
                        <div class="panel-wrap" style="grid-area: 4 / 1;"></div>

                        <!-- ここにパネルが追加される -->
                    </div>
                </div>


                <!-- <h2>Section title</h2> -->
            </main>
        </div>
    </div>


    <!-- cdn読み込み -->
    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous"></script>


    <!-- script -->
    <script src="/common/js/operate_paneldata.js"></script>
    <script src="/common/js/panel_class.js"></script>
    <script src="/common/js/panel_dataset_init.js"></script>
    <script src="/common/js/div_control.js"></script>
    <!-- サイドバー用のJavaScript -->
    <script src="/common/js/sidebar.js"></script>


</body>

</html>
