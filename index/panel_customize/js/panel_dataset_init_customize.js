/**
 * 制作者：bot810
 * 制作日：2021/07/22
 * 更新日：2022/03/12
 * パネル関連の並びを定義
 * home画面とcoutomize画面で一部違いがあるため別ファイルとする
 */


// 初期値定義
// home画面ではそのまま定義
// costomize画面ではhome画面の値を利用

// div_controlでの同期処理のためにPromise使う
let panelPromise = new Promise(function (resolve) {

    resolve(panelInit());

});

// データベースから現在のユーザのパネルデータを読み込んみ，表示用に成型して返り値に渡す
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
        // console.log("here");
        // console.log(panelData);
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

// データベースから指定したプリセットパネルデータを読み込んみ，表示用に成型して返り値に渡す
function panelPreset(presetID) {
    // 同期処理
    return get_presetdata(presetID)
    .then((data) => {
        // パネルデータをデータベースから取得
        console.log(data.status);
        console.log(data.array);
        return data.array;
    })
    .then((panelData) => { // 上の処理が終わった後に実行
        // 渡すデータ
        let panelInfo = new Array();
        // パネルデータをもとにパネルクラス作成
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

// プリセットレイアウトの並びを定義
let data01 = new Array();
let data02 = new Array();
let data03 = new Array();
let data04 = new Array();

// プリセット01
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data01.push(new PanelInfo("size L", 4, 2, "/images/image_panel_L.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M hol", 0, 4, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M var", 3, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M var", 6, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size M hol", 13, 4, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 2, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 11, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 12, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data01.push(new PanelInfo("size S", 15, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));

// プリセット02
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data02.push(new PanelInfo("size L", 5, 2, "/images/image_panel_L.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M hol", 1, 4, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M hol", 13, 4, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M var", 4, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size M var", 7, 3, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 0, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 3, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 12, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data02.push(new PanelInfo("size S", 15, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));

// プリセット03
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data03.push(new PanelInfo("size L", 2, 2, "/images/image_panel_L.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size L", 8, 2, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size M var", 0, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size M var", 11, 3, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 1, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 5, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 10, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data03.push(new PanelInfo("size S", 14, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));

// プリセット04
// (名前, 位置, 大きさ, 画像, ツールへのリンク)
data04.push(new PanelInfo("size L", 0, 2, "/images/image_panel_L.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M hol", 2, 4, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M hol", 13, 4, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M var", 7, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size M var", 8, 3, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 6, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 9, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 10, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
data04.push(new PanelInfo("size S", 15, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html"));
