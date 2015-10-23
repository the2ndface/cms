<?php
/**
 *	Date:2015年9月14日
 *	User:@author
 *	Content:@file_name
 *
 */
//     $_array = array();
// 	$_sxe = simplexml_load_file('config/profile.xml');
// 	$_taglib = $_sxe->xpath('/root/taglib');
	
		
// 	foreach($_taglib as $_tag){
// 	    $_array["$_tag->name"] = $_tag->value;
// 	}
	
// 	print_r($_array);
//     $_info = 'this is a warning';
//     echo "<script type='text/javascript'>alert($_info)</script>";

//     require dirname(__FILE__).'/init.inc.php';
//     $_vc = new ValidateCode();
//     $_vc->doimg();

    $_url = "http://www.baidu.com/web?id=15&page=5";
    
    $_par = parse_url($_url);

    parse_str($_par['query'],$_query);

    unset($_query['page']);
    var_dump(http_build_query($_query));
    
?>

