<?php

namespace Create3DPhoto\Service;

use Create3DPhoto\Entity\Photo;

/**
 * Creates 3D photos from 2D
 *
 * @author Ahmet Akbana - ahmetakbana@gmail.com
 * @link http://github.com/ahmetakbn/create3dphoto
 * @version 1.0.0
 * @date April 18 2015
 */
class CreatePhotoService
{
	
	/**
	 * Left Photo Entity 
	 *
	 * @var Photo
	 */
	private $leftPhoto;
	
	
	/**
	 * Right Photo Entity 
	 *
	 * @var Photo
	 */
	private $rightPhoto;
	
	
	/**
	 * 3D Photo Entity 
	 *
	 * @var Photo
	 */
	private $crPhoto;
	
	
	/**
	 * @param Photo $leftPhoto, Photo $rightPhoto, Photo $crPhoto
	 */
	public function __construct(Photo $leftPhoto, Photo $rightPhoto, Photo $crPhoto)
	{
		$this->leftPhoto = $leftPhoto;
		$this->rightPhoto = $rightPhoto;
		$this->crPhoto = $crPhoto;
	}
	
	
	/**
	 * Creates 3D photo from 2D photos
	 * 
	 * @return boolean true or false
	 */
	public function create()
	{
		list($w1, $h1) = getimagesize(
			$this->leftPhoto->getPhotoPath().'/'.$this->leftPhoto->getPhotoName()
		);
		list($w2, $h2) = getimagesize(
			$this->rightPhoto->getPhotoPath().'/'.$this->rightPhoto->getPhotoName()
		);

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

		$im1 = imagecreatefromjpeg(
			$this->leftPhoto->getPhotoPath().'/'.$this->leftPhoto->getPhotoName()
		);
		$im2 = imagecreatefromjpeg(
			$this->rightPhoto->getPhotoPath().'/'.$this->rightPhoto->getPhotoName()
		);

		for ($i = 1; $i <$w; $i++) {
				
			for ($j = 1; $j <$h; $j++) {

				$col1    = imagecolorat($im1, $i, $j);
				$pixel1  = imagecolorsforindex($im1, $col1);
				
				$col2    = imagecolorat($im2, $i, $j);
				$pixel2  = imagecolorsforindex($im2, $col2);
				
				$newPixel = imagecolorallocate($im2, $pixel1['red'], $pixel2['green'], $pixel2['blue']);
				imagesetpixel($im2,$i,$j,$newPixel);
		
			}

		}

		$photo3d = $this->crPhoto->getPhotoPath().'/'.$this->crPhoto->getPhotoName();

		$create = imagejpeg($im2, $photo3d);

		if($create){
			return true;
		}else{
			return false;
		}
		
	}
	
}
