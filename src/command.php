<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2019/2/22
 * Time: 10:29
 */
// 注册命令行指令
$commands = [
    'compress' => '\\tpext\\command\\Compress'
];
if (class_exists('\\think\\swoole\\command\\Swoole')) {
    $command['swoole:tcpserver'] = '\\tpext\\command\\Tcpserver';
}
\think\Console::addDefaultCommands($commands);