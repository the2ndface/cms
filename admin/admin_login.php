<?php
/**
 *	Date:2015年9月21日
 *	User:@author
 *	Content:@file_name
 *
 */
    //引入初始化文件
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    if(isset($_SESSION['admin'])) Tool::alertLocation(null, 'admin.php');
    $_tpl->display('admin_login.tpl');
?>