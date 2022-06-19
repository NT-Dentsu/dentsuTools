/**
 * 制作者：bot810
 * 作成日：2022/06/04
 * 更新日：
 * div要素の追加，変更をする関数を定義．
 */

//div要素の追加先id取得
let panelParentId = $('#container');

let text;

// conttainerに子要素を追加する
function containerAppend(info) {

    // フラグによってコンテンツリンクの有無を変更
    if(this == true){ // フラグがTrue
        text = `
        <div class="${info.className}" style="grid-area: ${info.gridSize};">
            <a href="${info.toolLink}">
                <img src="${info.imageLink}" alt="">
            </a>
        </div>
        `;
    }else{ // フラグがfalse
        text = `
        <div class="${info.className}" style="grid-area: ${info.gridSize};">
            <img src="${info.imageLink}" alt="" class="panelImg">
        </div>
        `;
    }

    panelParentId.append(text);
}

// containerの子要素を消す(更新処理用)
function containerEnpty() {
    // 子要素消去
    panelParentId.empty();

    // 注釈と調整を追加(調整は必須)
    text = `
    <!-- グリッドのサイズ調整用 -->
    <div class="panel-wrap" name="0" style="grid-area: 1 / 1;"></div>
    <div class="panel-wrap" name="1" style="grid-area: 1 / 2;"></div>
    <div class="panel-wrap" name="2" style="grid-area: 1 / 3;"></div>
    <div class="panel-wrap" name="3" style="grid-area: 1 / 4;"></div>
    <div class="panel-wrap" name="4" style="grid-area: 2 / 1;"></div>
    <div class="panel-wrap" name="5" style="grid-area: 2 / 2;"></div>
    <div class="panel-wrap" name="6" style="grid-area: 2 / 3;"></div>
    <div class="panel-wrap" name="7" style="grid-area: 2 / 4;"></div>
    <div class="panel-wrap" name="8" style="grid-area: 3 / 1;"></div>
    <div class="panel-wrap" name="9" style="grid-area: 3 / 2;"></div>
    <div class="panel-wrap" name="10" style="grid-area: 3 / 3;"></div>
    <div class="panel-wrap" name="11" style="grid-area: 3 / 4;"></div>
    <div class="panel-wrap" name="12" style="grid-area: 4 / 1;"></div>
    <div class="panel-wrap" name="13" style="grid-area: 4 / 2;"></div>
    <div class="panel-wrap" name="14" style="grid-area: 4 / 3;"></div>
    <div class="panel-wrap" name="15" style="grid-area: 4 / 4;"></div>

    <!-- ここにパネルが追加される -->
    `;
    panelParentId.append(text);
}
