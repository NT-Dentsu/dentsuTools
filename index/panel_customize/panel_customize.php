<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>Panel Customize</title>

    <!-- Custom styles for this template -->
    <link href="/common/css/dashboard.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <!-- cssの読み込み -->
    <!-- <link href="./css/masonry.css" rel="stylesheet"> -->
    <link href="/panel_customize/css/grid_layout.css" rel="stylesheet">
    <link href="/panel_customize/css/customize.css" rel="stylesheet">
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                                <!-- グリッドのサイズ調整用兼ポジション取得用 -->
                                <div class="panel-wrap" name="0" style="grid-area: 1 / 1;"></div>
                                <div class="panel-wrap" name="1" style="grid-area: 1 / 2;"></div>
                                <div class="panel-wrap" name="2" style="grid-area: 1 / 3;"></div>
                                <div class="panel-wrap" name="3" style="grid-area: 1 / 4;"></div>
                                <div class="panel-wrap" name="4" style="grid-area: 2 / 1;"></div>
                                <div class="panel-wrap" name="5" style="grid-area: 2 / 2;"></div>
                                <div class="panel-wrap" name="6" style="grid-area: 2 / 3;"></div>
                                <div class="panel-wrap" name="7" style="grid-area: 2 / 4;"></div>
                                <div class="panel-wrap" name="8" style="grid-area: 3 / 1;"></div>
                                <div class="panel-wrap" name="9" style="grid-area: 3 / 2;"></div>
                                <div class="panel-wrap" name="10" style="grid-area: 3 / 3;"></div>
                                <div class="panel-wrap" name="11" style="grid-area: 3 / 4;"></div>
                                <div class="panel-wrap" name="12" style="grid-area: 4 / 1;"></div>
                                <div class="panel-wrap" name="13" style="grid-area: 4 / 2;"></div>
                                <div class="panel-wrap" name="14" style="grid-area: 4 / 3;"></div>
                                <div class="panel-wrap" name="15" style="grid-area: 4 / 4;"></div>

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
                            <li><a id="panel_tab" href="panel_customize.php">Panel</a></li>
                            <li><a id="contents_tab" href="panel_customize.php">Contents</a></li>
                            <li><a id="preset_tab" href="panel_customize.php">Preset</a></li>
                        </ul>

                        <div>
                            <!-- panelタブ -->
                            <div id="panel">
                                <h7>Panel</h7>

                                <!-- ここに各サイズのパネルを追加 -->
                                <!-- パネルの種類は可変なのでjsで動的に設定する予定 -->

                                <br>

                                <div class="thumbnail" id="panel_L">
                                    <label class="panel_label">4×4</label>
                                    <img src="/images/image_panel_L.jpg" name="2">
                                </div>

                                <div class="thumbnail" id="panel_M_hol">
                                    <label class="panel_label">1×2</label>
                                    <img src="/images/image_panel_M_h.jpg" name="4">
                                </div>

                                <div class="thumbnail" id="panel_M_var" style="width: 20%;">
                                    <label class="panel_label">2×1</label>
                                    <img src="/images/image_panel_M_v.jpg" name="3">
                                </div>

                                <div class="thumbnail" id="panel_S" style="width: 20%;">
                                    <label class="panel_label">1×1</label>
                                    <img src="/images/image_panel_S.jpg" name="5">
                                </div>

                            </div>

                            <!-- contentsタブ -->
                            <div id="contents">
                                <h7>Contents</h7>
                                <div>
                                    <!-- ここにコンテンツ選択の諸々が表示される -->
                                </div>
                            </div>

                            <!-- presetタブ -->
                            <div id="preset">
                                <h7>Preset Layout</h7>

                                <div class="thumbnail" id="preset01">
                                    <img src="/images/preset01.png">
                                </div>

                                <div class="thumbnail" id="preset02">
                                    <img src="/images/preset02.png">
                                </div>

                                <div class="thumbnail" id="preset03">
                                    <img src="/images/preset03.png">
                                </div>

                                <div class="thumbnail" id="preset04">
                                    <img src="/images/preset04.png">
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
    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous"></script>
    <!-- Lightbox2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">


    <!-- script -->
    <script src="/common/js/get_presetdata.js"></script>
    <script src="/panel_customize/js/global_variables.js"></script>
    <script src="/panel_customize/js/operate_paneldata.js"></script>
    <script src="/panel_customize/js/panel_class.js"></script>
    <script src="/panel_customize/js/div_control.js"></script>
    <script src="/panel_customize/js/panel_dataset_init_customize.js"></script>
    <script src="/panel_customize/js/customize.js"></script>
    <script src="/panel_customize/js/customize_preset.js"></script>
    <script src="/panel_customize/js/customize_contents.js"></script>
    <script src="/panel_customize/js/customize_panel.js"></script>
    <script src="/panel_customize/js/settings.js"></script>
    <script src="/panel_customize/js/btn_event.js"></script>
    <script src="/panel_customize/js/event_onload.js"></script>
    <!-- サイドバー用のJavaScript -->
    <script src="/common/js/sidebar.js"></script>
</body>

</html>
