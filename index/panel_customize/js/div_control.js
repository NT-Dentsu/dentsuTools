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
panelInfo.forEach(containerAppend);

// conttainerに子要素を追加する
function containerAppend(info){
    text = `
    <div class="${info.className}" style="grid-area: ${info.gridSize};">
        <img src="./images/${info.iamgeLink}" alt="" class="panelImg">
    </div>
    `;

    id.append(text);
}

// containerの子要素を消す(更新処理用)
function containerEnpty(){
    // 子要素消去
    id.empty();

    // 注釈と調整を追加(調整は必須)
    text = `
    <!-- グリッドのサイズ調整用 -->
    <div class="panel-wrap"></div>

    <!-- ここにパネルが追加される -->
    `;
    id.append(text);
}
