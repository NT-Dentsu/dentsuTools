/**
 * 作成者：bot810
 * 作成日：2022/04/15
 * 更新日：2022/05/07
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

// コンテンツタブの中身を変更する処理
function setContents() {

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

}

// contentsタブクリック時の動作
// クリックイベント設定
$("#contents_tab").click(function () {
    // 動作確認
    console.log("contents Tab click");

    // コンテンツタブの中身を設定
    setContents();
});


// setボタンクリック時の動作
// 動的な要素に対応するためon()メソッド使用
$("#contents div").on("click", ".contents_set_button", function () {// アローだと上手く動かない(thisが使えない)
    // 動作確認
    let selectId = "#contents_panel" + $(this).attr("name");
    console.log($(this).attr("id") + " " + $(selectId).val());

    //console.log(global_panelMaster);
    //console.log($(selectId).attr("name"));

    // 任意属性によって必要な情報を取得
    // 参考サイト：https://engineering.dn-voice.info/prg-tips/htmlcss/customdata/

    // 選択されたパネル情報取得
    let selectPanel = global_panelMaster.find(({panel_name}) => panel_name === $(selectId).val());
    console.log(selectPanel);

    // 対象パネルの値を変更
    global_panelInfo.find(({pos}) => pos === $(selectId).data("pos")).setContent(selectPanel);

    // 変更を反映させる
    containerEnpty();
    global_panelInfo.forEach(containerAppend);

});
