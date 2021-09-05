/**
 * 制作者：bot810
 * 制作日：2021/07/03
 * 最終更新日：2021/07/17
 * パネルのプリセットレイアウトの並び順を
 * グリッドレイアウトの方式で保存
 * JSONとかにするかも
 */

//class取得
let priset01 = $("preset01");
let priset02 = $("preset02");
let priset03 = $("preset03");
let priset04 = $("preset04");

// データ設定
let data01 = new Array();
let data02 = new Array();
let data03 = new Array();
let data04 = new Array();

// ここにデータの設定を書く
//data01.push(new PanelInfo("size L", 4, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));




// イベント設定(暫定)
// 参考サイト：https://qiita.com/hththt/items/aefbcc6eb191588dadff#%E3%82%AD%E3%83%A3%E3%83%97%E3%83%81%E3%83%A3%E3%83%AA%E3%83%B3%E3%82%B0%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA%E3%81%A8%E3%83%91%E3%83%96%E3%83%AA%E3%83%B3%E3%82%B0%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA%E3%82%92%E7%AC%AC3%E5%BC%95%E6%95%B0%E3%81%A7%E6%8C%87%E5%AE%9A
preset01.addEventListener('click', function (e) {
    // パネルレイアウトをプリセット1のレイアウトにする
    // panelInfo = data01;
    alert('preset01');
}, false);
preset02.addEventListener('click', function (e) {
    // パネルレイアウトをプリセット2のレイアウトにする
    // panelInfo = data02;
    alert('preset02');
}, false);
preset03.addEventListener('click', function (e) {
    // パネルレイアウトをプリセット3のレイアウトにする
    // panelInfo = data03;
    alert('preset03');
}, false);
preset04.addEventListener('click', function (e) {
    // パネルレイアウトをプリセット4のレイアウトにする
    // panelInfo = data04;
    alert('preset04');
}, false);
