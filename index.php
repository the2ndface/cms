<?php
    //引入初始化文件
    require dirname(__FILE__).'/init.inc.php'; 
    $_tpl->assign(title, '这是一个测试');
    $_tpl->display('index.tpl');
?>