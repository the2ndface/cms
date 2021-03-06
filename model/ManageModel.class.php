<?php
/**
 *	Date:2015年9月25日
 *	User:@author
 *	Content:@file_name
 *
 */
    class ManageModel extends Model {
        private $id;
        private $admin_user;
        private $admin_pass;
        private $level;
        private $limit;
        
        //拦截器
        private function __set($_key,$_value){
            $this->$_key = Tool::mysqlString($_value);
        }
        private function __get($_key){
            return $this->$_key;
        }
       
        //get all manager recoder
        public function getAllTotal(){
            $_sql = "SELECT 
                            COUNT(*) as c
                        FROM
                            cms_manage";
            return parent::total($_sql);
        }
        
        //get the login manager
        public function getLoginManage(){
           $_sql = "SELECT 
							m.admin_user,
							l.level_name 
					FROM 
							cms_manage m,
							cms_level l
					WHERE 
							m.admin_user='$this->admin_user' 
						AND 
							m.admin_pass='$this->admin_pass'
						AND
							m.level=l.id
					LIMIT   1";

			return parent::one($_sql);
        }
        
        
        //查询一名管理员
        public function getOneManage() {
            $_sql = "SELECT
                            id,
                            admin_user,
                            admin_pass,
                            level
                       FROM
                            cms_manage
                      WHERE
                            id='$this->id'
                         OR
                            admin_user='$this->admin_user'
                         OR
                            level='$this->level'
                      LIMIT
                            1";
            return parent::one($_sql);
            
        }
        //查询所有管理员
        public function getAllManage(){
            $_sql = "SELECT 
                            m.id,
                            m.admin_user,
                            m.login_count,
                            m.last_ip,
                            m.last_time,
                            l.level_name
                       FROM 
                            cms_manage m,
                            cms_level l
                      WHERE
                            m.level = l.id
                    ORDER BY
                            m.id ASC
                      $this->limit";   
            return parent::all($_sql);
        }
        
        //新增管理员
        public function addManage() {
            $_sql = "INSERT INTO cms_manage (
                                                admin_user,
                                                admin_pass,
                                                level,
                                                reg_time
                                            )
                                      VALUES(
                                                '$this->admin_user',
                                                '$this->admin_pass',
                                                '$this->level',
                                                NOW()
                                            )";
            return parent::aud($_sql);
        }
        
        //修改管理员
        public function updateManage() {
            
            $_sql = "UPDATE 
                                cms_manage
                            SET 
                                admin_pass='$this->admin_pass',
                                level='$this->level' 
                          WHERE
                                id='$this->id' 
                          LIMIT 
                                1";
            return parent::aud($_sql);
        }
        
        //删除管理员
        public function deleteManage() {
            $_sql = "DELETE FROM cms_manage WHERE id='$this->id' LIMIT 1";
            return parent::aud($_sql);
        }
        
    }
    
?>