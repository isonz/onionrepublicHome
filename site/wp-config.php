<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'republichome');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'admin888');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',R0,p%{PZU;|{K:l7M9}GWIs1Z$p %C[rA>-;%qf;&B5ER>+Ija}t}>bF#y|TFg9');
define('SECURE_AUTH_KEY',  '^9=!9z?DH|XP7m`u;D*m,|v|DRD[8vo+C>P&X]0f]k^7~<_$yx&d@SWw|Nw+uR]R');
define('LOGGED_IN_KEY',    '-9t7<.d|P~Y%#oNAabg5KJ}BYC?E&|ZkHo+602%Q)+m(}A)9?ynErgU(|Sy&{?A?');
define('NONCE_KEY',        'w?^%iGM2.Z8aO,}B-qv^:bWAGQ+6s}#]=|_!p#CQM7_E`(sC|j >RB#M1=nBFEs3');
define('AUTH_SALT',        'u8)a9^px,oPR]Oy+]ayb2*3.-|,Aot-Uw9P)-41]|#l3;5(^fIb7>E|-@cDJo3R/');
define('SECURE_AUTH_SALT', 'mT1Ij^om[$hiry&7{. nr-:U:(>Sa+3|($sP>#U+0k`V|b +,wB,akApY%!k*!vW');
define('LOGGED_IN_SALT',   'd9V%WZYAz~N&X,!]+L7o[fT1m+`oC=hfd%_+o~tU/H#bsr#P %}(8!`<Jrmm5>xj');
define('NONCE_SALT',       '4fH(8izu[Ugs(rDe)zyC|EA.8*8`q9Wgd(wz3-HE8TeQou?CZk]Rcw*Mqm/OpZt&');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'reHome_';

/**
 * WordPress语言设置，中文版本默认为中文。
 *
 * 本项设定能够让WordPress显示您需要的语言。
 * wp-content/languages内应放置同名的.mo语言文件。
 * 例如，要使用WordPress简体中文界面，请在wp-content/languages
 * 放入zh_CN.mo，并将WPLANG设为'zh_CN'。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
