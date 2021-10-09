/**
 * 制作者：bot810
 * 更新日：2021/10/09
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let panelParentId = $('#container');

let text;

// panelInfoはpanel_dataset_init_home.jsで定義されている
// イベントを使ってクリック時の動作を制御する
// イベント設定のためname属性にpanelを指定
panelInfo.forEach(containerAppend);

// conttainerに子要素を追加する
function containerAppend(info) {
    text = `
    <div class="${info.className}" style="grid-area: ${info.gridSize};">
        <a href="./app/kindle_copy/kindle_copy.php">
            <img src="./images/${info.iamgeLink}" alt="">
        </a>
    </div>
    `;

    panelParentId.append(text);
}

