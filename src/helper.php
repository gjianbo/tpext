<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2019/2/22
 * Time: 10:00
 */

use helper\Logger;
use helper\Pingyin;
use helper\Tools;

/**
 * 保存内容到文件中
 * @param string $content 写日志的内容
 * @param bool $append true 追加内容  false 内部不追加
 */
function phpext_logger($content, $append = true)
{
    Logger::getInstance()->log($content, $append);
}

/**
 * 将字符串转义为拼音
 * @param string $charset 要转换的字符串
 * @param bool $first 返回字符串首字母
 * @param string $separate 返回单词或字母间的分隔符
 * @return string 转换后的拼音
 */
function phpext_pingyin($str, $first = true, $separate = '')
{
    return Pingyin::getInstance()->str2py($str, $first, $separate);
}


/**
 * 使用工具函数
 * @return \phpext\traits\Singleton|null
 */
function phpext_tools()
{
    return Tools::getInstance();
}
