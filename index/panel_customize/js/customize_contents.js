/**
 * 作成者：bot810
 * 作成日：2022/04/15
 * 更新日：
 * 概要：パネルカスタマイズ画面のcontentsタブでの動作を設定
 */



// パネル情報配列ソート用の関数
function comp(a, b){
    return a.pos - b.pos; // 昇順
}

// プルダウンメニューの中身を設定する関数
function pulldown(panelName) {
    // データベースから読み込んだ値を設定
    let text = "";
    global_panelMaster.forEach((data) => {
        // panelNameによってselectedを設定
        if(data.panel_name == panelName){
            text += `<option value="${data.panel_name}" selected>${data.panel_name}</option>\n`;
        }else{
            text += `<option value="${data.panel_name}">${data.panel_name}</option>\n`;
        }
    });

    return text;
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
    panelInfoCopy.sort(comp).forEach(data => {
        let num = ('00' + panelNum).slice(-2); // ゼロパディングして2桁に揃える
        let text = `
        <label for="contents_panel${num}">パネル${num}</label>
        <select id="contents_panel${num}" data-name="${data.panelName}" data-pos="${data.pos}">
            <!-- プルダウンメニューの中身は大体共通 -->
            ${pulldown(data.panelName)}
        </select>

        <input type="button" value="Set" class="contents_set_button" id="contents_set${num}" name="${num}">

        <br>
        `;

        $("#contents div").append(text);

        panelNum++;
    });


});
