/**
 * 制作者：bot810
 * 制作日：2020/10/09
 * パネル関連のクラスを定義
 */



// パネルクラス定義
class PanelInfo {

    // フィールド
    panelName
    pos
    size
    imageLink
    toolLink

    // コンストラクタ
    constructor(name, pos, size, img, tool) {
        this.panelName = name;
        this.pos = pos;
        this.size = size; // 符号なし。5：小(1/8サイズ)、4：中(1/4サイズ(横))、3：中(1/4サイズ(縦))、2：大(1/2サイズ)
        this.imageLink = img;
        this.toolLink = tool;

        // 位置，サイズ，クラス名のパラメータ設定
        // grid-column: 左 / 右;
        // grid-row: 上 / 下;
        // grid-row: A / B; grid-column: C / D; → grid-area: A / C / B / D;
        let row = Math.floor(this.pos / 4) + 1;
        let col = this.pos % 4 + 1;
        if (this.size == 2) { // 大サイズ
            this.className = "panel L";
            this.gridSize = row + " / " + col + " / " + (row + 2) + " / " + (col + 2);
        } else if (this.size == 3) {
            this.className = "panel M var";
            this.gridSize = row + " / " + col + " / " + (row + 2) + " / " + (col + 1);
        } else if (this.size == 4) {
            this.className = "panel M hol";
            this.gridSize = row + " / " + col + " / " + (row + 1) + " / " + (col + 2);
        } else if (this.size == 5) {
            this.className = "panel S";
            this.gridSize = row + " / " + col + " / " + (row + 1) + " / " + (col + 1);
        }
    }


    // パネルデータを渡す
    // 渡す形式：連想配列
    // 連想配列の形式(要素は順不同){"panel_name" : <String>, "anchor_num" : <int>, "panel_size" : <int>}
    data(){
        return {panel_name:this.panelName, anchor_num:this.pos, panel_size:this.size};
    }

}
