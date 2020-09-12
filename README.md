# yaf

### 1. 安装

```shell
github: https://github.com/laruence/yaf
$PHP_BIN/phpize
./configure --with-php-config=$PHP_BIN/php-config
make && make install
# 生成项目
$PHP_BIN/php  ./tools/yaf_cg sample
```

### 2. 配置

| 选项名称             | 默认值  | 可修改范围     | 更新记录                                                     |
| -------------------- | ------- | -------------- | ------------------------------------------------------------ |
| yaf.environ          | product | PHP_INI_ALL    | 环境名称, 当用INI作为Yaf的配置文件时,  这个指明了Yaf将要在INI配置中读取的节的名字 |
| yaf.library          | NULL    | PHP_INI_ALL    | 全局类库的目录路径                                           |
| yaf.cache_config     | 0       | PHP_INI_SYSTEM | 是否缓存配置文件(只针对INI配置文件生效),  打开此选项可在复杂配置的情况下提高性能 |
| yaf.name_suffix      | 1       | PHP_INI_ALL    | 在处理Controller, Action, Plugin, Model的时候,  类名中关键信息是否是后缀式, 比如UserModel, 而在前缀模式下则是ModelUser |
| yaf.name_separator   | ""      | PHP_INI_ALL    | 在处理Controller, Action, Plugin, Model的时候,  前缀和名字之间的分隔符, 默认为空, 也就是UserPlugin, 加入设置为"_", 则判断的依据就会变成:"User_Plugin",  这个主要是为了兼容ST已有的命名规范 |
| yaf.forward_limit    | 5       | PHP_INI_ALL    | forward最大嵌套深度                                          |
| yaf.use_namespace    | 0       | PHP_INI_SYSTEM | 开启的情况下, Yaf将会使用命名空间方式注册自己的类,  比如Yaf_Application将会变成Yaf\Application |
| yaf.use_spl_autoload | 0       | PHP_INI_ALL    | 开启的情况下, Yaf在加载不成功的情况下, 会继续让PHP的自动加载函数加载, 从性能考虑, 除非特殊情况, 否则保持这个选项关闭 |

```ini
vim /etc/php.ini

[yaf]
yaf.environ = "develop"
yaf.library = "/www/data/libs"
yaf.cache_config = 1
yaf.name_suffix = 1 
yaf.name_separator = ""
yaf.forward_limit = 5
yaf.use_namespace  = 0
yaf.use_spl_autoload = 0 


application.ini

# 设置类似php.ini
application.abc = 1
# 获取abc的值
$config = Yaf_Application::app()->getConfig();
$abc = $config->application->abc;


# 配置redis
[product : common : redis]

[redis]
redis.cache.host = "127.0.0.1"
redis.cache.port = 6379
redis.cache.dbIndex = 1

redis.user.host = "127.0.0.1"
redis.user.port = 6379
redis.user.dbIndex = 12

```

```ini
# 1. library 配置  application\library\Tool
# Http.php
namespace Tool;
class Http{
    public static function getHost(){
        return $_SERVER['HTTP_HOST'].'local';
    }
}
# 2. application.ini 多个逗号分割
application.library.namespace = "Tool,Admin,Conf"  

# 3. 获取/调用
 \Tool\Http::getHost();


# 手动加载
yaf\Loader::import("/data/wwwroot/demo.php")
```

