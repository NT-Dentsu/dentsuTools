/**
 * 制作者：bot810
 * 制作日：2021/10/09
 * 保存ボタンとキャンセルボタンのイベントを設定
 */


// nameで要素取得
let update = $("[name='update']");
let cancel = $("[name='cancel']");


// ボタンのイベント
// 保存ボタン
update.click(function () {
    alert("update");

    // データベースに変更を反映
    let dict = new Array()
    panelInfo.forEach(info => {
        dict.push(info.data())
    });
    updateUserPanels(dict);
});
// キャンセルボタン
cancel.click(function () {
    alert("cancel");

    // もとの奴に戻す
    panelInfo = new Array(); // 初期化
    panelData.forEach(data => {
        // 連想配列の形式(要素は順不同)
        // {"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>, "content_link" : <String>, "content_image" : <String>}
        // PanelInfoの引数
        // (名前, 位置, 大きさ, 画像, ツールへのリンク)
        panelInfo.push(data.panel_name, data.anchor_num, data.panel_size, data.content_image, data.content_link);
    });
});

