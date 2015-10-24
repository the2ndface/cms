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
	        if(!empty($_info)){
    	        echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
    	        exit();
	        }else{
	            header('Location:'.$_url);
	            exit();
	        }
	        
	    }
	    
	    //弹窗并返回
	    static public function alertBack($_info){
	        echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
	        exit();
	    }
	    
	    //page display filter
	    static public function htmlString($_date){
	        if(is_array($_date)){
	            foreach ($_date as $_key => $_value){
	                $_string[$_key] = Tool::htmlString($_value);
	            }
	        }elseif(is_object($_date)){
	            foreach ($_date as $_key => $_value){
	                $_string->$_key = Tool::htmlString($_value);
	            }
	        }else{
	            $_string = htmlspecialchars($_date);
	        }
	        return $_string;
	    }
	    
	    //mysql input filter
	    static public function mysqlString($_date){
	        return !GPC ? mysql_real_escape_string($_date) : $_date;
	    }
	    
	    //clear session
	    static public function unSession(){
	        if(session_start()){
	            session_destroy();
	        }
	    }
	    
	}
?>