/**
 * 作成者：bot810
 * 作成日：2022/0415
 * 更新日：
 * 概要：パネルカスタマイズ画面のcontentsタブでの動作を設定
 */



// パネル情報配列ソート用の関数
function comp(a, b){
    return a.pos - b.pos; // 昇順
}

// プルダウンメニューの中身を設定する関数
function pulldown() {
    // いまはとりあえず適当な文字列を返す
    return `
    <option value="orange">Orange</option>
    <option value="lemon" selected>Lemon</option>
    <option value="strawberry">Strawberry</option>
    `;
}


// contentsタブクリック時の動作
// クリックイベント設定
$("#contents_tab").click(function () {
    // 動作確認
    console.log("contents Tab click");

    // 中身を初期化
    $("#contents div").empty();
    $("#contents div").append("<!-- ここにコンテンツ選択の諸々が表示される -->");

    // 現在のパネル配置に合わせて要素を変化させる
    // プルダウンメニューを生成
    // 参考サイト：https://www.javadrive.jp/javascript/form/index5.html

    // プルダウンメニュー全体の設定
    // panelNumは連番で左上から数える
    let panelNum = 1;

    // パネルを左上からの順番にする
    // 元配列を破壊するので使用前にsliceで複製
    let panelInfoCopy = global_panelInfo.slice();

    // プルダウンメニューを設定
    panelInfoCopy.sort(comp).forEach(info => {
        let num = ('00' + panelNum).slice(-2); // ゼロパディングして2桁に揃える
        let text = `
        <label for="contents_panel${num}">パネル${num}</label>
        <select id="contents_panel${num}">
            <!-- プルダウンメニューの中身は共通 -->
            ${pulldown()}
        </select>
        <br>
        `;

        $("#contents div").append(text);

        panelNum++;
    });


});
