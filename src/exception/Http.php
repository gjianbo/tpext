<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2018/12/24
 * Time: 17:50
 */

namespace tpext\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use tpext\tools\Logger;


class Http extends Handle
{

    /**
     * @param Exception $e
     * @return \think\Response|\think\response\Json
     */
    public function render(Exception $e)
    {
        if (!$e instanceof Exception) {
            return;
        }

        Logger::getInstance()->exception($e);

        if ($e instanceof HttpException && $e->getStatusCode() == 404) {
            die('<h3>404，您请求的文件不存在!</h3>');
        }

    }

}