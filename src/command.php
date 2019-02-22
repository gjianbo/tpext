<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2019/2/22
 * Time: 10:29
 */
// 注册命令行指令
\think\Console::addDefaultCommands([
    'compress' => '\\tpext\command\Compress',
]);