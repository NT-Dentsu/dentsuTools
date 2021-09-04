<?php
    function input_check($str) {
        if (strlen($str) >= 6 && strlen($str) <= 20) {
            if (preg_match('/^[0-9a-zA-Z\-]+$/', $str)) {
                return true;
            }
        }
        return false;
    }
?>
