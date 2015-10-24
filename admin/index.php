<?php
/**
 *	Date:2015年9月21日
 *	User:@author
 *	Content:@file_name
 *
 */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    isset($_SESSION['admin']) ? Tool::alertLocation(null, 'admin.php') : Tool::alertLocation(null, 'admin_login.php');
?>