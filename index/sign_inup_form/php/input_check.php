<?php
    // 入力チェックを行う関数
    // 半角英数字ハイフン6文字以上20文字以内かつ予約済みの/^preset.*$/にマッチしない とき規定を満たしているものとする
    function input_check($str) {
        if (strlen($str) >= 6 && strlen($str) <= 20) {
            if (preg_match('/^[0-9a-zA-Z\-]+$/', $str) && !preg_match('/^preset.*$/', $str)) {
                return true;
            }
        }
        return false;
    }
?>
