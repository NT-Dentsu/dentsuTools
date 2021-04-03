/**
 * 制作者：bot810
 * 制作日：2021/03/26
 * こまごました設定ファイル．後で纏める可能性大
 */

jQuery(function ($) {
    //ここに Masonry プラグインのイニシャライズやオプションを記述
    //（別ファイルに記述してもOK。そのファイルを読み込む必要あり）
    //jQuery プラグイン Masonry のイニシャライズを参照
    $('#container').masonry({
        itemSelector: '.panel-wrap',
        // 要素の横の間隔(最低値)
        columnWidth: 0,
        isFitWidth: true,  //親要素の幅に合わせてカラム数を自動調整
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
