/*
div要素の追加，変更をする．
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


for(num=0; num<16; num++){
    text = `
    <div class="panel-wrap">
        <div class="${className[num]}">
            <a href="./panel_sample/panel_sample.html">
                <img src="images/image02.jpg" alt="">
            </a>
            <p>${name} ${num}</p>
        </div>
    </div>
    `;
    id.append(text);
}
