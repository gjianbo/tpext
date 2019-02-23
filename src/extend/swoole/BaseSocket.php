<?php
/**
 * Created by PhpStorm.
 * User: gjianbo
 * Date: 2019/1/12
 * Time: 17:15
 */

namespace tpext\swoole;

use Swoole\Server as SwooleServer;

abstract class BaseSocket
{
    /**
     * Swoole对象
     * @var object
     */
    protected $swoole;


    /**
     * 支持的响应事件
     * @var array
     */
    protected $event = ['Start', 'Shutdown', 'WorkerStart', 'WorkerStop', 'WorkerExit', 'Connect', 'Receive', 'Packet', 'Close', 'BufferFull', 'BufferEmpty', 'Task', 'Finish', 'PipeMessage', 'WorkerError', 'ManagerStart', 'ManagerStop', 'Open', 'Message', 'HandShake', 'Request'];


    /**
     * 架构函数
     * @access public
     */
    public function __construct($host, $port, $mode, $sockType)
    {
        $this->swoole = new SwooleServer($host, $port, $mode, $sockType);

        // 设置回调
        foreach ($this->event as $event) {
            if (method_exists($this, 'on' . $event)) {
                $this->swoole->on($event, [$this, 'on' . $event]);
            }
        }
    }

    /**
     * 魔术方法 有不存在的操作的时候执行
     * @access public
     * @param string $method 方法名
     * @param array $args 参数
     * @return mixed
     */
    public function __call($method, $args)
    {
        call_user_func_array([$this->swoole, $method], $args);
    }

    /**
     * 获取参数
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return false;
    }

    /**
     * 处理Socket 收到的信息
     * @param $server
     * @param $fd
     * @param $from_id
     * @param $data
     */
    abstract public function onReceive($server, $fd, $from_id, $recvdata);

}