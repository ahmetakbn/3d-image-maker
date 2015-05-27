<?php

namespace Create3DPhoto\Test\Service;

use Create3DPhoto\Entity\Photo;
use Create3DPhoto\Service\CreatePhotoService;

/**
 * Tests Create3DPhoto\Service CreatePhotoService
 * 
 * @author Ahmet Akbana - ahmetakbana@gmail.com
 */
class CreatePhotoServiceTest extends \PHPUnit_Framework_TestCase
{
	/********
	 * Test method 1
	 * 
	 * -Create 2 new images
	 * -Send them to Create3DPhotoService to create 3D image
	 * -Test if it works
	 * -Delete all images
	 */
	 
	/*
	 * Test method 2
	 * -Send two image which is already exist to Create3DPhotoService
	 * -Test if it works
	 * -Delete only created image
	 */
	public function testCreate()
	{
		 $leftPhoto = new Photo();
		 $leftPhoto->setPhotoPath('uploads');
		 $leftPhoto->setPhotoName('mushrooms_l.jpg');
		 
		 $rightPhoto = new Photo();
		 $rightPhoto->setPhotoPath('uploads');
		 $rightPhoto->setPhotoName('mushrooms_r.jpg');
		 
		 $crPhoto = new Photo();
		 $crPhoto->setPhotoPath('uploads');
		 $crPhoto->setPhotoName('mushrooms_3d_test.jpg');
		 
		 $createPhotoService = new CreatePhotoService($leftPhoto,$rightPhoto,$crPhoto);
		 $this->assertTrue($createPhotoService->create());
		 if(file_exists($crPhoto->getPhotoPath().'/'.$crPhoto->getPhotoName())){
		 	unlink($crPhoto->getPhotoPath().'/'.$crPhoto->getPhotoName());
		 }
	}
}
