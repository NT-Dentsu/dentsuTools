$(function(){
    $('#get_data').click(function(e) {
        getPanelName().done(function(data){
            console.log(data);
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

// m_panelテーブルに格納されているpanel_nameを取り出す関数
// JSONデータの形式:{status：実行結果のステータス, array：パネルネームの配列}
function getPanelName() {
    return $.get({
        url : "/panel_customize/php/get_panel_name.php",
        dataType : 'json'
    });
}
