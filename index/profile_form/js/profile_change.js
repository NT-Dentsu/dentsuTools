// プロフィール画像変更時
$('#selected_user_icon').on('change', function(){
    // 選択されたファイル
    var inputFile = document.getElementById('selected_user_icon');
    // FileReaderクラスを生成
    var fReader = new FileReader();

    // 選択されたファイルがない場合
    if(inputFile.files.length <= 0){
        return;
    }

    // バイナリのファイルを取得
    var binaryFile = inputFile.files[0];
    // ファイルを読み込む
    fReader.readAsDataURL(binaryFile);
    // ファイル読み込みが正常完了した
    fReader.onload = function(){
        // 画像パスを置き換える
        $('.user_icon').find('img').attr('src', fReader.result);
    }
});
