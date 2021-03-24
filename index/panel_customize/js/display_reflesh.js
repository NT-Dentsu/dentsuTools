/**
 * ブラウザ表示サイズ変更時にmasonryでの表示がおかしくなることに対して暫定的に対処
 * サイズ変更を検知して画面更新を行う
 */

$(function() {
    // ウィンドウサイズ変更時に発火
    $(window).resize(function() {
        // alert("change");
        // 画面更新．
        // オプションとしてtureでデータから強制的にリロード，falseでキャッシュ利用．デフォルトはfalse
        location.reload();
    });
});
