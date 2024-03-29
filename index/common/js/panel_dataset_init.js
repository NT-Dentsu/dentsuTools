/**
 * 制作者：bot810
 * 制作日：2022/06/04
 * 更新日：
 * パネル関連の並びを定義
 * home画面とcoutomize画面で共通させる
 */



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

