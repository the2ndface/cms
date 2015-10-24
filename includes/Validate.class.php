<?php
/**
 *	Date:2015年10月5日
 *	User:@author
 *	Content:@file_name
 *
 */
    // Validate class
	class Validate {
	    //verify empty
	    static public function checkNull($_date){
	        if(trim($_date) =='') return true;
	        return false;
 	    } 
	    //verify the length
	    static public function checkLength($_date,$_length,$_flag){
	        if($_flag=='min'){
	            if(mb_strlen(trim($_date),'utf-8')<$_length) return true;
	            return false;
	        }elseif($_flag=='max'){
	            if(mb_strlen(trim($_date),'utf-8')>$_length) return true;
	            return false;
	        }elseif($_flag=='equals'){
	            if(mb_strlen(trim($_date),'utf-8')!=$_length) return true;
	            return false;
	        }else{
	            Tool::alertBack('ERROR:parameter error,only min,max!');
	        }
	    }
	    //verify that equals
	    static public function checkEquals($_date,$_otherdate){
	        if(trim($_date) != trim($_otherdate)) return true;
	        return false;
	    }
	    
	    //verify session
	    static public function checkSession(){
	        if(!isset($_SESSION['admin'])) Tool::alertBack('非法登录！');
	    }
	}
?>