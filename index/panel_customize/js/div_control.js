/**
 * 制作者：bot810
 * 更新日：2021/07/23
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let id = $('#container');

let text;

alert(typeof(panelInfo))
alert(panelInfo)

// panelInfoはpanel_dataset_costomize.jsで定義されている
// イベントを使ってクリック時の動作を制御する
// イベント設定のためname属性にpanelを指定
panelInfo.forEach(function (info) {
    text = `
    <div class="${info.className}" style="grid-area: ${info.gridSize};">
        <img src="./images/${info.iamgeLink}" alt="" class="panelImg">
    </div>
    `;

    id.append(text);
});
