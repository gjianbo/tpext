# tpext

#### 介绍
ThinkPHP 常用功能扩展

#### 软件架构
1.压缩 APP的功能

2.改进自定义Postgresql 5.1的数据库驱动,支持获取插入后的ID


#### 安装教程

使用 composer require pangzi/tpext

#### 使用说明

1. 代码压缩  php think compress  会自动成功 当前项目名_en的目录
2. 使用Pgsql :    dbtype = \\tpext\\db\\connector\\Pgsql 即可



#### 工具函数

    /**
     * 产生随机字符串
     * @param int $length 指定字符长度
     * @param string $str 字符串前缀
     * @return string
     */
    createNoncestr($length = 32, $str = "")


    /**
     * 根据文件后缀获取文件MINE
     * @param array $ext 文件后缀
     * @param array $mine 文件后缀MINE信息
     * @return string
     * @throws LocalCacheException
     */
    function getExtMine($ext, $mine = [])



    /**
     * 数组转XML内容
     * @param array $data
     * @return string
     */
    function arr2xml($data)

    /**
     * 解析XML内容到数组
     * @param string $xml
     * @return array
     */
    function xml2arr($xml)


    /**
     * 数组转xml内容
     * @param array $data
     * @return null|string|string
     */
    function arr2json($data)


    /**
     * 解析JSON内容到数组
     * @param string $json
     * @return array
     * @throws InvalidResponseException
     */
    function json2arr($json)

    /**
     * 以get访问模拟访问
     * @param string $url 访问URL
     * @param array $query GET数
     * @param array $options
     * @return bool|string
     */
    function get($url, $query = [], $options = [])

    /**
     * 以post访问模拟访问
     * @param string $url 访问URL
     * @param array $data POST数据
     * @param array $options
     * @return bool|string
     */
    function post($url, $data = [], $options = [])