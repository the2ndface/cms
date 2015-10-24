<?php
/**
 *	Date:2015年9月25日
 *	User:@author
 *	Content:@file_name
 *
 */
    class LevelModel extends Model {
        private $id;
        private $level_name;
        private $level_info;

        //拦截器
        private function __set($_key,$_value){
            $this->$_key = Tool::mysqlString($_value);
        }
        private function __get($_key){
            return $this->$_key;
        }
        
        //get one level
        public function getOneLevel() {
            $_sql = "SELECT
                            id,
                            level_name,
                            level_info
                       FROM
                            cms_level
                      WHERE
                            id='$this->id'
                         OR
                            level_name='$this->level_name'
                      LIMIT
                            1";
            return parent::one($_sql);
            
        }
        //get all
        public function getAllLevel(){
            $_sql = "SELECT 
                            id,
                            level_name,
                            level_info
                      FROM
                            cms_level
                    ORDER BY
                            id ASC";   
            return parent::all($_sql);
        }
        
        //add a level
        public function addLevel() {
            $_sql = "INSERT INTO cms_level (
                                                level_name,
                                                level_info
                                            )
                                      VALUES(
                                                '$this->level_name',
                                                '$this->level_info'
                                            )";
            return parent::aud($_sql);
        }
        
        //update level
        public function updatelevel() {
            
            $_sql = "UPDATE 
                                cms_level
                            SET 
                                level_name='$this->level_name',
                                level_info='$this->level_info' 
                          WHERE
                                id='$this->id' 
                          LIMIT 
                                1";
            return parent::aud($_sql);
        }
        
        //delete level
        public function deleteLevel() {
            $_sql = "DELETE FROM cms_level WHERE id='$this->id' LIMIT 1";
            return parent::aud($_sql);
        }
        
    }
    
?>