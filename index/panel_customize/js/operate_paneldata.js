$(function(){
    $('#get_data').click(function(e) {

        getUserPanels().done(function(data){
            // get_user_panels.phpの結果がdataに格納される
            console.log(data);
            // 以下にdataを取得した後の処理を結果
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
            // ajax通信の処理に失敗したとき
            alert(errorThrown);
        });

    })
})

// セッション変数に格納されているユーザ名のパネルデータを取得し返す関数
// JSONデータの形式：{status: 実行結果のステータス, array: パネルデータ(連想配列の配列)}
function getUserPanels() {
    return $.get({
        url : "/panel_customize/php/get_user_panels.php",
        dataType : 'json'
    });
}
