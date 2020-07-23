<p align="center"><h1>闪电橙音乐API<h1></p>


## 项目介绍

这是一个基于laravel 6.0 框架的一个音乐API系统，本项目适用于新手拿来参考，大神见了勿喷。

## 运行环境

> PHP 7.4
> MySQL 5.7 以上
> Redis 缓存服务
本项目是在Homestead开发的，最好最省事的办法就是你用的也是这个开发环境。

## 开发环境部署与安装
### 将代码拉到本地
```bash
git clone https://github.com/DanceLynx/music-api
```

### 复制.env文件及依赖安装和密钥生成
```bash
$ cd music-api
$ cp .env.example .env
$ composer install
$ php artisan key:generate
$ php artisan jwt:secret # 生成jwt 私钥
# 配置数据库之后
$ php artisan migrate # 执行迁移
$ php artisan db:seed --class=AdminTablesSeeder # 恢复后台数据
$ php artisan admin:create-user # 根据提示创建后台登录用户
```

### 配置.env文件

```env
# 微信配置
WEIXIN_KEY=
WEIXIN_SECRET=
WEIXIN_REDIRECT_URI=
# 阿里云短信
SMS_ALIYUN_ACCESS_KEY_ID=
SMS_ALIYUN_ACCESS_KEY_SECRET=
SMS_ALIYUN_TEMPLATE_REGISTER=
# 七牛云存储
QINIU_ACCESS_KEY=
QINIU_SECRET_KEY=
QINIU_DOMAINS_DEFAULT=
QINIU_BUCKET=
# 其他相关配置省略 包括数据库配置
```
最后就可以正常访问啦！

## 服务器架构说明

- Ubuutu 16.04 LTS Server
- [Laravel LNMP安装脚本](https://github.com/DanceLynx/laravel-ubuntu-init)
这样就可以快速搭建一个适用于线上的环境，详情查看脚本说明。

## 代码上线
需要关闭调试模式
然后各种缓存构建
```bash
# 构建路由缓存
$ php artisan route:cache

# 构建视图缓存
$ php artisan view:cache

# 构建配置缓存
$ php artisan config:cache

# 构建事件缓存
$ php artisan event:cache

```

## 扩展包说明
### 生产环境扩展包

| 扩展包 | 说明 |
|:----:|:----:|
|[intervention/image](https://packagist.org/packages/intervention/image)|支持Laravel的图像处理及操作库|
|[laravel/horizon](https://packagist.org/packages/laravel/horizon)|Laravel队列的界面及代码配置的库|
|[mews/captcha](https://packagist.org/packages/mews/captcha)|Laravel 5 ~ 6 的验证码扩展包|
|[overtrue/laravel-lang](https://packagist.org/packages/overtrue/laravel-lang)|支持52种语言的语言包|
|[encore/laravel-admin](https://packagist.org/packages/encore/laravel-admin)|一个非常棒的后台脚手架|
|[overtrue/easy-sms](https://packagist.org/packages/overtrue/easy-sms)|支持目前市面多家服务商的短信扩展包|
|[zgldh/qiniu-laravel-storage](https://packagist.org/packages/zgldh/qiniu-laravel-storage)|七牛云存储sdk Laravel版|
|[spatie/laravel-query-builder](https://packagist.org/packages/spatie/laravel-query-builder)|轻松构建API sql语句查询|
|[socialiteproviders/weixin](https://packagist.org/packages/socialiteproviders/weixin)|微信登录接口扩展|

### 开发环境的扩展包(dev)

| 扩展包 | 说明 |
|:----:|:----:|
|[barryvdh/laravel-ide-helper](https://packagist.org/packages/barryvdh/laravel-ide-helper)|Laravel IDE Helper为所有Facade类生成正确的PHP文档，以改善自动完成功能。|
|[summerblue/generator](https://packagist.org/packages/summerblue/generator)|一个支持Laravel的代码生成器|

## 自定义 Artisan 命令列表

