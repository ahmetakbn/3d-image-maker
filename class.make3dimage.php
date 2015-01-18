<?php

/*
 * Make3dImage - Makes 3D images from 2D
 *
 * @author Ahmet Akbana - ahmetakbana@gmail.com
 * @version 1.0
 * @date January 18 2015
 */

class Make3dImage{


	/**
	* @var string image names and path 
	*/
	private $leftImage;
	private $rightImage;
	private $uploadPath;

	function __construct(){
		
	}


	/**
	* set left side image
	* @param  string  $imageLeft full address of left image
	*/
	public function setLeftImage($imageLeft)
	{
		$this->leftImage = $imageLeft;
	}


	/**
	* set right side image
	* @param  string  $imageRight full address of right image
	*/
	public function setRightImage($imageRight)
	{
		$this->rightImage = $imageRight;
	}


	/**
	* set upload path
	* @param  string  $path upload path
	*/
	public function setUploadPath($path)
	{
		$this->uploadPath = $path;
	}


	/**
	* make 3d image
	* @return true or false
	*/
	public function make3dImage()
	{
		list($w1, $h1) = getimagesize($this->leftImage);
		list($w2, $h2) = getimagesize($this->rightImage);

		if($w1<$w2){
			$w = $w1;
		}else{
			$w = $w2;
		}
		
		if($h1<$h2){
			$h = $h1;
		}else{
			$h = $h2;
		}

		$im1 = imagecreatefromjpeg($this->leftImage);
		$im2 = imagecreatefromjpeg($this->rightImage);

		for ($i = 1; $i <$w; $i++) {
				
			for ($j = 1; $j <$h; $j++) {

				$col1    = imagecolorat($im1, $i, $j);
				$pixel1  = imagecolorsforindex($im1, $col1);
				
				$col2    = imagecolorat($im2, $i, $j);
				$pixel2  = imagecolorsforindex($im2, $col2);
				
				$new_img = imagecolorallocate($im2, $pixel1['red'], $pixel2['green'], $pixel2['blue']);
				imagesetpixel($im2,$i,$j,$new_img);
		
			}

		}

		$img3d = $this->uploadPath.'/3d_image.jpg';

		$make = imagejpeg($im2, $img3d);

		if($make){
			return true;
		}else{
			return false;
		}

	}

}

?>