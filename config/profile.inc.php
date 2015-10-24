<?php
/**
 *	Date:2015年9月21日
 *	User:@author
 *	Content:@file_name
 *
 */
    //数据库连接信息
    define('DB_HOST','localhost');                          //服务器IP
    define('DB_USER','root');                               //用户名
    define('DB_PASS','wsxnm1234');                          //密码
    define('DB_NAME','cms');                                //数据库名
    
    //
    define('GPC', get_magic_quotes_gpc());                  //mysql auto escaped status
    define('PAGE_SIZE',10);                                 //Number of article to display per page
    //模板配置信息
    define('TPL_DIR', ROOT_PATH.'/templates/');             //存放模板文件夹
    define('TPL_C_DIR', ROOT_PATH.'/templates_c/');         //编译文件夹
    define('CACHE_DIR', ROOT_PATH.'/cache/');               //缓存文件夹
?>