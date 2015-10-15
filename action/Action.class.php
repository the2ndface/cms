<?php
/**
 *	Date:2015年10月1日
 *	User:@author
 *	Content:@file_name
 *
 */
	//basecontroller
	class Action {
	    protected $_tpl;
	    protected $_model;
	    
	    protected function __construct(&$_tpl,&$_model){
	        $this->_tpl = $_tpl;
	        $this->_model = $_model;
	    }
	}
?>