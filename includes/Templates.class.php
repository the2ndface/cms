<?php
/**
 *	Date:2015年9月13日
 *	User:@author
 *	Content:@file_name
 *
 */

	class Templates {
	    //创建一个存放数组的字段
	    private $_vars = array();
	    private $_config = array();
	    //创建一个构造方法
	    public function __construct(){
	        if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE_DIR) ){
	            exit('ERROR：模板文件夹或者编译文件夹或者缓存文件夹没有创建！');
	        }
	        //获取系统变量
	        $_sxe = simplexml_load_file(ROOT_PATH.'/config/profile.xml');
	        $_taglib = $_sxe->xpath('/root/taglib');
	        foreach($_taglib as $_tag){
	            $this->_config["$_tag->name"] = $_tag->value;
	        }
	    }
	  
	    
	    //创建变量注入方法
	    /**
	     * assign()变量注入方法
	     * @param  $_var 要注入的变量名，对应.tpl文件中的需要替换的变量 
	     * @param  $_values 要注入的变量值
	     */
	    public function assign($_var,$_values){
	        if(isset($_var) && !empty($_var)){
	            $this->_vars[$_var] = $_values;
	            
	        }else{
	            exit('ERROR:请设置变量名！');
	        }
	        
	    }
	    
	    
	    //创建一个显示方法，用来显示编译后的文件
	    public function display($_file){
	        //给include进来的tpl传一个模板操作的对象
	        $_tpl = $this;
	        //设置模板文件的路径
	        $_tplFile = TPL_DIR.$_file;
	        //判断模板文件是否存在
	        if(!file_exists($_tplFile)){
	            exit('ERROR：模板文件不存在');
	        }
	        //设置编译文件名
	        $_parFile  = TPL_C_DIR.md5($_file).$_file.'.php';
	        //设置缓存文件名
	        $_cacheFile = CACHE_DIR.md5($_file).$_file.'.html';
	        //判断缓存状态
	        if(IS_CACHE){
	            //判断缓存文件是否存在
	            if(file_exists($_cacheFile) && file_exists($_parFile)){
	                //是否修改过编译文件或者模板文件
	                if(filemtime($_cacheFile)>=filemtime($_parFile) && filemtime($_parFile)>filemtime($_tplFile)){
	                    echo '以下是缓存文件内容';
	                    echo "<br />";
	                    include $_cacheFile;
	                    return;
	                }
	            }
	        }
	        //判断编译文件是否存在，模板文件是否修改过
	        if(!file_exists($_parFile) || (filemtime($_parFile) < filemtime($_tplFile))){
	            
	            //引入模板解析类
	            require ROOT_PATH.'/includes/Parser.class.php';
	            //实例化对象,生成编译文件
	            $_parser = new Parser($_tplFile);//模板文件
	            $_parser->compile($_parFile);//编译后文件
	            
	        }

	        //载入编译文件
	        include $_parFile;
	        if(IS_CACHE){
    	        //生成缓存文件
    	        file_put_contents($_cacheFile, ob_get_contents());
    	        echo ob_get_contents();
    	        //清除缓冲区
    	        ob_end_clean();
    	        //载入缓存文件
    	        include $_cacheFile;
	        }
	    }

	    //创建一个creat方法，用于footer header的这种模块模板的解析使用，而不需要生成缓存文件
	    public function creat($_file){
	        //设置模板文件的路径
	        $_tplFile = TPL_DIR.$_file;
	        //判断模板文件是否存在
	        if(!file_exists($_tplFile)){
	            exit('ERROR：模板文件不存在');
	        }
	        //设置编译文件名
	        $_parFile  = TPL_C_DIR.md5($_file).$_file.'.php';
	        //判断编译文件是否存在，模板文件是否修改过
	        if(!file_exists($_parFile) || (filemtime($_parFile) < filemtime($_tplFile))){
	             
	            //引入模板解析类
	            require_once ROOT_PATH.'/includes/Parser.class.php';
	            //实例化对象,生成编译文件
	            $_parser = new Parser($_tplFile);//模板文件
	            $_parser->compile($_parFile);//编译后文件
	        	      
	        }
	        //载入编译文件
	        include $_parFile;
	    }
	
	}
?>