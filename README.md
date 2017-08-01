# yaf-eloquent
>[yaf](https://github.com/laruence/yaf)是鸟哥用C语言编写的一个PHP框架，yaf文档地址：[http://yaf.laruence.com/manual/](http://yaf.laruence.com/manual/)
# 配置
首先，你得安装yaf,文档里有，[http://php.net/manual/zh/yaf.installation.php](http://php.net/manual/zh/yaf.installation.php) 。
安装完之后，编辑php.ini文件，配置yaf:
```sh
extension=yaf.so
yaf.use_namespace=1 ;开启命名空间
yaf.use_spl_autoload=1 ;开启自动加载
```
[yaf-eloquent]主要添加了:
* [Eloquent ORM](https://github.com/illuminate/database)

先编辑conf/application.ini文件
```sh
{
    "require": {
        "php": ">=5.6.4",
        "illuminate/database": "5.4.*",
        "illuminate/events": "5.4.*",
        "illuminate/pagination": "5.4.*",
        "illuminate/contracts": "5.4.*",
        "illuminate/support": "5.4.*",
        "nesbot/carbon":"1.22.1",
        "symfony/debug": "2.6.*",
        "symfony/var-dumper": "2.6.*"
    },

    "autoload": {
        "psr-4": {
            "App\\Models\\": "application/models",
            "Illuminate\\Pagination\\": ""
        }
    }
}

```
然后记得
```sh
composer install
composer dump-autoload
```
编辑Bootstrap.php文件
```php
/**
 * 加载vendor下的文件
 */
public function _initLoader()
{
    \Yaf\Loader::import(APP_PATH . '/vendor/autoload.php');
}

/**
 * 配置
 */
public function _initConfig()
{
    $this->config = \Yaf\Application::app()->getConfig();//把配置保存起来
    \Yaf\Registry::set('config', $this->config);
}
```

# Eloquent ORM
> [Eloquent ORM](https://github.com/illuminate/database)是Laravel框架里的ORM。

yaf里是没有数据库操作类的，可以自己写一个DAO层，或者直接使用第三方包，推荐[Medoo](https://github.com/catfan/Medoo)和[Eloquent ORM](https://github.com/illuminate/database),chen-yaf里面是使用的[Eloquent ORM](https://github.com/illuminate/database)。
编辑Bootstrap.php文件，添加_initDefaultDbAdapter方法
```php
/**
 * 初始化数据库分发器
 * @function _initDefaultDbAdapter
 * @author   jsyzchenchen@gmail.com
 */
public function _initDefaultDbAdapter()
{
    //初始化 illuminate/database
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($this->config->database->toArray());
    $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));
    $capsule->setAsGlobal();
    //开启Eloquent ORM
    $capsule->bootEloquent();

    class_alias('\Illuminate\Database\Capsule\Manager', 'DB');
}

# demo
http://yourhost/yaf-eloquent/public/index/test
http://yourhost/yaf-eloquent/public/partner?page=2