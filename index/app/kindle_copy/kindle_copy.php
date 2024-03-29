<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kindle Copy</title>
    <link rel="stylesheet" href="/user_icon/css/user_icon.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/common/css/dashboard.css">
    <link rel="stylesheet" href="/app/kindle_copy/kindle_copy.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
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
                    <h1 class="h2">Kindle Copy</h1>
                </div>

                <div class="contents">
                    <p>Kindleでコピーしたテキストの空白の削除および改行を行うツールです。<br>
                    オプションで、引用元の削除も行えます。</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="del_quote">
                        <label class="form-check-label" for="del_quote">引用元の削除</label>
                    </div>

                    <div class="form-group">
                        <textarea id="input" class="form-control"  placeholder="Input"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea id="output" class="form-control" placeholder="Output"></textarea>
                    </div>
                    <button type="button" class="btn btn-outline-primary">Copy</button>
                </div>
            </main>
        </div>
    </div>

    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous"></script>
    <script src="/common/js/settings.js"></script>
    <script src="/app/kindle_copy/kindle_copy.js"></script>
</body>

</html>
