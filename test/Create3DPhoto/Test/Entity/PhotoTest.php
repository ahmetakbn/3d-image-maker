<?php

namespace Create3DPhoto\Test\Entity;

use Create3DPhoto\Entity\Photo;

/**
 * Tests Create3DPhoto\Entity Photo
 * 
 * @author Ahmet Akbana - ahmetakbana@gmail.com
 */
class PhotoTest extends \PHPUnit_Framework_TestCase
{
	public function testPhotoInitialState()
	{
		$photo = new Photo();
        $this->assertNull(
            $photo->getPhotoName(),
            '"photoName" should initially be null'
        );
        $this->assertNull(
            $photo->getPhotoPath(),
            '"photoPath" should initially be null'
        );
	}
}
