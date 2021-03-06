<?php
/**
 * 验证码
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-23
 * @author : bing<bbing1989@gmail.com>
 */
if ( !  defined('BASEPATH')) exit('No direct script access allowed');
class ConfirmCode_Model extends CI_Model{
    var $width = 80;

	var $height = "20";//图片高

	var $len = "4";//生成几位验证码

	var $bgcolor = "#ffffff";//背景色

	var $noise = true;//生成杂点

	var $noisenum = 100;//杂点数量

	var $border = false;//边框

	var $bordercolor = "#000000";
    var $fontUrl;
    var $image;

	protected $autoTemplate=0;

	public function make(){
		$this->image = imageCreate($this->width, $this->height);
		$back = self::getcolor(&$this->image,$this->bgcolor);
		imageFilledRectangle($this->image, 0, 0, $this->width, $this->height, $back);
		$size = $this->width/$this->len;
		if($size>$this->height) {
			$size=$this->height;
		}
		$left = ($this->width-$this->len*($size+$size/10))/$size;
		$code = '';
		for ($i=0; $i<$this->len; $i++) {
			$randtext = mt_rand(0, 9);
			$code .= $randtext;
			$textColor = imageColorAllocate($this->image, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
			$font = $this->fontUrl. '/' . rand(1,4) . ".ttf";
			$randsize = rand($size-$size/10, $size+$size/10);
			$location = $left+($i*$size+$size/10);
			imagettftext($this->image, $randsize, mt_rand(-18,18), $location, mt_rand($size-$size/10, $size+$size/10), $textColor, $font, $randtext);
		}
		if($this->noise == true) {
			self::setnoise(&$this->image, &$this->width, &$this->height, &$back, &$this->noisenum);
		}
		$this->bordercolor = self::getcolor(&$this->image,$this->bordercolor);
		if($this->border==true) imageRectangle($this->image, 0, 0, $this->width-1, $this->height-1, $this->bordercolor);
		return $code;
	}

    public function show()
    {
        header('Content-type: image/jpeg');
        imagejpeg($this->image);
		imagedestroy($this->image);
    }
    
    private function getcolor($image, $color) 
    {
    	$color = eregi_replace ("^#","",$color);
    	$r = $color[0].$color[1];
    	$r = hexdec ($r);
    	$b = $color[2].$color[3];
    	$b = hexdec ($b);
    	$g = $color[4].$color[5];
    	$g = hexdec ($g);
    	$color = imagecolorallocate ($image, $r, $b, $g);
    	return $color;
    }
	
    private function setnoise($image, $width, $height, $back, $noisenum)
    {
    	for ($i=0; $i<$noisenum; $i++) {
    		$randColor = imageColorAllocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    		imageSetPixel($image, rand(0, $width), rand(0, $height), $randColor);
    	}
    }
}

