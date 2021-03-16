$(function(){
    $('#signin_button').click(function() {
        // 入力値チェックの基準を満たしているとき
        if ($('.is-invalid').length == 0) {
            $.post({
                // 相対パスはこのファイルを読み込むファイルから見たパスになる
                url: './php/ajax_getData.php',
                data:{
                    uid: $('input[name=uid]').val(),
                    password: $('input[name=password').val()
                },
                dataType: 'json', //必須。json形式で返すように設定
            }).done(function(data){
                //連想配列のプロパティがそのままjsonオブジェクトのプロパティとなっている
                alert('uidの長さ：' + data.uidLength + ' passwordの長さ：' + data.passwordLength);
            }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                alert(errorThrown);
            })
        }
    })
})

