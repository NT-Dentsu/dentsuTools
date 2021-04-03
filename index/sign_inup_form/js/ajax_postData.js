// signin, signup どちらもこれを利用する
// クリックしたボタンのidによって呼び出すphpファイルのパスを切り替える
$(function(){
    $('form button').click(function() {
        // 入力値チェックの基準を満たしているとき
        if ($('.is-invalid').length == 0) {
            let path;
            // このイベントの発生元 signin or signup
            let button_name = this.id;

            if (button_name === 'signin_button') {
                path = './php/match_data.php'
            } else {
                path = './php/insert_data.php'
            }

            // ajax通信の処理
            $.post({
                // dataを送るURLを指定, 相対パスはこのファイルを読み込むファイルから見たパスになる
                url: path,
                // 送るデータを指定
                data:{
                    uid: $('input[type=text]').val(),
                    password: $('input[type=password').val()
                },
                dataType: 'json', //必須。json形式で返すように設定
            }).done(function(data){
                // 送られてきたデータでの処理
                alert(data.message);
            }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                alert(errorThrown);
            })
        }
    })
})

