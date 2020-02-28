-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-02-28 10:10:58
-- 服务器版本： 8.0.19
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `la_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `la_admins`
--

CREATE TABLE `la_admins` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_super` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 is super admin',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 is start status',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_admins`
--

INSERT INTO `la_admins` (`id`, `username`, `password`, `nickname`, `email`, `is_super`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'Muxi_k', 'muxikf4@gmail.com', '1', '1', 1111, 11111, NULL),
(2, 'zhang', 'zhang', '小张', 'zhang@gmail.com', '0', '0', 1582549427, 1582624363, NULL),
(3, 'Qiaojin', '123', '作者老爷', 'lqjxm666@163.com', '1', '1', 1582549427, 1582634167, NULL),
(4, 'wangfeng', 'admin', '小王', 'xiaowang@163.com', '0', '0', 158254928, 1582620294, NULL),
(5, 'caixuku', '123', '蔡徐坤', 'cxkdlq@sina.com', '0', '1', 1582624084, 1582633333, NULL),
(6, 'qiaobiluo', 'qbl123', '乔碧罗', 'qblll@tom.com', '0', '0', 1582624205, 1582624205, NULL),
(7, 'niule', 'niulewazi', '游乐王子', 'niulewazi@126.com', '0', '0', 1582624353, 1582636419, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `la_articles`
--

CREATE TABLE `la_articles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `content` longtext NOT NULL,
  `click` int NOT NULL DEFAULT '0',
  `comm_num` int NOT NULL DEFAULT '0',
  `tags` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `member_id` int NOT NULL,
  `cate_id` int NOT NULL,
  `is_top` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 is top',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_articles`
--

INSERT INTO `la_articles` (`id`, `title`, `desc`, `content`, `click`, `comm_num`, `tags`, `member_id`, `cate_id`, `is_top`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'laravel 5.5学习笔记', 'bbb', '<p>laravel 5.5</p>\r\n<p>安装laravel5.5</p>\r\n<p>服务器要求</p>\r\n<p>&nbsp;</p>\r\n<p>PHP &gt;= 7.0.0</p>\r\n<p>PHP OpenSSL 扩展</p>\r\n<p>PHP PDO 扩展</p>\r\n<p>PHP Mbstring 扩展</p>\r\n<p>PHP Tokenizer 扩展</p>\r\n<p>PHP XML 扩展</p>\r\n<p>安装 Laravel</p>\r\n<p>Laravel 利用 Composer 来管理依赖。所以，在使用 Laravel 之前，请确保你的机器上安装了 Composer。</p>\r\n<p>&nbsp;</p>\r\n<p>安装Composer</p>\r\n<p>Ubuntu：sudo apt-get install Composer</p>\r\n<p>CntOS ： sudo yum install Composer</p>\r\n<p>Arch：sudo pacman -S Composer</p>\r\n<p>&nbsp;</p>\r\n<p>使用 Composer 下载 Laravel 安装程序：</p>\r\n<p>&nbsp;composer global require \"laravel/installer\"</p>\r\n<p>1</p>\r\n<p>通过 Composer 创建项目</p>\r\n<p>通过在终端中运行 create-project 命令来安装 Laravel：</p>\r\n<p>&nbsp;</p>\r\n<p>composer create-project --prefer-dist laravel/laravel blog \"5.5.*\"</p>\r\n<p>1</p>\r\n<p>目录权限</p>\r\n<p>安装完 Laravel 后，你可能需要给这两个文件配置读写权限：storage 目录和 bootstrap/cache 目录应该允许 Web 服务器写入，否则 Laravel 将无法运行。</p>\r\n<p>&nbsp;</p>\r\n<p>$ sudo chmod 777 storage/*/*</p>\r\n<p>$ sudo chmod 777 bootstrap/cache</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>目录结构</p>\r\n<p>app:应用的核心代码</p>\r\n<p>bootstrap:少许文件&ndash;&gt;用于框架的启动和自动载入配置</p>\r\n<p>config:应用的所有配置文件</p>\r\n<p>database:包含数据库迁移文件以及填充文件</p>\r\n<p>public:应用的入口文件,前端资源文件</p>\r\n<p>resources:试图文件,未编译的原生前端资源文件</p>\r\n<p>routes:应用定义的所有路由</p>\r\n<p>storeage:防止包含了编译后的blade模板,session,文件缓存</p>\r\n<p>tests:自动化测试文件</p>\r\n<p>Vendor:第三方类库,通过composer加载依赖</p>\r\n<p>路由调用控制器</p>\r\n<p>在routes目录下的web.php文件定义</p>\r\n<p>/*</p>\r\n<p>&nbsp;* get : 请求资源</p>\r\n<p>&nbsp;* post: 更新全部资源</p>\r\n<p>&nbsp;* put : 更新部分资源</p>\r\n<p>&nbsp;*/</p>\r\n<p>Route::get(\'/page\',function(){</p>\r\n<p>&nbsp; &nbsp; return \'this is Larvel!\';</p>\r\n<p>});</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p>5</p>\r\n<p>6</p>\r\n<p>7</p>\r\n<p>8</p>\r\n<p>访问方法:public/index.php/page</p>\r\n<p>&nbsp;</p>\r\n<p>路由传递参数两种方式:</p>\r\n<p>必选参数</p>\r\n<p>可选参数</p>\r\n<p># 必选参数</p>\r\n<p>Route::get(\'/my_name/{name}\',function($name){</p>\r\n<p>&nbsp; &nbsp; return \'your name is\'.$name;</p>\r\n<p>});</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p># 可选参数</p>\r\n<p>Route::get(\'/page/{name?}\', function ($name=null) {</p>\r\n<p>&nbsp; &nbsp; return $name;</p>\r\n<p>});</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p>定义控制器</p>\r\n<p>App\\Http\\Controllers</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;?php</p>\r\n<p>// PageController.php</p>\r\n<p>namespace App\\Http\\Controllers;</p>\r\n<p>&nbsp;</p>\r\n<p>class PageController extends Controller</p>\r\n<p>{</p>\r\n<p>&nbsp; &nbsp; public function index()</p>\r\n<p>&nbsp; &nbsp; {</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; return \'page1\';</p>\r\n<p>&nbsp; &nbsp; }</p>\r\n<p>}</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p>5</p>\r\n<p>6</p>\r\n<p>7</p>\r\n<p>8</p>\r\n<p>9</p>\r\n<p>10</p>\r\n<p>11</p>\r\n<p>定义路由:web.php</p>\r\n<p>&nbsp;</p>\r\n<p>Route::get(\'/Page\',\'\\App\\Http\\Controllers\\PageController@index\');</p>\r\n<p>//@指定方法名</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>使用Artisan命令快速创建控制器</p>\r\n<p>&nbsp;</p>\r\n<p>php artisan make:controller 控制器名</p>\r\n<p>&nbsp;</p>\r\n<p>视图模板</p>\r\n<p>1.使用blade</p>\r\n<p>resources/Post/Post.blade.php</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;!DOCTYPE html&gt;</p>\r\n<p>&lt;html lang=\"en\"&gt;</p>\r\n<p>&lt;head&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;meta charset=\"UTF-8\"&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\"&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;title&gt;Document&lt;/title&gt;</p>\r\n<p>&lt;/head&gt;</p>\r\n<p>&lt;body&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;h1&gt;Hello laravel!&lt;/h1&gt;</p>\r\n<p>&lt;/body&gt;</p>\r\n<p>&lt;/html&gt;</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p>5</p>\r\n<p>6</p>\r\n<p>7</p>\r\n<p>8</p>\r\n<p>9</p>\r\n<p>10</p>\r\n<p>11</p>\r\n<p>12</p>\r\n<p>创建控制器PostController.php</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;?php</p>\r\n<p>&nbsp;</p>\r\n<p>namespace App\\Http\\Controllers;</p>\r\n<p>&nbsp;</p>\r\n<p>use Illuminate\\Http\\Request;</p>\r\n<p>&nbsp;</p>\r\n<p>class PostController extends Controller</p>\r\n<p>{</p>\r\n<p>&nbsp; &nbsp; public function index(){</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; return view(\'Post/index\');</p>\r\n<p>&nbsp; &nbsp; }</p>\r\n<p>}</p>\r\n<p>&nbsp;</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>4</p>\r\n<p>5</p>\r\n<p>6</p>\r\n<p>7</p>\r\n<p>8</p>\r\n<p>9</p>\r\n<p>10</p>\r\n<p>11</p>\r\n<p>12</p>\r\n<p>13</p>\r\n<p>设置路由web.php</p>\r\n<p>&nbsp;</p>\r\n<p>Route::get(\'/Post\',\'\\App\\Http\\Controllers\\PostController@index\');</p>\r\n<p>1</p>\r\n<p>向视图传递变量</p>\r\n<p>使用with方法</p>\r\n<p>// 控制器设置变量</p>\r\n<p>$name = \"Muxi_k\";</p>\r\n<p>return view(\'Post/index\')-&gt;with(\'name\',$name);</p>\r\n<p>1</p>\r\n<p>2</p>\r\n<p>3</p>\r\n<p>试图接收变量</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;h1&gt;{{ $name }}&lt;/h1&gt;</p>\r\n<p>1</p>\r\n<p>使用直接传递</p>\r\n<p>return view(\'Post/index\',[\'title\' =&gt; \'今天要吃什么\']);</p>\r\n<p>1</p>\r\n<p>试图接收变量</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;h1&gt;{{ $title }}&lt;/h1&gt;</p>\r\n<p>1</p>\r\n<p>TODO&hellip;</p>\r\n<p>原文链接：https://blog.csdn.net/Muxi_k/article/details/103642966</p>', 3, 2, 'demo|laravel', 1, 1, '0', '1', 1, 1582883401, NULL),
(2, '测试文章', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, distinctio error praesentium ut aut autem saepe voluptatum! Earum ex dignissimos laboriosam nulla neque unde ea praesentium exercitationem dolore? Distinctio, magnam?', '<div style=\"color: #bbbbbb; background-color: #282c34; font-size: 14px; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt, repellendus alias placeat voluptatum aliquid odit, possimus harum debitis, quasi tempora iusto non perferendis est sint itaque hic consequatur omnis! Aliquid ratione quaerat rem asperiores? Provident sapiente quasi error ipsam dignissimos qui nihil voluptatibus, quibusdam cupiditate nostrum porro at, esse quaerat rerum eveniet obcaecati. Sunt maxime illum commodi ratione nam illo adipisci, porro iste accusantium, facere est, nihil ex sequi sed doloremque! Eum perspiciatis officia nam eveniet soluta libero enim animi explicabo suscipit amet, beatae vo<strong>luptas nulla quas ducimus adip</strong>isci saepe pariatur esse illo magni? Sed molestiae vel rerum ipsum.</div>', 5, 3, 'aa', 1, 1, '0', '1', 1581712183, 1582883637, NULL),
(3, '常见网页编辑器(富文本，Markdown，代码编辑等', '编辑器：网页不常用的功能，但却又是不可少的功能，如果要造个编辑器轮子，它可以把人玩死！！前端几大禁忌就有富文本， 为什么都说富文本编辑器是天坑?\r\n\r\n \r\n\r\n下面记录一下常见的一些编辑器，该文随时更新：', '<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">富文本编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/tinymce/tinymce\" target=\"_blank\" rel=\"noopener noreferrer\">Tinymce</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">tinymce 是一家老牌做富文本的公司，它的产品经受了市场的认可，不管是文档还是配置的自由度都很好。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">tinymce 的去格式化相当的好，它还有一些增值服务(付费插件)，最好用的就是powerpaste，非常的强大，支持从 word 里面复制各种东西，而且还帮你顺带格式化了。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/quilljs/quill\" target=\"_blank\" rel=\"noopener noreferrer\">quill</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个非常火的富文本，长相很不错。基于它写插件也很简单，api 设计也很简单。楼主不选择它的原因是它对图片的各种操作不友善，而且很难改。如果对图片没什么操作的用户，推荐使用。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/ianstormtaylor/slate\" target=\"_blank\" rel=\"noopener noreferrer\">slate</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个 完全 可定制的富文本编辑框架。通过 Slate，你可以构建出类似 Medium、Dropbox Paper 或者 Canvas 这样使用直观、富交互、体验业已成为 Web 应用标杆的编辑器。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">同时，你也无需担心在代码实现上陷入复杂度的泥潭之中。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/galetahub/ckeditor\" target=\"_blank\" rel=\"noopener noreferrer\">ckeditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一家老牌做富文本的公司，楼主旧版后台用的就是这个，今年也出了 5.0 版本，ui 也变美观了不少，相当的不错，而且它号称是插件最丰富的富文本了。推荐大家可以试用一下。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/wangfupeng1988/wangEditor\" target=\"_blank\" rel=\"noopener noreferrer\">wangEditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个国人写的富文本，用过感觉还是不错的。不过毕竟是个人的，不像专门公司做富文本的，配置型和丰富性不足。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/neilj/Squire\" target=\"_blank\" rel=\"noopener noreferrer\">squire</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个比较轻量的富文本，压缩完才 11.5kb，相对于其它的富文本来说是非常的小了，推荐功能不复杂的建议使用。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"http://ueditor.baidu.com/website/index.html\" target=\"_blank\" rel=\"noopener noreferrer\">UEditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">百度出品，ui 真的不好看，不符合当今审美了，官方也已经很久没跟新过了。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/yabwe/medium-editor\" target=\"_blank\" rel=\"noopener noreferrer\">medium-<em style=\"margin: 0px; padding: 0px;\">editor</em></a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">大名鼎鼎的 medium 的富文本(非官方出品)，但完成度还是不很不错，拓展性也不错。不过我觉得大部分用户还是会不习惯 medium 这种写作方式的。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/summernote/summernote\" target=\"_blank\" rel=\"noopener noreferrer\">summernote</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;一个对不推荐的富文本。这是一个韩国人开源的富文本(当然不推荐的理由不是因为这个)，它对很多富文本业界公认的默认行为理解是反其道而行的，</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">而且只为用了一个 dialog 的功能，引入了 bootstrap，一堆人抗议就是不改。格式化也是差劲。。反正不要用！不要用！不要用！</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">当然你也可以选择一些付费的富文本编辑器，如：<a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://www.froala.com/wysiwyg-editor\" target=\"_blank\" rel=\"noopener noreferrer\">froala-editor</a>&nbsp;这款编辑器。不管是美观和易用性都是不错的，公司买的是专业版，一年也就 $349 ，价格也是很合理的，但其实省去的程序员开发成本可能远不止这个价钱。 # Tinymce</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">代码编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/codemirror/CodeMirror\" target=\"_blank\" rel=\"noopener\"><span class=\"RichText ztext CopyrightRichText-richText\" style=\"margin: 0px; padding: 0px;\">codemirror</span></a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">Markdown 编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/nhnent/tui.editor\" target=\"_blank\" rel=\"noopener noreferrer\">tui.editor</a></h3>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/sparksuite/simplemde-markdown-editor\" target=\"_blank\" rel=\"noopener noreferrer\">simplemde-markdown-editor</a>&nbsp;(已经很久不更新)</h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>', 0, 0, 'Web|编辑器', 1, 1, '1', '1', 1582712183, 1582726772, NULL),
(4, '常见网页编辑器(富文本，Markdown，代码编辑等', '编辑器：网页不常用的功能，但却又是不可少的功能，如果要造个编辑器轮子，它可以把人玩死！！前端几大禁忌就有富文本， 为什么都说富文本编辑器是天坑?\r\n\r\n \r\n\r\n下面记录一下常见的一些编辑器，该文随时更新：', '<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">富文本编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/tinymce/tinymce\" target=\"_blank\" rel=\"noopener noreferrer\">Tinymce</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">tinymce 是一家老牌做富文本的公司，它的产品经受了市场的认可，不管是文档还是配置的自由度都很好。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">tinymce 的去格式化相当的好，它还有一些增值服务(付费插件)，最好用的就是powerpaste，非常的强大，支持从 word 里面复制各种东西，而且还帮你顺带格式化了。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/quilljs/quill\" target=\"_blank\" rel=\"noopener noreferrer\">quill</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个非常火的富文本，长相很不错。基于它写插件也很简单，api 设计也很简单。楼主不选择它的原因是它对图片的各种操作不友善，而且很难改。如果对图片没什么操作的用户，推荐使用。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/ianstormtaylor/slate\" target=\"_blank\" rel=\"noopener noreferrer\">slate</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个 完全 可定制的富文本编辑框架。通过 Slate，你可以构建出类似 Medium、Dropbox Paper 或者 Canvas 这样使用直观、富交互、体验业已成为 Web 应用标杆的编辑器。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">同时，你也无需担心在代码实现上陷入复杂度的泥潭之中。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/galetahub/ckeditor\" target=\"_blank\" rel=\"noopener noreferrer\">ckeditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一家老牌做富文本的公司，楼主旧版后台用的就是这个，今年也出了 5.0 版本，ui 也变美观了不少，相当的不错，而且它号称是插件最丰富的富文本了。推荐大家可以试用一下。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/wangfupeng1988/wangEditor\" target=\"_blank\" rel=\"noopener noreferrer\">wangEditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个国人写的富文本，用过感觉还是不错的。不过毕竟是个人的，不像专门公司做富文本的，配置型和丰富性不足。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/neilj/Squire\" target=\"_blank\" rel=\"noopener noreferrer\">squire</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">一个比较轻量的富文本，压缩完才 11.5kb，相对于其它的富文本来说是非常的小了，推荐功能不复杂的建议使用。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"http://ueditor.baidu.com/website/index.html\" target=\"_blank\" rel=\"noopener noreferrer\">UEditor</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">百度出品，ui 真的不好看，不符合当今审美了，官方也已经很久没跟新过了。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/yabwe/medium-editor\" target=\"_blank\" rel=\"noopener noreferrer\">medium-<em style=\"margin: 0px; padding: 0px;\">editor</em></a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">大名鼎鼎的 medium 的富文本(非官方出品)，但完成度还是不很不错，拓展性也不错。不过我觉得大部分用户还是会不习惯 medium 这种写作方式的。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/summernote/summernote\" target=\"_blank\" rel=\"noopener noreferrer\">summernote</a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;一个对不推荐的富文本。这是一个韩国人开源的富文本(当然不推荐的理由不是因为这个)，它对很多富文本业界公认的默认行为理解是反其道而行的，</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">而且只为用了一个 dialog 的功能，引入了 bootstrap，一堆人抗议就是不改。格式化也是差劲。。反正不要用！不要用！不要用！</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">当然你也可以选择一些付费的富文本编辑器，如：<a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://www.froala.com/wysiwyg-editor\" target=\"_blank\" rel=\"noopener noreferrer\">froala-editor</a>&nbsp;这款编辑器。不管是美观和易用性都是不错的，公司买的是专业版，一年也就 $349 ，价格也是很合理的，但其实省去的程序员开发成本可能远不止这个价钱。 # Tinymce</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">代码编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/codemirror/CodeMirror\" target=\"_blank\" rel=\"noopener\"><span class=\"RichText ztext CopyrightRichText-richText\" style=\"margin: 0px; padding: 0px;\">codemirror</span></a></h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>\r\n<h2 style=\"margin: 10px 0px; padding: 0px; font-size: 21px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\">Markdown 编辑器</h2>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/nhnent/tui.editor\" target=\"_blank\" rel=\"noopener noreferrer\">tui.editor</a></h3>\r\n<h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #faf7ef;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3;\" href=\"https://github.com/sparksuite/simplemde-markdown-editor\" target=\"_blank\" rel=\"noopener noreferrer\">simplemde-markdown-editor</a>&nbsp;(已经很久不更新)</h3>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">&nbsp;</p>', 0, 0, 'Web|编辑器', 2, 1, '0', '1', 1582714167, 1582794239, NULL),
(5, '用JQuery内置animate方法实现数字递增动画', '平时使用animate只用于dom节点的动画，无意间发现JQuery内置的animate方法可实现数字动画，JQ还是挺强大的！', '<div id=\"cnblogs_post_body\" class=\"blogpost-body \" style=\"margin: 0px 0px 20px; padding: 0px; word-break: break-word; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">\r\n<p style=\"margin: 10px auto; padding: 0px;\">动画效果为从<span style=\"margin: 0px; padding: 0px; color: #ff0000;\">0一步步跳到84</span>，代码如下：</p>\r\n<div class=\"cnblogs_code\" style=\"margin: 5px 0px; padding: 5px; background-color: #f5f5f5; border: 1px solid #cccccc; overflow: auto; color: #000000; font-family: \'Courier New\' !important; font-size: 12px !important;\">\r\n<div class=\"cnblogs_code_toolbar\" style=\"margin: 5px 0px 0px; padding: 0px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3; text-decoration-line: underline; border: none !important;\" title=\"复制代码\"><img style=\"margin: 0px; padding: 0px; height: auto; max-width: 100%; border: none !important;\" src=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" /></a></span></div>\r\n<pre style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: \'Courier New\' !important;\"><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 1</span> <span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">$({\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 2</span>   <span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\">//</span><span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\"> 起始值</span>\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 3</span>   countNum: 0\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 4</span> <span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">}).animate({\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 5</span>   <span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\">//</span><span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\"> 最终值</span>\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 6</span>   countNum: 84\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 7</span> <span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">}, {\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 8</span>   <span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\">//</span><span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\"> 动画持续时间</span>\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\"> 9</span>   duration: 3000<span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">,\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">10</span>   easing: \"linear\"<span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">,\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">11</span>   step: <span style=\"margin: 0px; padding: 0px; color: #0000ff; line-height: 1.5 !important;\">function</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">() {\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">12</span>     <span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\">//</span><span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\"> 设置每步动画计算的数值</span>\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">13</span>     $(\'#num\').text(Math.floor(<span style=\"margin: 0px; padding: 0px; color: #0000ff; line-height: 1.5 !important;\">this</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">.countNum));\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">14</span> <span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">  },\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">15</span>   complete: <span style=\"margin: 0px; padding: 0px; color: #0000ff; line-height: 1.5 !important;\">function</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">() {\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">16</span>     <span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\">//</span><span style=\"margin: 0px; padding: 0px; color: #008000; line-height: 1.5 !important;\"> 设置动画结束的数值</span>\r\n<span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">17</span>     $(\'#num\').text(<span style=\"margin: 0px; padding: 0px; color: #0000ff; line-height: 1.5 !important;\">this</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">.countNum);\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">18</span> <span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">  }\r\n</span><span style=\"margin: 0px; padding: 0px; color: #008080; line-height: 1.5 !important;\">19</span> });</pre>\r\n<div class=\"cnblogs_code_toolbar\" style=\"margin: 5px 0px 0px; padding: 0px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a style=\"margin: 0px; padding: 0px; color: #6466b3; text-decoration-line: underline; border: none !important;\" title=\"复制代码\"><img style=\"margin: 0px; padding: 0px; height: auto; max-width: 100%; border: none !important;\" src=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" /></a></span></div>\r\n</div>\r\n<p style=\"margin: 10px auto; padding: 0px;\">&nbsp;</p>\r\n</div>\r\n<div id=\"MySignature\" style=\"margin: 0px; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">\r\n<p style=\"margin: 0px auto 1em; padding: 0px;\">&nbsp;</p>\r\n<h3 style=\"margin: 15px auto 2px; padding: 0px; font-size: 18px; color: red;\">作者推荐：</h3>\r\n<p style=\"margin: 0px auto 1em; padding: 0px;\"><a style=\"margin: 0px; padding: 0px; color: red;\" title=\"极简网&mdash;专属程序员的导航地址\" href=\"http://jijian.link/\" target=\"_blank\" rel=\"noopener\">极简网&mdash;专属程序员的导航地址</a></p>\r\n</div>', 2, 1, 'Web|编辑器', 2, 2, '1', '1', 1582714188, 1582883623, NULL),
(6, 'webapp接口安全设计思路', '在做webqq或者说app开发的时候，免不了会有接口是有权限的（如查询用户敏感信息等），这时接口安全设计思路就非常重要了。', '<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">在做webqq或者说app开发的时候，免不了会有接口是有权限的（如查询用户敏感信息等），这时接口安全设计思路就非常重要了。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">简单一点，在APP中保存登录数据，每次调用接口时传输</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">程序员总能给自己找到偷懒的方法，有的程序为了省事，会在用户登录后，直接把用户名和密码保存在本地，然后每次调用后端接口时作为参数传递。真省事儿啊！可这种方法简单就像拿着一袋子钱在路上边走边喊&ldquo;快来抢我呀！快来抢我呀！&rdquo;，一个小小的嗅探器就能把用户的密码拿到手，如果用户习惯在所有地方用一个密码，那么你闯大祸了，黑客通过撞库的方法能把用户的所有信息一锅端。</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">安全一点：登录时请求一次token，之后用token调用接口</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">用户在登录时，把登录信息传递给后台，后台通过加密算法生成token并将token保存在数据库或者缓存服务器，同时把token返回给客户端，接口调用时候都带上token参数，后台通过判断token是否有效给予不同权限。（PS:token算法&nbsp; md5(username+timestamp+随机字符串)）</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">更安全一点：再生成一个sign</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">用deviceid和时间戳再生成一个参数sign，比如 md5(deviceid+timestamp+ip+token)这样的形式。数据请求：https://api.xx.com/api?tamp=12445323134&amp;token=adcdaxdecagh&amp;sign=FDK2434JKJFD334FDF2</p>\r\n<p style=\"margin: 10px auto; padding: 0px; color: #393939; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: #faf7ef;\">PS:token控制有效期，sign保证数据完整性。</p>', 0, 0, '安全|api', 1, 2, '1', '1', 1582714989, 1582794365, NULL),
(7, 'laravel-验证码', '验证码\r\n验证码 是防止恶意破解密码、刷票、论坛灌水、刷页的手段。验证码有 多种类型。 本项目中我们将使用图片验证码，其原理是让用户输入一个扭曲变形的图片上所显示的文字或数字，扭曲变形是为了避免被光学字符识别软件（OCR）自动辨识。由于计算机无法识别验证码的图片，所以回答出问题的用户就可以被认为是人类。', '<p>验证码</p>\r\n<p>验证码 是防止恶意破解密码、刷票、论坛灌水、刷页的手段。验证码有 多种类型。 本项目中我们将使用图片验证码，其原理是让用户输入一个扭曲变形的图片上所显示的文字或数字，扭曲变形是为了避免被光学字符识别软件（OCR）自动辨识。由于计算机无法识别验证码的图片，所以回答出问题的用户就可以被认为是人类。</p>\r\n<p>&nbsp;</p>\r\n<p>接下来我们将使用验证码来防卫的用户注册功能。</p>\r\n<p>&nbsp;</p>\r\n<p>安装扩展包</p>\r\n<p>我们将以第三方扩展包 mews/captcha 作为基础来实现 Laravel 中的验证码功能。</p>\r\n<p>&nbsp;</p>\r\n<p>使用 Composer 安装：</p>\r\n<p>&nbsp;</p>\r\n<p>$ composer require \"mews/captcha:~2.0\"</p>\r\n<p>运行以下命令生成配置文件 config/captcha.php：</p>\r\n<p>&nbsp;</p>\r\n<p>$&nbsp; php artisan vendor:publish --provider=\'Mews\\Captcha\\CaptchaServiceProvider\'&nbsp;</p>\r\n<p>我们可以打开配置文件，查看其内容：</p>\r\n<p>&nbsp;</p>\r\n<p>config/captcha.php</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;?php</p>\r\n<p>&nbsp;</p>\r\n<p>return [</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; \'characters\' =&gt; \'2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ\',</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; \'default\'&nbsp; &nbsp;=&gt; [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'length\'&nbsp; &nbsp; =&gt; 5,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'width\'&nbsp; &nbsp; &nbsp;=&gt; 120,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'height\'&nbsp; &nbsp; =&gt; 36,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'quality\'&nbsp; &nbsp;=&gt; 90,</p>\r\n<p>&nbsp; &nbsp; ],</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; \'flat\'&nbsp; &nbsp;=&gt; [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'length\'&nbsp; &nbsp; =&gt; 6,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'width\'&nbsp; &nbsp; &nbsp;=&gt; 160,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'height\'&nbsp; &nbsp; =&gt; 46,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'quality\'&nbsp; &nbsp;=&gt; 90,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'lines\'&nbsp; &nbsp; &nbsp;=&gt; 6,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'bgImage\'&nbsp; &nbsp;=&gt; false,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'bgColor\'&nbsp; &nbsp;=&gt; \'#ecf2f4\',</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'fontColors\'=&gt; [\'#2c3e50\', \'#c0392b\', \'#16a085\', \'#c0392b\', \'#8e44ad\', \'#303f9f\', \'#f57c00\', \'#795548\'],</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'contrast\'&nbsp; =&gt; -5,</p>\r\n<p>&nbsp; &nbsp; ],</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; \'mini\'&nbsp; &nbsp;=&gt; [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'length\'&nbsp; &nbsp; =&gt; 3,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'width\'&nbsp; &nbsp; &nbsp;=&gt; 60,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'height\'&nbsp; &nbsp; =&gt; 32,</p>\r\n<p>&nbsp; &nbsp; ],</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; \'inverse\'&nbsp; &nbsp;=&gt; [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'length\'&nbsp; &nbsp; =&gt; 5,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'width\'&nbsp; &nbsp; &nbsp;=&gt; 120,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'height\'&nbsp; &nbsp; =&gt; 36,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'quality\'&nbsp; &nbsp;=&gt; 90,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'sensitive\' =&gt; true,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'angle\'&nbsp; &nbsp; &nbsp;=&gt; 12,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'sharpen\'&nbsp; &nbsp;=&gt; 10,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'blur\'&nbsp; &nbsp; &nbsp; =&gt; 2,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'invert\'&nbsp; &nbsp; =&gt; true,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; \'contrast\'&nbsp; =&gt; -5,</p>\r\n<p>&nbsp; &nbsp; ]</p>\r\n<p>&nbsp;</p>\r\n<p>];</p>\r\n<p>可以看到这些配置选项都非常通俗易懂，characters 选项是用来显示给用户的所有字符串，default, flat, mini, inverse 分别是定义的四种验证码类型，你可以在此修改对应选项自定义验证码的长度、背景颜色、文字颜色等属性，在此不做过多叙述。</p>\r\n<p>&nbsp;</p>\r\n<p>页面嵌入</p>\r\n<p>此扩展包的使用分为两步：</p>\r\n<p>&nbsp;</p>\r\n<p>前端展示 &mdash;&mdash; 生成验证码给用户展示，并收集用户输入的答案；</p>\r\n<p>后端验证 &mdash;&mdash; 接收答案，检测用户输入的验证码是否正确。</p>\r\n<p>1. 前端展示</p>\r\n<p>接下来我们请将注册页面模板 register.blade.php 内容替换为以下：</p>\r\n<p>&nbsp;</p>\r\n<p>resources/views/auth/register.blade.php</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;div class=\"form-group row\"&gt;</p>\r\n<p>&nbsp; &lt;label for=\"captcha\" class=\"col-md-4 col-form-label text-md-right\"&gt;验证码&lt;/label&gt;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &lt;div class=\"col-md-6\"&gt;</p>\r\n<p>&nbsp; &nbsp; &lt;input id=\"captcha\" class=\"form-control{{ $errors-&gt;has(\'captcha\') ? \' is-invalid\' : \'\' }}\" name=\"captcha\" required&gt;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; &lt;img class=\"thumbnail captcha mt-3 mb-2\" src=\"{{ captcha_src(\'flat\') }}\" onclick=\"this.src=\'/captcha/flat?\'+Math.random()\" title=\"点击图片重新获取验证码\"&gt;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; @if ($errors-&gt;has(\'captcha\'))</p>\r\n<p>&nbsp; &nbsp; &nbsp; &lt;span class=\"invalid-feedback\" role=\"alert\"&gt;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;strong&gt;{{ $errors-&gt;first(\'captcha\') }}&lt;/strong&gt;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &lt;/span&gt;</p>\r\n<p>&nbsp; &nbsp; @endif</p>\r\n<p>&nbsp; &lt;/div&gt;</p>\r\n<p>&lt;/div&gt;</p>\r\n<p>代码讲解：</p>\r\n<p>&nbsp;</p>\r\n<p>我们首先将此文件里的英文翻译为中文；</p>\r\n<p>在『确认密码』区块代码下，我们增加了『验证码』区块代码；</p>\r\n<p>captcha_src() 方法是 mews/captcha 提供的辅助方法，用于生成验证码图片链接；</p>\r\n<p>『验证码』区块中 onclick() 是 JavaScript 代码，实现了点击图片重新获取验证码的功能，允许用户在验证码太难识别的情况下换一张图片试试。</p>\r\n<p>因涉及到样式代码编译，请确保虚拟机里的 $ npm run watch-poll 命令处于运行中。</p>\r\n<p>&nbsp;</p>\r\n<p>2. 后端验证</p>\r\n<p>mews/captcha 是专门为 Laravel 量身定制的扩展包，能很好的兼容 Laravel 生成的注册逻辑。我们只需要在注册的时候，添加上表单验证规则即可：</p>\r\n<p>&nbsp;</p>\r\n<p>app/Http/Controllers/Auth/RegisterController.php</p>\r\n<p>&nbsp;</p>\r\n<p>&lt;?php</p>\r\n<p>.</p>\r\n<p>.</p>\r\n<p>.</p>\r\n<p>&nbsp;</p>\r\n<p>class RegisterController extends Controller</p>\r\n<p>{</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; /**</p>\r\n<p>&nbsp; &nbsp; &nbsp;* Get a validator for an incoming registration request.</p>\r\n<p>&nbsp; &nbsp; &nbsp;*</p>\r\n<p>&nbsp; &nbsp; &nbsp;* @param&nbsp; array&nbsp; $data</p>\r\n<p>&nbsp; &nbsp; &nbsp;* @return \\Illuminate\\Contracts\\Validation\\Validator</p>\r\n<p>&nbsp; &nbsp; &nbsp;*/</p>\r\n<p>&nbsp; &nbsp; protected function validator(array $data)</p>\r\n<p>&nbsp; &nbsp; {</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; return Validator::make($data, [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'name\' =&gt; [\'required\', \'string\', \'max:255\'],</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'email\' =&gt; [\'required\', \'string\', \'email\', \'max:255\', \'unique:users\'],</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'password\' =&gt; [\'required\', \'string\', \'min:6\', \'confirmed\'],</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'captcha\' =&gt; [\'required\', \'captcha\'],</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; ], [</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'captcha.required\' =&gt; \'验证码不能为空\',</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'captcha.captcha\' =&gt; \'请输入正确的验证码\',</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; ]);</p>\r\n<p>&nbsp; &nbsp; }</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>&nbsp; &nbsp; .</p>\r\n<p>}</p>\r\n<p>我们添加了验证规则：</p>\r\n<p>&nbsp;</p>\r\n<p>\'captcha\' =&gt; [\'required\', \'captcha\'],</p>\r\n<p>表达式里的第二个 captcha 是 mews/captcha 自定义的表单验证规则。扩展包非常巧妙地利用了 Laravel 表单验证器提供的 自定义表单验证规则 功能。令我们在开发验证码时非常方便。</p>\r\n<p>&nbsp;</p>\r\n<p>Validator 表单验证的 make () 方法第三个参数是自定义错误提示，这里我们对验证码的错误提示进行自定义。</p>\r\n<p>&nbsp;</p>\r\n<p>&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>\r\n<p>原文作者：GuanJie</p>\r\n<p>转自链接：https://learnku.com/articles/23704</p>\r\n<p>版权声明：著作权归作者所有。商业转载请联系作者获得授权，非商业转载请保留以上作者信息和原文链接。</p>', 1, 0, 'laravel|验证码', 3, 3, '1', '1', 1582884075, 1582884179, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `la_cates`
--

CREATE TABLE `la_cates` (
  `id` int UNSIGNED NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `sort` tinyint NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_cates`
--

INSERT INTO `la_cates` (`id`, `cate_name`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ThinkPHP', 3, 1582679757, 1582792366, NULL),
(2, 'Python', 2, 1582680564, 1582731386, NULL),
(3, 'C++', 1, 1582792388, 1582792388, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `la_comments`
--

CREATE TABLE `la_comments` (
  `id` int UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `article_id` int NOT NULL,
  `member_id` int NOT NULL,
  `created_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_comments`
--

INSERT INTO `la_comments` (`id`, `content`, `article_id`, `member_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'good!!', 5, 2, '0', '1582729784', NULL),
(2, 'nice', 1, 2, '1', '1582729784', NULL),
(3, 'rem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, distinctio error praesentium ut aut autem saepe voluptatum! Earum ex dignissimos laboriosam nulla neque unde ea praesentium exercitationem dolore? Distinctio, magnam?', 2, 3, '1582881923', '1582881923', NULL),
(4, 'rem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, distinctio error praesentium ut aut autem saepe voluptatum! Earum e', 2, 3, '1582882003', '1582882003', NULL),
(5, '感谢作者分享', 4, 3, '1582882107', '1582882107', NULL),
(6, 'class PageController extends Controller', 1, 3, '1582883400', '1582883400', NULL),
(7, '啊啊啊啊啊啊啊啊啊啊', 2, 3, '1582883632', '1582883632', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `la_members`
--

CREATE TABLE `la_members` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_members`
--

INSERT INTO `la_members` (`id`, `username`, `nickname`, `password`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'liqiaojin', 'gege', 'aaaa', 'lqjxm666@163.com', 0, 1582644145, NULL),
(2, 'test01', 'test01a', '123', 'test@email.com', 1582641931, 1582729784, NULL),
(3, 'muxi_k', '作者老爷', '123', 'muxi_k@163.com', 1582874402, 1582874402, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `la_system`
--

CREATE TABLE `la_system` (
  `id` int UNSIGNED NOT NULL,
  `webname` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `la_system`
--

INSERT INTO `la_system` (`id`, `webname`, `copyright`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MuxBlog', 'http://github.com/muxik', 0, 1582734777, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `la_admins`
--
ALTER TABLE `la_admins`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `la_articles`
--
ALTER TABLE `la_articles`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `la_cates`
--
ALTER TABLE `la_cates`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `la_comments`
--
ALTER TABLE `la_comments`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `la_members`
--
ALTER TABLE `la_members`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `la_system`
--
ALTER TABLE `la_system`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `la_admins`
--
ALTER TABLE `la_admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `la_articles`
--
ALTER TABLE `la_articles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `la_cates`
--
ALTER TABLE `la_cates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `la_comments`
--
ALTER TABLE `la_comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `la_members`
--
ALTER TABLE `la_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `la_system`
--
ALTER TABLE `la_system`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
