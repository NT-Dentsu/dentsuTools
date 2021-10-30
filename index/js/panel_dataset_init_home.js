/**
 * 制作者：bot810
 * 制作日：2021/07/22
 * 更新日：2021/10/30
 * パネル関連の並びを定義
 * home画面とcoutomize画面で一部違いがあるため別ファイルとする
 */



// デバッグ用にデータベースにinitを格納
// 初期値定義
// home画面ではそのまま定義
// costomize画面ではhome画面の値を利用
let init = Array();

// データを格納
init.push(new PanelInfo("size L", 4, 2, "./images/image_panel_L.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M hol", 0, 4, "./images/image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M var", 3, 3, "./images/image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M var", 6, 3, "./images/image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size M hol", 13, 4, "./images/image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 2, 5, "./images/image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 11, 5, "./images/image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 12, 5, "./images/image_panel_S.jpg", "./panel_sample/panel_sample.html"));
init.push(new PanelInfo("size S", 15, 5, "./images/image_panel_S.jpg", "./panel_sample/panel_sample.html"));

let dict = new Array();
init.forEach(info => {
    dict.push(info.data())
});
updateUserPanels(dict);
// デバッグ用コードここまで

// console.log(dict);


// div_controlでの同期処理のためにPromise使う
let panelPromise = new Promise(function (resolve) {

    resolve(panelInit());

});

function panelInit() {
    // 同期処理
    return getUserPanels()
    .then((data) => {
        // パネルデータをデータベースから取得
        return data.array;
        // console.log(data);
    })
    .then((panelData) => { // 上の処理が終わった後に実行
        // 渡すデータ
        let panelInfo = new Array();
        // パネルデータをもとにパネルクラス作成
        console.log("here");
        console.log(panelData);
        panelData.forEach(data => {
            // 連想配列の形式(要素は順不同)
            // {"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>, "content_link" : <String>, "content_image" : <String>}
            // PanelInfoの引数
            // (名前, 位置, 大きさ, 画像, ツールへのリンク)
            panelInfo.push(new PanelInfo(data.panel_name, data.anchor_num, data.panel_size, data.content_image, data.content_link));
        });

        // 最終的にここの値が返る
        return panelInfo;
    });
}
