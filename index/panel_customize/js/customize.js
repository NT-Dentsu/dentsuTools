/**
 * 制作者：bot810
 * 制作日：2021/05/22
 * 更新日：2021/12/11
 * カスタマイズ機能本体？
 * とりあえず最初はプリセットを用意してそれを選ぶ形で
 */

//html2canvasを利用
//参考：http://kachibito.net/snippets/convert-html-to-image-in-jquery
//公式サイト：http://html2canvas.hertzen.com

let element = $('#container'); // 画像化したい要素をセレクタに指定
// let element = document.getElementById("container");
// let preview = document.getElementById("previewImage");
let getCanvas;

async function toCanvas() {
    //canvasにhtmlを画像化したものが渡される
    html2canvas(element).then(function (canvas) {
        $("#previewImage").append(canvas);
        // preview.appendChild(canvas);
        getCanvas = canvas;
    });

    console.log("toCanvas");
}

//プレビュー
$("#btn-Preview-Image").on('click', function () {
    html2canvas(element).then(function (canvas) {
        $("#previewImage").append(canvas);
        getCanvas = canvas;
    });
});

// コンバートしてダウンロード
$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    //ファイル名を設定
    $("#btn-Convert-Html2Image").attr("download", "hogehoge.png").attr("href", newData);
});


// タブメニュー用の関数
$(document).ready(function () {
    //----------Select the first tab and div by default
    // 表示の初期化
    $('#customize_flex > #menu > div > div').css('display', 'none'); // 全部非表示
    $('#customize_flex > #menu > ul > li > a').eq(0).addClass("selected");
    $('#customize_flex > #menu > div > div').eq(0).css('display', 'block');


    //---------- This assigns an onclick event to each tab link("a" tag) and passes a parameter to the showHideTab() function
    // タブクック時の動作
    $('#customize_flex > #menu > ul').click(function (e) {

        if ($(e.target).is("a")) {

            /*Handle Tab Nav*/
            $('#customize_flex > #menu > ul > li > a').removeClass("selected");
            $(e.target).addClass("selected");

            /*Handles Tab Content*/
            var clicked_index = $("a", this).index(e.target);
            $('#customize_flex > #menu > div > div').css('display', 'none'); // 全部非表示
            $('#customize_flex > #menu > div > div').eq(clicked_index).fadeIn(); // クリックされたものだけ再表示

        }

        $(this).blur();
        return false;

    });

});//end ready
