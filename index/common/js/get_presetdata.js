// 指定したプリセットidに応じたプリセットデータを返す関数
// 戻り値JSONデータの形式：{status: 実行結果のステータス, array: パネルデータ(連想配列の配列)}
// 連想配列の形式(要素は順不同)
// {"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>, "content_link" : <String>, "content_image" : <String>}
function get_presetdata(preset_id) {
    return $.post({
        url : "/common/get_presetdata.php",
        dataType : 'json',
        data :{
            "preset_id" : preset_id
        }
    });
}
