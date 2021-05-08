// ページ読み込み時
$(function(){
    $.post({
        // 絶対パスで指定する
        url: '/user_icon/php/get_user_icon.php',
        // ToDo:セッション情報からユーザーIDを受け取る(削除予定)
        data: {
            userId: "user1"
        },
        // 結果をjsonで受け取る
        dataType: 'json',
    }).done(function(result){
        // imgタグのsrcを受け取ったパスで置き換える
        $('.user_icon').children('img').attr('src', result.user_icon);
    }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        // エラーメッセージを表示
        alert(errorThrown);
    })
});

// ToDo:テスト用ボタンクリック時(削除予定)
$('#test_button').on('click', function(){
    $.post({
        // 絶対パスで指定する
        url: '/user_icon/php/get_user_icon.php',
        // セッション情報からユーザーIDを受け取る
        data: {
            userId: $('#test_id').val()
        },
        // 結果をjsonで受け取る
        dataType: 'json',
    }).done(function(result){
        // imgタグのsrcを受け取ったパスで置き換える
        $('.user_icon').children('img').attr('src', result.user_icon);
    }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        // エラーメッセージを表示
        alert(errorThrown);
    })
});
