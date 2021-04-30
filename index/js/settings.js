/**
 * 制作者：bot810
 * 更新日：2021/04/10
 * こまごました設定ファイル．後で纏める可能性大
 */

//画像読み込み後に並べ替えるようにする
jQuery.event.add(window, "load", function () {
    //ここに Masonry プラグインのイニシャライズやオプションを記述
    //（別ファイルに記述してもOK。そのファイルを読み込む必要あり）
    //jQuery プラグイン Masonry のイニシャライズを参照
    $('#container').masonry({
        itemSelector: '.panel-wrap',
        // 要素の横の間隔(最低値)
        columnWidth: 0,
        isFitWidth: false,  //親要素の幅をパネル幅に合わせる
        //並び順を入れ替えない
        horizontalOrder: true
        //なんか表示をパーセントで
        //percentPosition: true
    });
});

//メニューバーのアイコンを表示する
//参考
// https://feathericons.com
feather.replace();
