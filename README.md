# tpext

#### 介绍
ThinkPHP 常用功能扩展

#### 软件架构
1.实现了简单的代码压缩功能

2.改进自定义Postgresql 5.1的数据库驱动,支持获取插入后的ID

3. 加入基于think 对TCPServer的支持

#### 安装教程

使用 composer require pangzi/tpext

#### 使用说明

1. 代码压缩  php think compress  会自动成功 当前项目名_en的目录
2. 使用Pgsql :    dbtype = \\tpext\\db\\connector\\Pgsql 即可
3. 加入swoole 对TCPserver的支持

   修改config目录下在的swoole_tcpserver.php 中的 swoole_class 填入自己写的的处理类,处理类继承 tpext\swoole\BaseSocket;