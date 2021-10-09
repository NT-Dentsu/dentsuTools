/**
 * 制作者：bot810
 * 制作日：2020/07/22
 * パネル関連の並びを定義
 * home画面とcoutomize画面で一部違いがあるため別ファイルとする
 */


// 初期値定義
// home画面ではそのまま定義
// costomize画面ではhome画面の値を利用
let init = Array();

// データを格納
init.push(new PanelInfo("size L", 4, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M hol", 0, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M var", 3, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M var", 6, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M var", 13, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 2, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 11, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 12, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 15, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));

// パネルデータをデータベースから取得
let panelData = JSON.parse(getUserPanels());

// パネルデータをもとにパネルクラス作成
let panelInfo = new Array();
panelData.forEach(data => {
    // 連想配列の形式(要素は順不同)
    // {"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>, "content_link" : <String>, "content_image" : <String>}
    // PanelInfoの引数
    // (名前, 位置, 大きさ, 画像, ツールへのリンク)
    panelInfo.push(data.panel_name, data.anchor_num, data.panel_size, data.content_image, data.content_link);
});

