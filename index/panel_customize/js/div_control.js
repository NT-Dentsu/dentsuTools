/**
 * 制作者：bot810
 * 更新日：2022/01/15
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let panelParentId = $('#container');

let text;

// panelInfoはpanel_dataset_costomize.jsで定義されている
// イベントを使ってクリック時の動作を制御する
// イベント設定のためname属性にpanelを指定
// let panelInfo = new Array()
panelPromise.then((data) => {
    console.log(data);
    data.forEach(containerAppend);
    // panelInfo = data;
});

// conttainerに子要素を追加する
function containerAppend(info){
    text = `
    <div class="${info.className}" style="grid-area: ${info.gridSize};">
        <img src="${info.iamgeLink}" alt="" class="panelImg">
    </div>
    `;

    panelParentId.append(text);
}

// containerの子要素を消す(更新処理用)
function containerEnpty(){
    // 子要素消去
    panelParentId.empty();

    // 注釈と調整を追加(調整は必須)
    text = `
    <!-- グリッドのサイズ調整用 -->
    <div class="panel-wrap" style="grid-area: 1 / 1;"></div>
    <div class="panel-wrap" style="grid-area: 1 / 2;"></div>
    <div class="panel-wrap" style="grid-area: 1 / 3;"></div>
    <div class="panel-wrap" style="grid-area: 1 / 4;"></div>
    <div class="panel-wrap" style="grid-area: 2 / 1;"></div>
    <div class="panel-wrap" style="grid-area: 3 / 1;"></div>
    <div class="panel-wrap" style="grid-area: 4 / 1;"></div>

    <!-- ここにパネルが追加される -->
    `;
    panelParentId.append(text);
}
