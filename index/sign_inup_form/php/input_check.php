<?php
    function input_check($str) {
        if (strlen($str) >= 6 && strlen($str) <= 20) {
            if (preg_match('/^[0-9a-z\-]+$/', $str)) {
                return true;
            }
        }
        return false;
    }
?>
