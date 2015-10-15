<?php
/**
 *	Date:2015年10月7日
 *	User:@author
 *	Content:@file_name
 *
 */

	//page class
	class Page {
	    private $total;
	    private $page_size;            //the number of artical per page
	    private $limit;
	    private $pagenum;              //the total number of pages
	    private $page;                 //the current page
	    private $url;                  //get current page's url
	    private $bothnum;              //当前页码两边的显示页数
	    
	    public function __construct($_total,$_page_size){
	        $this->total = $_total;
	        $this->page_size = $_page_size;
	        $this->pagenum = ceil($this->total/$this->page_size);
	        $this->page = $this->setPage();
	        $this->limit = "LIMIT ".($this->page-1)*$this->page_size.",$this->page_size";
	        $this->url = $this->setUrl();
	        $this->bothnum = 2;
	    }
	    
	    private function __get($_key){
	        return $this->$_key;
	    }
	    
	    //get the current page number
	    private function setPage(){
	        if(!empty($_GET['page'])){
	            if($_GET['page']>0){
	                if($_GET['page'] > $this->pagenum){
	                    return $this->pagenum;
	                }else{
	                    return $_GET['page'];
	                }
	            }else{
	                return 1;
	            }
	        }else{
	            return 1;
	        }
	    }
	    
	    //get the url 
	    private function setUrl(){
	        $_url = $_SERVER['REQUEST_URI'];
	        $_par = parse_url($_url);
	        if(isset($_par['query'])){
	            parse_str($_par['query'],$_query);
	            unset($_query['page']);
	            $_url = $_par['path'].'?'.http_build_query($_query);
	        }
	        return $_url;
	    }
	    //number pages
	    private function pageList(){
	        for($i=$this->bothnum;$i>=1;$i--){
	            $_page = $this->page-$i;
	            if($_page<1) continue;
	            $_pagelist .= '<a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a>';
	        }
	        $_pagelist .= '<span class="me">'.$this->page.'</span>';
	        for($i=1;$i<=$this->bothnum;$i++){
	            $_page = $this->page+$i;
	            if($_page>$this->pagenum) break;
	            $_pagelist .= '<a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a>';
	        }
	        return $_pagelist;
	    }
	    //first page
	    private function first(){
	        if($this->page - $this->bothnum >1 ){
	           return '<a href="'.$this->url.'">1</a>...';
	        }
	    }
	    //pre page
	    private function pre(){
	        if($this->page ==1){
	            return '<span class="disable">上一页</span>';
	        }
	        return '<a href="'.$this->url.'&page='.($this->page-1).'">上一页</a>';
	    }
	    //next page
	    private function next(){
	        if($this->page ==$this->pagenum){
	            return '<span class="disable">下一页</span>';
	        }
	        return '<a href="'.$this->url.'&page='.($this->page+1).'">下一页</a>';
	    }   
	    //last page
	    private function last(){
            if($this->page + $this->bothnum < $this->pagenum){
	           return '...<a href="'.$this->url.'&page='.$this->pagenum.'">'.$this->pagenum.'</a>';
            }
	    }
	    //display page number
	    public function showPage(){
	        $_page .= $this->first();
	        $_page .= $this->pageList();
	        $_page .= $this->last();
	        $_page .= $this->pre();
	        $_page .= $this->next();
	        
	        return $_page;
	    }

	}
?>