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
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <!-- cssの読み込み -->
    <!-- <link href="./css/masonry.css" rel="stylesheet"> -->
    <link href="./css/grid_layout.css" rel="stylesheet">
    <link href="./css/customize.css" rel="stylesheet">
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
                </div>

                <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->


                <!-- ここからカスタマイズ用の諸々 -->

                <!-- 横並びにするために全体をラップ -->
                <div id="customize_flex">

                    <!-- プレビュー画面 -->
                    <div id="preview">
                        <h3>Now Layout</h3>
                        <!-- 「id=”container”」という親要素（div 要素）内に配置した「class=”panel_wrap”」という要素（div 要素）を整列させる処理を行う -->
                        <div id="wrapper">
                            <div id="container">
                                <!-- グリッドのサイズ調整用 -->
                                <div class="panel-wrap"></div>

                                <!-- ここにパネルが追加される -->
                            </div>
                        </div>
                    </div>

                    <!-- メニュー画面 -->
                    <div id="menu">
                        <!-- 画像クリックで現在の状態を確認 -->
                        <!-- Lightbox2を使用して画像の拡縮を行う -->
                        <!-- 参考サイト：https://allabout.co.jp/gm/gc/470618/ -->

                        <h5>Customize Menu</h5>

                        <ul>
                            <li><a href="panel_customize.php">Panel</a></li>
                            <li><a href="panel_customize.php">Contents</a></li>
                            <li><a href="panel_customize.php">Preset</a></li>
                        </ul>

                        <div>
                            <div id="panel">
                                <h7>Panel</h7>
                            </div>

                            <div id="contents">
                                <h7>Contents</h7>
                            </div>

                            <div id="preset">
                                <h7>Preset Layout</h7>

                                <div class="thumbnail" id="preset01">
                                    <img src="/panel_customize/images/preset01.png">
                                </div>

                                <div class="thumbnail" id="preset02">
                                    <img src="/panel_customize/images/preset02.png">
                                </div>

                                <div class="thumbnail" id="preset03">
                                    <img src="/panel_customize/images/preset03.png">
                                </div>

                                <div class="thumbnail" id="preset04">
                                    <img src="/panel_customize/images/preset04.png">
                                </div>
                            </div>
                        </div>

                        <!-- <input id="btn-Preview-Image" type="button" value="プレビュー" />
                        <a id="btn-Convert-Html2Image" href="#">ダウンロード</a>
                        <br />
                        <h3>プレビュー :</h3>
                        <div id="previewImage">
                        </div> -->

                    </div>



                </div>

                <!-- 保存ボタンとキャンセルボタン -->
                <div class="customize_button">
                    <button type="button" name="cancel" class="btn btn-danger">キャンセル</button>
                    <button type="button" name="update" class="btn btn-primary">保存</button>
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
    <!-- html2canvas -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    <!-- <script src="https://unpkg.com/html2canvas@1.0.0-rc.7/dist/html2canvas.js"></script> -->
    <!-- Lightbox2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>

    <!-- script -->
    <script src="./js/operate_paneldata.js"></script>
    <script src="./js/panel_class.js"></script>
    <script src="./js/panel_dataset_init_customize.js"></script>
    <script src="./js/panel_priset_layout.js"></script>
    <script src="./js/settings.js"></script>
    <script src="./js/div_control.js"></script>
    <!-- <script src="./js/display_reflesh.js"></script> -->
    <script src="./js/customize.js"></script>
    <!-- <script src="./js/sync.js"></script> -->
    <script src="./js/btn_event.js"></script>
    <!-- サイドバー用のJavaScript -->
    <script src="../common/js/sidebar.js"></script>
</body>

</html>
