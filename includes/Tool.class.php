<?php
/**
 *	Date:2015年9月29日
 *	User:@author
 *	Content:@file_name
 *
 */

	class Tool {
	    
	    //弹窗并跳转
	    static public function alertLocation($_info,$_url){
	        echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
	        exit();
	    }
	    
	    //弹窗并返回
	    static public function alertBack($_info){
	        echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
	        exit();
	    }
	    
	}
?>