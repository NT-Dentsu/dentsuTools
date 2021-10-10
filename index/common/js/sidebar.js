// 2021/09/09 ota
// サイドバーで現在のページに該当する項目に色を付ける処理
$(function(){
    // 読み込まれた地点でのURLのファイル名を取得
    let currentFileName = location.pathname.split("/");
    currentFileName = currentFileName[currentFileName.length - 1];

    let linkNames = $("#sidebarMenu a");
    for (let i = 0; i < linkNames.length; i++) {
        let fileName = linkNames.eq(i).attr("href").split("/");
        if (currentFileName === fileName[fileName.length - 1]) {
            // 現在のurlのファイル名とサイドバーのリンク先のファイル名が一致した場合，その要素にactiveクラスを追加
            linkNames.eq(i).addClass("active");
        }
    }
});
