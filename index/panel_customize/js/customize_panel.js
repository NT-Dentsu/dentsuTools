/**
 * 作成者：bot810
 * 作成日:2022/01/29
 * 更新日:2022/02/26
 * カスタマイズ画面のパネルタブ用js
 * パネルの配置とかレイアウトの変更とかする
 */


// パネルデータからパネルインデックスを生成する関数
// パネルデータが存在しないインデックスには―1を入れておく
function makeIndex(data) {
    let index = new Array(16, -1); // -1で初期化
    $.each(data, function (pindex, pdata) {
        let pos = pdata.pos;
        switch (pdata.size) {
            case 2: // パネルL
                // 影響範囲の値を設定
                index[pos + 0] = pindex;
                index[pos + 1] = pindex;
                index[pos + 4] = pindex;
                index[pos + 5] = pindex;
                break;
            case 4: // パネルM_hol
                // 影響範囲の値を設定
                index[pos + 0] = pindex;
                index[pos + 1] = pindex;
                break;
            case 3: // パネルM_var
                // 影響範囲の値を設定
                index[pos + 0] = pindex;
                index[pos + 4] = pindex;
                break;
            case 5: // パネルS
                // 影響範囲の値を設定
                index[pos + 0] = pindex;
                break;
            default:
                console.log(pdata.panelName);
                break;
        }
    });

    // 生成したインデックスを返す
    return index;
}


// 最初にデータベースからパネル情報を取得
// とりあえず放置
// dataをもとに4*4の範囲のパネル分布を配列として管理
let pdata; // 更新処理用
let pdataIndex = new Array();
$(window).on("load", function () {
    new Promise(function (resolve) {
        resolve(panelInit()); // ここでデータベースから読み込み
    })
    .then((data) => {
        pdata = data;
        // データベースから受け取ったパネル情報をpdataIndexに代入
        pdataIndex = makeIndex(pdata);
    })
    .then(()=>{
        // 現在のパネル情報を表示
        console.log(pdataIndex);
    });
});



// panelタブに各種パネルを表示する処理
let panelTab = $("#panel_tab");

// クリックイベント設定
panelTab.click(function(){
    // 動作確認
    console.log("panel Tab click");
    // console.log(pdata);

    // 何かしらの何か

});


// イメージ
// 離したときのマウス位置の要素を取得
// その後はこう，なんかうまいこと


let dragimg = $("#panel img");

dragimg.click(function () {
    console.log("panel click");
});


// 画像ドラッグ時の動作設定
dragimg.draggable({
    // オプション指定
    // 移動用の複製を作る
    helper: "clone",
    // ドラッグ中は半透明
    opacity: 0.5,
    // 移動可能範囲指定
    // containment: '#main', //うまく動かないので一旦コメントアウト
    // ドラッグ可能な位置でない時は戻る
    revert: "invalid",
    // ドラッグ中のカーソルを十字矢印にする
    cursor: "move",
    // ドラッグ中のカーソル位置を中央にする
    // cursorAt: { top: 50%, left: 50% }
});


// ドラッグ開始時に呼ばれる
dragimg.on("dragstart", function(event, ui){
    console.log("start event start");
    ui.helper.css('width', '10%');
    // pdata = panelInfo;
    // pdataIndex更新
    pdataIndex = makeIndex(pdata);
});

// ドラッグ中に呼ばれる
dragimg.on("drag", function(event, ui){
    console.log("drag event start");
});

// ドラッグ終了時に呼ばれる
dragimg.on("dragstop", function(event, ui){
    console.log("stop event start");
    console.log(ui.position);

    // console.log(jQuery(":hover"));

    // カーソルがグリッドのどの位置にあるかを取得
    let index;
    // カーソルがホバーしている要素を全部見る
    $(":hover").each(function (indexInArray, layer) {
        // #container配下の.panel-wrapがあればそれを抽出
        if ($(this).parent().attr("id") == "container" && $(this).attr("class").search(/panel-wrap/) >= 0) {
            index = parseInt($(this).attr("name"));
        }
    });
    // グリッドの外側なら何もせずに抜ける
    if(index == undefined) return;
    console.log(index);



    // helperとpdata見比べて削除するパネルを抽出
    let tgt = new Array(); // 削除するパネルのインデックスを保持
    let addPanel;
    switch (ui.helper.attr("name")) {
        case "2": // パネルL
            // インデックスによるはみ出し判定
            if(index%4 == 3 || index >= 12) return;
            // 影響範囲の値を見る
            tgt.push(pdataIndex[index + 0]);
            tgt.push(pdataIndex[index + 1]);
            tgt.push(pdataIndex[index + 4]);
            tgt.push(pdataIndex[index + 5]);
            // 追加するパネルクラスを生成
            addPanel = new PanelInfo("size L", index, 2, "/images/image_panel_L.jpg", "/panel_sample/panel_sample.html");
            break;

        case "4": // パネルM_hol
            // インデックスによるはみ出し判定
            if (index % 4 == 3) return;
            // 影響範囲の値を見る
            tgt.push(pdataIndex[index + 0]);
            tgt.push(pdataIndex[index + 1]);
            // 追加するパネルクラスを生成
            addPanel = new PanelInfo("size M hol", index, 4, "/images/image_panel_M_h.jpg", "/panel_sample/panel_sample.html");
            break;

            case "3": // パネルM_var
            // インデックスによるはみ出し判定
            if (index >= 12) return;
            // 影響範囲の値を見る
            tgt.push(pdataIndex[index + 0]);
            tgt.push(pdataIndex[index + 4]);
            // 追加するパネルクラスを生成
            addPanel = new PanelInfo("size M var", index, 3, "/images/image_panel_M_v.jpg", "/panel_sample/panel_sample.html");
            break;

        case "5": // パネルS
            // 影響範囲の値を見る
            tgt.push(pdataIndex[index]);
            // 追加するパネルクラスを生成
            addPanel = new PanelInfo("size S", index, 5, "/images/image_panel_S.jpg", "/panel_sample/panel_sample.html");
            break;

        default:
            console.log("no match to " + ui.helper.attr("name"));
            break;
    }
    // 重なった部分の除去
    let work = pdata;
    console.log(pdataIndex);
    console.log(tgt);
    tgt.forEach(ptgt => {
        if(ptgt != -1){ // 値が-1の時以外
            delete work[ptgt];
        }
    });
    // undefinedとかを削除
    pdata = work.filter(Boolean);
    // ドロップされたものを追加
    pdata.push(addPanel);

    // パネルレイアウトを変更後のものにする
    panelInfo = pdata;
    // 変更を反映させる
    containerEnpty();
    panelInfo.forEach(containerAppend);

});


