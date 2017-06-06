<?php
require_once dirname(__FILE__) . '/../../config/config.php';

function secs_to_h($seconds)
{
    $ret = "";

    global $text;

    if ($seconds > 0 && $seconds < 86400) {
        /*** get the hours ***/
        $hours = (intval($seconds) / 3600) % 24;
        if ($seconds == 3600) {
            $ret .= "$hours " . $text['hour'];
        } else {
            $ret .= "$hours " . $text['hours'];
        }
    }
    if ($seconds >= 86400 && $seconds < 604800) {
        /*** get the days ***/
        $days = intval(intval($seconds) / (3600 * 24));
        if ($seconds == 86400) {
            $ret .= "$days " . $text['day'];
        } else {
            $ret .= "$days " . $text['days'];
        }
    }
    if ($seconds >= 604800 && $seconds < 2592000) {
        /*** get the weeks ***/
        $weeks = intval(intval($seconds) / (3600 * 24 * 7));
        if ($seconds == 604800) {
            $ret .= "$weeks " . $text['week'];
        } else {
            $ret .= "$weeks " . $text['weeks'];
        }
    }
    if ($seconds >= 2592000) {
        $months = intval(intval($seconds) / (3600 * 24 * 30));
        if ($seconds == 2592000) {
            $ret .= "$months " . $text['month'];
        } else {
            $ret .= "$months " . $text['months'];
        }
    }

    return $ret;
}

?>