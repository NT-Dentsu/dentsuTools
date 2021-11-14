// ユーザー名テキストボックスの鉛筆マーククリック時
$('.user_name img').on('click', function(){
    var txtUserName = document.getElementById('txt_user_name');

    // 既にテキストボックスが入力可能状態であれば何もしない
    if(txtUserName.disabled == false){
        return;
    }

    if(window.confirm('ニックネームを編集しますか？')){
        // 入力不可を解除する
        txtUserName.disabled = false;
        // クリアする
        txtUserName.value = '';
        // フォーカスを当てる
        txtUserName.focus();
        // エラー用の見た目にする
        $('#txt_user_name').addClass('is-invalid');
    }
});

// パスワードテキストボックスの鉛筆マーククリック時
$('.password img').on('click', function(){
    var txtPassword = document.getElementById('txt_password');

    // 既にテキストボックスが入力可能状態であれば何もしない
    if(txtPassword.disabled == false){
        return;
    }

    if(window.confirm('パスワードを編集しますか？')){
        // 入力不可を解除する
        txtPassword.disabled = false;
        // クリアする
        txtPassword.value = '';
        // フォーカスを当てる
        txtPassword.focus();
        // エラー用の見た目にする
        $('#txt_password').addClass('is-invalid');
    }
});

// ユーザー名入力チェック関数
function CheckUserNameValidation(val){
    // 半角英数字ハイフン20文字以内かチェック
    if(val.match(/^[a-z,A-Z,\-,\d]{1,20}$/)){
        // マッチしていればtrueを返す
        return true;
    }
    else{
        // マッチしていなければfalseを返す
        return false;
    }
}

// パスワード入力チェック関数
function CheckPasswordValidation(val){
    // 半角英数字ハイフン6文字以上20文字以内かチェック
    if(val.match(/^[a-z,A-Z,\-,\d]{6,20}$/)){
        // マッチしていればtrueを返す
        return true;
    }
    else{
        // マッチしていなければfalseを返す
        return false;
    }
}

// ユーザー名テキストボックスキー押下時(離れた時)
$('#txt_user_name').on('keyup', function(e){
    var txtUserName = document.getElementById('txt_user_name');

    // 入力チェック
    if(CheckUserNameValidation(txtUserName.value)){
        // マッチしていればエラー用の見た目を外す
        $('#txt_user_name').removeClass('is-invalid');
    }
    else{
        // マッチしていなければエラー用の見た目にする
        $('#txt_user_name').addClass('is-invalid');
    }
});

// パスワードテキストボックスキー押下時(離れた時)
$('#txt_password').on('keyup', function(e){
    var txtPassword = document.getElementById('txt_password');

    // 入力チェック
    if(CheckPasswordValidation(txtPassword.value)){
        // マッチしていればエラー用の見た目を外す
        $('#txt_password').removeClass('is-invalid');
    }
    else{
        // マッチしていなければエラー用の見た目にする
        $('#txt_password').addClass('is-invalid');
    }
});

// 保存ボタン押下時
$('#btn_update').on('click', function(){
    var txtUserName = document.getElementById('txt_user_name');
    var txtPassword = document.getElementById('txt_password');

    // ユーザー名の入力チェック
    if(txtUserName.disabled == false){
        // 編集モードであればチェックする
        if(!CheckUserNameValidation(txtUserName.value)){
            alert('ニックネームを指定された形式で入力してください');
            return false;
        }
    }
    // パスワードの入力チェック
    if(txtPassword.disabled == false){
        // 編集モードであればチェックする
        if(!CheckPasswordValidation(txtPassword.value)){
            alert('パスワードを指定された形式で入力してください');
            return false;
        }
    }
});
