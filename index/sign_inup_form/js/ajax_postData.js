// signin, signup どちらもこれを利用する
// クリックしたボタンのidによって呼び出すphpファイルのパスを切り替える
$(function(){
    $('form button').click(function() {
        let path;
        if (this.id === 'signin_button') {
            path = './php/match_data.php'
        } else {
            path = './php/insert_data.php'
        }
        // 入力値チェックの基準を満たしているとき
        if ($('.is-invalid').length == 0) {
            $.post({
                // 相対パスはこのファイルを読み込むファイルから見たパスになる
                url: path,
                data:{
                    uid: $('input[type=text]').val(),
                    password: $('input[type=password').val()
                },
                dataType: 'json', //必須。json形式で返すように設定
            }).done(function(data){
                //連想配列のプロパティがそのままjsonオブジェクトのプロパティとなっている
                alert('uidの値：' + data.uidLength + ' passwordの値：' + data.passwordLength);
            }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                alert(errorThrown);
            })
        }
    })
})

