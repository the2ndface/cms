<?php
/**
 *	Date:2015年9月14日
 *	User:@author
 *	Content:@file_name
 *
 */
    session_start();
    //初始化文件
    header('Content-Type:text/html;Charset=utf-8');             //设置编码为UTF-8
    define('ROOT_PATH', dirname(__FILE__));                     //网站根目录
    require ROOT_PATH.'/config/profile.inc.php';                //引入模板配置信息
    //autoload
    function __autoload($_className){
        if(substr($_className, -6) == 'Action'){
            require ROOT_PATH.'/action/'.$_className.'.class.php';  
        }elseif (substr($_className, -5) == 'Model'){
            require ROOT_PATH.'/model/'.$_className.'.class.php';
        }else{
            require ROOT_PATH.'/includes/'.$_className.'.class.php';
        }
    }
    //引入缓存机制
    require 'cache.inc.php';
    //实例化模板对像
    $_tpl = new Templates();
?>