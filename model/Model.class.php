<?php
/**
 *	Date:2015年9月30日
 *	User:@author
 *	Content:@file_name
 *
 */
    //Model base class
	class Model {
	    
	    
	    //get the total number of records
	    protected function total($_sql){
	        $_db = DB::getDB();
	        $_result = $_db->query($_sql);
	        $_total = $_result->fetch_row();
	        DB::unDB($_result, $_db);
	        return $_total[0];
	    }
	    
	    //look up a single data model
	    protected function one($_sql){
	        $_db = DB::getDB();
	        $_result = $_db->query($_sql);
	        $_objects = $_result->fetch_object();
	        DB::unDB($_result, $_db);
	        return $_objects;
	    }
	    // find multiple data models
	    protected function all($_sql){
	        $_db = DB::getDB();
	        $_result = $_db->query($_sql);
	        $_html = array();
	        while (!!$_objects = $_result->fetch_object()) {
	            $_html[] = $_objects;
	        }
	        DB::unDB($_result, $_db);
	        return $_html;
	    }
	    //add,del,update model
	    protected function aud($_sql){
	        $_db = DB::getDB();
	        $_db->query($_sql);
	        $_affect_rows = $_db->affected_rows;
	        DB::unDB($_result=null, $_db);
	        return $_affect_rows;
	    }
	    
	}
?>