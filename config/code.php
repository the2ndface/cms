<?php
/**
 *	Date:2015年10月23日
 *	User:@author
 *	Content:@file_name
 *
 */

    require substr(dirname(__FILE__),0,-7).'/init.inc.php';
    $_vc = new ValidateCode();
    $_vc->doimg();
?>