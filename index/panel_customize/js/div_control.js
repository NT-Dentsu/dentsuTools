/**
 * 制作者：bot810
 * 更新日：2021/5/1
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let id = $('#container');

let num = 0;
let text;
//クラス名と画像の対応
//連想配列を利用
let classImageDict = [
    { className: 'panel l leftTop', iamgeLink: 'image_panel_L_lefttop.jpg' },
    { className: 'panel l rightTop', iamgeLink: 'image_panel_L_righttop.jpg' },
    { className: 'panel l leftBottom', iamgeLink: 'image_panel_L_leftbottom.jpg' },
    { className: 'panel l rightBottom', iamgeLink: 'image_panel_L_rightbottom.jpg' },
    { className: 'panel m left', iamgeLink: 'image_panel_M_left.jpg' },
    { className: 'panel m right', iamgeLink: 'image_panel_M_right.jpg' },
    { className: 'panel m top', iamgeLink: 'image_panel_M_top.jpg' },
    { className: 'panel m bottom', iamgeLink: 'image_panel_M_bottom.jpg' },
    { className: 'panel s', iamgeLink: 'image_panel_S.jpg' }
];
//表示するパネル
let panelList = [4, 5, 8, 6,
                0, 1, 6, 7,
                2, 3, 7, 8,
                8, 4, 5, 8];

panelList.forEach(function (index) {
    text = `
    <div class="panel-wrap">
        <div class="${classImageDict[index].className}">
            <a class="trim" href="../panel_sample/panel_sample.html">
                <img src="./images/${classImageDict[index].iamgeLink}" alt="">
            </a>
        </div>
    </div>
    `;
    id.append(text);
});
