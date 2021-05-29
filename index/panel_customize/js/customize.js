/**
 * 制作者：bot810
 * 制作日：2021/05/22
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
