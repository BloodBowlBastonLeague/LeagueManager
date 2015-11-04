<?php
// $_SERVER['argv'][] = 'server:run';
// require 'app/console';
// phpinfo();
// die();

$cmds[] = "ls ".dirname(__FILE__);
$cmds[] = "ps aux | grep 'app/console'";
$cmds[] = "app/console server:run";

foreach ($cmds as $cmd) {
    $tmp=$output=$return_var=null;

    $tmp = exec($cmd,$output,$return_var);
    print '<br/>-------<br/>';
    print nl2br(print_r($tmp,true));
    print '<br/>-------<br/>';
    print nl2br(print_r($output,true));
    print '<br/>-------<br/>';
    print nl2br(print_r($return_var,true));
    print '<br/>-------<br/>';
}
