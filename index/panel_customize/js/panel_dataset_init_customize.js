/**
 * 制作者：bot810
 * 制作日：2020/07/22
 * パネル関連の並びを定義
 * home画面とcoutomize画面で一部違いがあるため別ファイルとする
 */


// 初期値定義
// home画面ではそのまま定義
// costomize画面ではhome画面の値を利用
// セッションストレージを利用
// 参考サイト；https://qiita.com/uralogical/items/ade858ccfa164d164a3b

//ストレージから読み込んだJSON文字列を配列に戻す(暫定)
let panelInfo = JSON.parse(sessionStorage.getItem("panelInfo"));

// ここでデータベースから読み込む
//let panelInfo = DBread();


// プリセットレイアウトの並びを定義
let data01 = new Array();
let data02 = new Array();
let data03 = new Array();
let data04 = new Array();

// プリセット01
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data01.push(new PanelInfo("size L", 4, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M hol", 0, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M var", 3, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M var", 6, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M hol", 13, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 2, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 11, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 12, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 15, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));

// プリセット02
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data02.push(new PanelInfo("size L", 5, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M hol", 1, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M hol", 13, 4, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M var", 4, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M var", 7, 3, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 0, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 4, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 12, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 15, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));

// プリセット03
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data03.push(new PanelInfo("size L", 2, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size L", 8, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size M var", 0, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size M var", 11, 3, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 1, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 5, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 10, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 14, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));

// プリセット04
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data04.push(new PanelInfo("size L", 0, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M hol", 2, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M hol", 13, 4, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M var", 7, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M var", 8, 3, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 6, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 9, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 10, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 15, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
