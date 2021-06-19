// ページ読み込み時
$(function(){
    // クリック時に出現するリストを非表示にする
    document.getElementById('user_icon_list').style.visibility = 'hidden';
});

// ユーザーアイコンクリック時
$('.user_icon').on('click', function(){
    $.post({
        // 絶対パスで指定する
        url: '/user_icon/php/check_user_login.php',
        // ToDo:セッション情報からユーザーIDを受け取る(削除予定)
        data: {
            userId: $('#test_id').val()
        },
        // 結果をjsonで受け取る
        dataType: 'json',
    }).done(function(result){
        // ログイン状態か判定する
        if(result.login_status == 'logout'){
            // サインイン画面に遷移させる
            window.location.href = '/sign_inup_form/signin.php';
        }
        else{
            // リストの状況を取得
            var status = document.getElementById('user_icon_list');

            if(status.style.visibility == 'hidden'){
                // リスト非表示時はリストを表示する
                document.getElementById('user_icon_list').style.visibility = 'visible';
            }
            else{
                // リスト表示時はリストを非表示にする
                document.getElementById('user_icon_list').style.visibility = 'hidden';
            }
        }
    }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        // エラーメッセージを表示
        alert(errorThrown);
    })
});

// ユーザーアイコンリストクリック時
$('#user_icon_list li').on('click', function(){
    // ログアウトボタンがクリックされた
    if($(this).text() == 'ログアウト'){
        // ToDo:セッション管理のマージ終わったらログアウト処理を入れる
        alert('ログアウトしました');
    }
});

// どこかクリックされたとき
$(document).on('click', function(e){
    // ユーザーアイコン以外がクリックされた
    if($(e.target).closest('.user_icon').length <= 0){
        // リストを非表示にする
        document.getElementById('user_icon_list').style.visibility = 'hidden';
    }
});
