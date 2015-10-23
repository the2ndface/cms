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
        private $font;              //font file
        private $fontsize = 20;          //font size
        private $fontcolor;         //font color
        
        //the construct initialization
        public function __construct(){
            $this->font = ROOT_PATH.'/font/elephant.ttf';
        }
                
        //create random code from $charset
        private function createCode(){
            $_len = strlen($this->charset);
            for($i=1;$i<=$this->codelen;$i++){
                $this->code .= $this->charset[mt_rand(0,$_len)];
            }
        }
        
        //create background
        private function createBg(){
            $this->img = imagecreatetruecolor($this->width, $this->heigth);
            $_color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
            imagefilledrectangle($this->img,0,0,$this->width,$this->heigth,$_color);
        }
        
        //create font
        private function createFont(){
            $_x = $this->width / $this->codelen;
            for($i=0;$i<$this->codelen;$i++){
                $this->fontcolor = imagecolorallocate($this->img, mt_rand(0,156),  mt_rand(0,156),  mt_rand(0,156));
                imagettftext($this->img, $this->fontsize, mt_rand(-30,30), $_x*$i+mt_rand(1,5), $this->heigth/1.4, $this->fontcolor, $this->font, $this->code[$i]);
            }
        }
        
        //create line,snowflake
        private function createLine(){
            for($i=0;$i<6;$i++){
                $_color = imagecolorallocate($this->img, mt_rand(0,156),  mt_rand(0,156),  mt_rand(0,156));
                imageline($this->img, mt_rand(0,$this->width), mt_rand(0, $this->heigth),mt_rand(0,$this->width), mt_rand(0, $this->heigth), $_color);
            }
            for($i=0;$i<100;$i++){
                $_color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
                imagestring($this->img, mt_rand(1, 5), mt_rand(0,$this->width), mt_rand(0,$this->heigth), '*', $_color);
            }
        }
        
        //export image
        private function outPut(){
            header('Content-type:image/png');
            imagepng($this->img);
            imagedestroy($this->img);
        }
        
        //display
        public function doimg(){
            $this->createBg();
            $this->createCode();
            $this->createLine();
            $this->createFont();
            $this->outPut();
        }
        
        //get code
        public function getCode(){
            return strtolower($this->code);
        }
        
    }
	
?>