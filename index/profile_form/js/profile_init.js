// ページ読み込み時
$(function(){
    // テキストボックスを無効化する
    document.getElementById('txt_user_name').disabled = 'true';
    document.getElementById('txt_password').disabled = 'true';

    $.post({
        // 絶対パスで指定する
        url: '/profile_form/php/get_profile_info.php',
        // 結果をjsonで受け取る
        dataType: 'json',
    }).done(function(result){
        if(result.exec_status == 'OK'){
            // ユーザーマスタから取得した情報を設定する
            document.getElementById('txt_user_name').value = result.user_name;
            document.getElementById('txt_password').value = result.password;
            // 画像はパスを置き換える
            $('.user_icon').find('img').attr('src', result.user_icon);
        }
        else{
            // エラーとなった旨を表示する
            alert('エラーが発生したためメイン画面に戻ります');
            // メイン画面に遷移させる
            location.href = '/index.php'
        }
    }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        // エラーメッセージを表示
        alert(errorThrown);
    })
});
