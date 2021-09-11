/**
 * 制作者：bot810
 * 制作日：2021/07/03
 * 最終更新日：2021/09/11
 * パネルのプリセットレイアウトの並び順を
 * グリッドレイアウトの方式で保存
 * JSONとかにするかも
 */

//class取得
let priset01 = $("preset01");
let priset02 = $("preset02");
let priset03 = $("preset03");
let priset04 = $("preset04");

// ここにデータの設定を書く
//data01.push(new PanelInfo("size L", 4, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));




// イベント設定(暫定)
// 参考サイト：https://qiita.com/hththt/items/aefbcc6eb191588dadff#%E3%82%AD%E3%83%A3%E3%83%97%E3%83%81%E3%83%A3%E3%83%AA%E3%83%B3%E3%82%B0%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA%E3%81%A8%E3%83%91%E3%83%96%E3%83%AA%E3%83%B3%E3%82%B0%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA%E3%82%92%E7%AC%AC3%E5%BC%95%E6%95%B0%E3%81%A7%E6%8C%87%E5%AE%9A
// ダブルクリック用フラグ．区別のためにchar
let clickFlag = "none";

// クリックとダブルクリックのイベント
preset01.addEventListener('click', function (e) {
    // クリックフラグが立っている状態でのクリック
    //     -> ダブルクリック
    if (clickFlag == "panel01") {
        alert("panel01 double click!!");

        clickFlag = "none";
        return;
    }

    // シングルクリックを受理、300ms間だけダブルクリック判定を残す
    clickFlag = "panel01";
    setTimeout(function () {
        // ダブルクリックによりclickedフラグがリセットされていない
        //     -> シングルクリックだった

        // パネルレイアウトをプリセット1のレイアウトにする
        // panelInfo = data01;
        if (clickFlag == "panel01") {
            alert("panel01 single click!");

            // 変更を反映させる
            location.reload();
        }

        clickFlag = "none";
    }, 300);

}, false);

preset02.addEventListener('click', function (e) {
    // クリックフラグが立っている状態でのクリック
    //     -> ダブルクリック
    if (clickFlag == "panel02") {
        alert("panel02 double click!!");

        clickFlag = "none";
        return;
    }

    // シングルクリックを受理、300ms間だけダブルクリック判定を残す
    clickFlag = "panel02";
    setTimeout(function () {
        // ダブルクリックによりclickedフラグがリセットされていない
        //     -> シングルクリックだった

        // パネルレイアウトをプリセット2のレイアウトにする
        // panelInfo = data02;
        if (clickFlag == "panel02") {
            alert("panel02 single click!");

            // 変更を反映させる
            location.reload();
        }

        clickFlag = "none";
    }, 300);

}, false);

preset03.addEventListener('click', function (e) {
    // クリックフラグが立っている状態でのクリック
    //     -> ダブルクリック
    if (clickFlag == "panel03") {
        alert("panel03 double click!!");

        clickFlag = "none";
        return;
    }

    // シングルクリックを受理、300ms間だけダブルクリック判定を残す
    clickFlag = "panel03";
    setTimeout(function () {
        // ダブルクリックによりclickedフラグがリセットされていない
        //     -> シングルクリックだった

        // パネルレイアウトをプリセット3のレイアウトにする
        // panelInfo = data03;
        if (clickFlag == "panel03") {
            alert("panel03 single click!");

            // 変更を反映させる
            location.reload();
        }

        clickFlag = "none";
    }, 300);

}, false);

preset04.addEventListener('click', function (e) {
    // クリックフラグが立っている状態でのクリック
    //     -> ダブルクリック
    if (clickFlag == "panel04") {
        alert("panel04 double click!!");

        clickFlag = "none";
        return;
    }

    // シングルクリックを受理、300ms間だけダブルクリック判定を残す
    clickFlag = "panel04";
    setTimeout(function () {
        // ダブルクリックによりclickedフラグがリセットされていない
        //     -> シングルクリックだった

        // パネルレイアウトをプリセット4のレイアウトにする
        // panelInfo = data04;
        if (clickFlag == "panel04") {
            alert("panel04 single click!");

            // 変更を反映させる
            location.reload();
        }

        clickFlag = "none";
    }, 300);

}, false);
