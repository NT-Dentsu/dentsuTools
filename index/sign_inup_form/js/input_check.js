$(function () {
    value_check();
    $('form').submit(function () {
        if ($('.is-invalid').length != 0) {
            alert('半角英数字ハイフン，6文字以上20文字以内で入力してください');
            return false;
        }
    });
});

function value_check() {
    $('input').on("keyup blur", function () {
        if ($(this).val().length >= 6 && $(this).val().length <= 20) {
            if ($(this).val().match(/^[0-9a-z\-]+$/)) {
                $(this).removeClass('is-invalid');
                return;
            }
        }
        $(this).addClass('is-invalid');
    });
}
