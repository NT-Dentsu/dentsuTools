/**
 * 制作者：bot810
 * 制作日：2021/05/22
 * 更新日：2022/04/09
 * カスタマイズ画面のタブ操作をしてます
 * とりあえず最初はプリセットを用意してそれを選ぶ形で
 */


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
