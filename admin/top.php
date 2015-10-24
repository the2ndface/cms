<?php
/**
 *	Date:2015年9月21日
 *	User:@author
 *	Content:@file_name
 *
 */
    //引入初始化文件
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
//     //引入缓存机制
//     require 'cache.inc.php';
    Validate::checkSession();
    global $_tpl;
    $_tpl->assign('admin_user', $_SESSION['admin']['admin_user']);
    $_tpl->assign('level_name', $_SESSION['admin']['level_name']);
    $_tpl->display('top.tpl');
?>