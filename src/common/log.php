<?php
function logToFile($var,$filePath = null,$lineNum = null)
{
    $res = date("Y-m-d H:i:s") .'-' . $filePath .':'. $lineNum ."\n". print_r($var, true);
    error_log($res, "3", "/var/www/src/log/debug.log");
}

?>