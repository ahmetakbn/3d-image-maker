<?php

namespace Create3DPhoto\Entity;

/**
 * Represents a single Photo
 *
 * @author Ahmet Akbana - ahmetakbana@gmail.com
 */
class Photo
{
	
	/**
	 * @var photoName
	 */
	 private $photoName;
	 
	 
	 /**
	  * @var photoPath
	  */
	 private $photoPath;
	  
	  
	 /**
	  * Returns Photo name 
	  *
	  * @return String photoName
	  */
	 public function getPhotoName()
	 {
	   return $this->photoName;
	 }
	 
	 
	 /**
	  * Set Photo name 
	  *
	  * @param $photoName
	  */
	 public function setPhotoName($photoName)
	 {
	 	$this->photoName = $photoName;
	 }
	 
	 
	 /**
	  * Returns Photo path 
	  *
	  * @return String photoPath
	  */
	 public function getPhotoPath()
	 {
	 	return $this->photoPath;
	 }
	  
	  
	 /**
	  * Sets Photo path 
	  *
	  * @param $photoPath
	  */
	 public function setPhotoPath($photoPath)
	 {
	 	$this->photoPath = $photoPath;
	 }
	  
}

