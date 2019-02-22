<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2018/12/24
 * Time: 17:50
 */

namespace tpext\tools;


use HttpException;
use think\Exception;
use tpext\traits\Singleton;


class Logger
{
    use Singleton;


    private $runtime_path = '';

    /**
     * Http constructor.
     */
    public function _init()
    {
        if (defined("RUNTIME_PATH")) {
            $this->runtime_path = RUNTIME_PATH;
        } else {
            $this->runtime_path = app()->getRuntimePath();
        }
    }

    /**
     * 记录异常的bug
     * @param Exception $e
     * @return \think\Response|\think\response\Json
     */
    public function exception($e)
    {
        if (!$e instanceof \Exception) {
            return;
        }


        if ($e instanceof HttpException && $e->getStatusCode() == 404) {
            $logdata['code'] = $e->getStatusCode();
        } else {
            $logdata['code'] = $e->getCode();
        }
        $logdata['message'] = $e->getMessage();
        $logdata['file'] = $e->getFile();
        $logdata['line'] = $e->getLine();
        $logdata['trace'] = $e->getTraceAsString();


        $exception_log = $this->runtime_path . '/exception/' . date('Ym') . '/' . date('Ymd') . '.log';


        $this->writeLogger($exception_log, $logdata, true);

    }

    /**
     * 把内容写入到日志中
     * @param $filename string 要写入文件名
     * @param $strdata string/array 要写入的数据 数组或对象与print_r转换为字符串
     * @return bool   true 保存成功,  false 保存失败
     */

    public function writeLogger($filename, $strdata, $append = true)
    {
        try {
            $dirname = dirname($filename);
            file_exists($dirname) || mkdir($dirname, 0755, true);

            if (!is_string($strdata)) {
                $strdata = print_r($strdata, true);
            }
            $str = "[" . date("Y-m-d H:i:s") . "]" . $strdata . "\r\n";
            if ($append)
                $rs = fopen($filename, "a+");
            else {
                $rs = fopen($filename, "w");
            }
            fwrite($rs, $str);
            fclose($rs);
            return true;
        } catch (\Exception $e) {

            return false;
        }

    }

    /**
     *  记录日志到文件中
     * @param $content  string   要记录的内容
     */
    public function log($content, $append = true)
    {
        $logfile = $this->runtime_path . '/logs/' . date('Ym') . '/' . date('Ymd') . '.log';

        $this->writeLogger($logfile, $content, $append);

    }
}