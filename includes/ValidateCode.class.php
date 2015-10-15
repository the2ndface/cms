<?php
/**
 *	Date:2015年10月13日
 *	User:@author
 *	Content:@file_name
 *
 */
    //code class
    class ValidateCode {
        private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';    //random effects
        private $code;              //code  
        private $codelen = 4 ;      //code length
        private $width = 130;       //width
        private $heigth = 50;       //height
        private $img;               //image handle
                
        //generate random code from $charset
        private function creatCode(){
            $_len = strlen($this->charset);
            for($i=1;$i<=$this->codelen;$i++){
                $this->code .= $this->charset[mt_rand(0,$_len)];
            }
        }
        
        //generate background
        private function creatBg(){
            $this->img = imagecreatetruecolor($this->width, $this->heigth);
            $_color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
            imagefilledrectangle($this->img,0,0,$this->width,$this->heigth,$_color);
        }
        
        //export image
        private function outPut(){
            header('Content-type:image/png');
            imagepng($this->img);
            imagedestroy($this->img);
        }
        
        //display
        public function doimg(){
            $this->creatBg();
            $this->outPut();
        }
        
    }
	
?>