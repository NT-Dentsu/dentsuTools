// ページ読み込み前
$.post({
    // 絶対パスで指定する
    url: '/profile_form/php/get_update_result.php',
    // 結果をjsonで受け取る
    dataType: 'json',
}).done(function(result){
    // サーバーから更新結果を取得する
    if(result.update_status == 'OK'){
        alert('更新が完了しました');
    }
    else if(result.update_status == 'NG'){
        alert('更新失敗しました');
    }
    else{
        // 更新しなかった場合はアラートは出さない
    }
}).fail(function(XMLHttpRequest, textStatus, errorThrown){
    // エラーメッセージを表示
    alert(errorThrown);
})
