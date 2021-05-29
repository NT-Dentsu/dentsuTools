/**
 * 制作者：bot810
 * 制作日：2021/05/26
 * html2canvasを上手く動かす
 * 非同期処理が悪さをしているのでそれをasyncとawaitでどうにかする
 */

async function hoge() {
    await mason();
    await toCanvas();
}

hoge();

// html2canvas(document.body).then(function (canvas) {
//     document.body.appendChild(canvas);
// });
