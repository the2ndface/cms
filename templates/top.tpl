<?php 
/**
 * Author:@author
 * Date:2015年9月21日
 */
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>top</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<script type="text/javascript" src="../js/admin_top_nav.js"></script>
</head>
<body id="top">
    <h1>LOGO</h1>
    <ul>
        <li><a href="../templates/sidebar.html" id="nav1" target="sidebar" class="selected" onclick="admin_top_nav(1)">首页</a></li>
        <li><a href="../templates/sidebarn.html" id="nav2" target="sidebar" onclick="admin_top_nav(2)">内容</a></li>
        <li><a href="###" id="nav3" target="sidebar" onclick="admin_top_nav(3)">会员</a></li>
        <li><a href="###" id="nav4" target="sidebar" onclick="admin_top_nav(4)">系统</a></li>
    </ul>
    <p>
                        您好：{$admin_user} [ {$level_name} ] [ <a href="../index.php" target="_blank">去首页</a> ] [ <a href="manage.php?action=logout" target="_parent">退出</a> ]
    </p>
</body>
</html>