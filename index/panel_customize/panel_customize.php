<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>Panel Customize</title>

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- cssの読み込み -->
    <link href="./css/masonry.css" rel="stylesheet">
</head>

<body>
    <!-- タイトルバー -->
    <?php require_once __DIR__ . '/../common/titlebar.php'; ?>

    <div class="container-fluid">
        <!-- 横の部分 -->
        <div class="row">
            <!-- サイドバー -->
            <?php require_once __DIR__ . '/../common/sidebar.php'; ?>

            <!-- メイン部分 -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Panel Customize</h1>
                    <!-- 上のボタン達 -->
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->


                <!-- 「id=”container”」という親要素（div 要素）内に配置した「class=”panel_wrap”」という要素（div 要素）を整列させる処理を行う -->
                <div id="wrapper">
                    <div id="container">
                        <!-- ここにパネルが追加される -->
                    </div>
                </div>


                <!-- <h2>Section title</h2> -->
            </main>
        </div>
    </div>



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


    <!-- cdn読み込み -->
    <!-- Masonry -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous"></script>


    <!-- script -->
    <script src="./js/settings.js"></script>
    <script src="./js/div_control.js"></script>
    <!-- <script src="./js/display_reflesh.js"></script> -->

</body>

</html>