// セッション変数に格納されているユーザ名のパネルデータを取得し返す関数
// 戻り値JSONデータの形式：{status: 実行結果のステータス, array: パネルデータ(連想配列の配列)}
// 連想配列の形式(要素は順不同)
// {"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>, "content_link" : <String>, "content_image" : <String>}
function getUserPanels() {
    return $.get({
        url : "/panel_customize/php/get_user_panels.php",
        dataType : 'json'
    });
}

// ユーザパネルのデータを渡しDBに反映させる関数
// 0~15のアンカー番号のうち指定されていないものは、パネルデータ・パネルサイズをNULLにする
// 渡す変数dictの形式：連想配列を要素とする配列
// 連想配列の形式(要素は順不同){"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>}
function updateUserPanels(dict) {
    return $.post({
        url : "/panel_customize/php/update_user_panels.php",
        dataType : 'json',
        contentType : "application/json",
        data : JSON.stringify({
            panelData : dict
        })
    });
}

// m_panelテーブルに格納されているpanel_nameを取り出す関数
// 戻り値JSONデータの形式:{status：実行結果のステータス, array：パネルネームの配列}
function getPanelName() {
    return $.get({
        url : "/panel_customize/php/get_panel_name.php",
        dataType : 'json'
    });
}
