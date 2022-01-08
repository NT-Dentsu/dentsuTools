/**
 * 制作者：bot810
 * 制作日：2022/01/08
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
    panelPromise.then((panelInfo) => {
        console.log(panelInfo); // panelInfoにデータベースからの情報が入る
        // 変更を反映させる
        containerEnpty();
        panelInfo.forEach(containerAppend);
    });

});

