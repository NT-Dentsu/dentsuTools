/**
 * 制作者：bot810
 * 更新日：2021/5/1
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let id = $('#container');

let num = 0;
let text;

// 構造体的にクラスを使う
class PanelInfo {

    constructor(name, pos, size, img, tool){
        this.panelName = name;
        this.pos = pos;
        this.size = size; // 符号なし。5：小(1/8サイズ)、4：中(1/4サイズ(横))、3：中(1/4サイズ(縦))、2：大(1/2サイズ)
        this.iamgeLink = img;
        this.toolLink = tool;

        // 位置，サイズ，クラス名のパラメータ設定
        // grid-column: 左 / 右;
        // grid-row: 上 / 下;
        // grid-row: A / B; grid-column: C / D; → grid-area: A / C / B / D;
        let row = Math.floor(this.pos / 4) + 1;
        let col = this.pos % 4 + 1;
        if (this.size == 2) { // 大サイズ
            this.className = "panel L";
            this.gridSize = row + "/ " + col + " / " + (row + 2) + " / " + (col + 2);
        }else if(this.size == 3) {
            this.className = "panel M var";
            this.gridSize = row + "/ " + col + " / " + (row + 2) + " / " + (col + 1);
        }else if(this.size == 4) {
            this.className = "panel M hol";
            this.gridSize = row + "/ " + col + " / " + (row + 1) + " / " + (col + 2);
        }else if(this.size == 5) {
            this.className = "panel S";
            this.gridSize = row + "/ " + col + " / " + (row + 1) + " / " + (col + 1);
        }
    }
}

let panelInfo = new Array(); // 空の配列として定義

// panelInfoにデータを格納
panelInfo.push(new PanelInfo("size L", 4, 2, "image_panel_L.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size M hol", 0, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size M var", 3, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size M var", 6, 3, "image_panel_M_v.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size M var", 13, 4, "image_panel_M_h.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size S", 2, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size S", 11, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size S", 12, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));
panelInfo.push(new PanelInfo("size S", 15, 5, "image_panel_S.jpg", "./panel_sample/panel_sample.html"));


panelList.forEach(function(index){
    text = `
    <div class="panel-wrap">
        <div class="${classImageDict[index].className}">
            <a class="trim" href="./app/kindle_copy/kindle_copy.php">
                <img src="./images/${classImageDict[index].iamgeLink}" alt="">
            </a>
        </div>
    </div>
    `;
    id.append(text);
});
