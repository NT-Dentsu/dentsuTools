/**
 * 制作者：bot810
 * 制作日：2022/04/09
 * 更新日：
 * 概要：onloadイベントを定義する(onloadイベントは一つにまとめた方が良いらしいので)
 */


// 画面読み込み時に動作
$(window).on("load", function () {
    new Promise(function (resolve) {
        resolve(panelInit()); // ここでデータベースから読み込み
    })
    .then((data) => {
        // パネル配置記憶用の変数にデータ格納
        // div_control.jsで使用する変数にもなる
        global_panelInfo = data;
        console.log(global_panelInfo);
        global_panelInfo.forEach(containerAppend);

        // customize_panel.jsで使用する変数を設定
        // 本来ならこれもグローバル化するべきだが，1つのファイルでしか使用していない & 変更部分が多くなるので保留
        pdata = data;
        // データベースから受け取ったパネル情報をpdataIndexに代入
        pdataIndex = makeIndex(pdata);

    })
    .then(() => {
        // 現在のパネル情報を表示
        console.log(pdataIndex);
    });


    // プリセットレイアウトの並びを定義
    // プリセット01
    new Promise((resolve) => {
        resolve(panelPreset("preset001"));
    }).then((data) => {
        global_preset001 = data;
    });
    // プリセット02
    new Promise((resolve) => {
        resolve(panelPreset("preset002"));
    }).then((data) => {
        global_preset002 = data;
    });
    // プリセット03
    new Promise((resolve) => {
        resolve(panelPreset("preset003"));
    }).then((data) => {
        global_preset003 = data;
    });
    // プリセット04
    new Promise((resolve) => {
        resolve(panelPreset("preset004"));
    }).then((data) => {
        global_preset004 = data;
    });

});
