<?php
include_once('./includes/function.php');

$arg=$_SERVER['argv'];
echo "Crawl Tool by @n0xgg04\nData will be saved in ./data/\n";
switch($arg){
    case "-h": echo "\nUse cmd : php nox.php <D?> [21,22] <code> [KH,AT,CN,TT]";
    break;

    default:
        if(isset($arg[1])&&isset($arg[2])) crawl("B{$arg[1]}DC{$arg[2]}");
            else echo "\nWrong command!";
    break;
}
