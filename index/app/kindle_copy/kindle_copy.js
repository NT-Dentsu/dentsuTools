$(function() {
    $('button').on('click', function(){
        // textareaを選択
        text = $('#output').val();
        // コピー
        copyToClipboard(text);
    });

    $('#input').on("keyup blur", function() {
        let input_str = $(this).val();
        // 空白の削除
        input_str = input_str.replace(/\r\n|\r/g, "\n").replace(/。/g,"。\n").replace(/ /g, '');
        $('#output').text(input_str);
    });

    $('#del_quote').change(function() {
        let input_str = $('#input').val();
        // 空白の削除
        input_str = input_str.replace(/\r\n|\r/g, "\n").replace(/。/g,"。\n").replace(/ /g, '');
        if ($(this).prop('checked')) {
            // チェックされてたら引用元の削除
            input_str = input_str.replace(/\n\n.+/,'');
        } else {
            // チェックされていなかったら空行の削除
            input_str = input_str.replace(/\n\n/,'\n');
        }
        $('#output').text(input_str);
    })
})

async function copyToClipboard(text) {
    try {
      await navigator.clipboard.writeText(text)
      alert('コピーしました')
    } catch (error) {
      alert((error && error.message) || 'コピーに失敗しました')
    }
  }
