/**
 * 制作者：bot810
 * 更新日：2021/4/17
 * div要素の追加，変更をする．
 */

//div要素の追加先id取得
let id = $('#container');


let name = 'カッコイイよね';
let num = 0;
let text;
let className = ['panel m left', 'panel m right', 'panel s', 'panel m top',
                'panel l leftTop', 'panel l rightTop', 'panel m top', 'panel m bottom',
                'panel l leftBottom', 'panel l rightBottom', 'panel m bottom', 'panel s',
                'panel s', 'panel m left', 'panel m right', 'panel s'];
let imageLink;


for(num=0; num<16; num++){
    // パネルサイズによって画像変更
    if(!className[num].indexOf('panel l')){//大サイズ
        imageLink = './images/image04.jpg';
    }else if(!className[num].indexOf('panel m left') || !className[num].indexOf('panel m right')){//中サイズ横
        imageLink = './images/image05.jpg';
    }else if(!className[num].indexOf('panel m top') || !className[num].indexOf('panel m bottom')){//中サイズ縦
        imageLink = './images/image06.jpg';
    }else if(!className[num].indexOf('panel s')){//小サイズ
        imageLink = './images/image07.jpg';
    }

    text = `
    <div class="panel-wrap">
        <div class="${className[num]}">
            <a class="trim" href="./panel_sample/panel_sample.html">
                <img src="${imageLink}" alt="">
            </a>
        </div>
    </div>
    `;
    id.append(text);
}
