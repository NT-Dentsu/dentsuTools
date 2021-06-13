<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>signin</title>
    <link rel="stylesheet" href="./css/common_sign.css">
    <link rel="stylesheet" href="./css/signup.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <form class="form">
        <h1><a href="../index.html">Dentsu Tools</a></h1>
        <p>
            登録ボタンをクリック<br>
            半角英数字ハイフン<br>6文字以上20文字以内
        </p>
        <div class="form-group">
            <input type="text" class="form-control is-invalid" placeholder="ユーザID" required autofocus>
            <div class="invalid-feedback">半角英数字ハイフン，6文字以上20文字以内</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control is-invalid" placeholder="パスワード" required>
            <div class="invalid-feedback">半角英数字ハイフン，6文字以上20文字以内</div>
        </div>
        <button class="btn btn-lg btn-danger btn-block" id="signup_button" type="button">登録</button>
    </form>
    <a href="/sign_inup_form/signin.php">ログイン画面へ戻る</a>
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
    <script src="js/input_check.js"></script>
    <script src="js/ajax_postData.js"></script>
</body>

</html>
