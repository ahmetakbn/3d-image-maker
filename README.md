# Create 3D Photo
Creates 3D photos from two 2D photos. There must be two 2D photos for making the 3d photo.

# How to take 2D photos
Take two photos of the same scene, moving the camera at least 2 inches horizontally. It's not critical that you make the boundaries exactly match, but it is critical for many shots that both photos are close to perfectly horizontal. It would be a good idea to use a tripod with a level.
Name your files "right" and "left" for easy distinction.

For more information please go http://en.wikipedia.org/wiki/Anaglyph_3D

# Installation

#### By cloning project

Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
	"require": {
		"ahmetakbn/create3dphoto": "1.0.0"
	},
	"repositories": [
	    {
		"type": "package",
		"package": {
		    "name": "ahmetakbn/create3dphoto",
		    "version": "1.0.0",
		    "source": {
		        "url": "git://github.com/ahmetakbn/create3dphoto.git",
		        "type": "git",
		        "reference": "master"
		    },
		    "autoload": {
		        "psr-0" : {
		            "Create3DPhoto\\" : "src"
		        }
		    }
		}
	    }
	],
    ```

2. Now tell composer to download by running the command:

    ```bash
    $ php composer.phar update
    ```

# Test

Example Client code for Create3DPhoto

  ```php
  
  require __DIR__ . '/vendor/autoload.php';

  use Create3DPhoto\Entity\Photo;
  use Create3DPhoto\Service\CreatePhotoService;
  
  Class Client
  {
  	private $photosVal = array();
  	
  	public function __construct(Array $photosVal)
  	{
  		$this->photosVal = $photosVal;
  	}
  	
  	public function create()
  	{		
  		$leftPhoto = new Photo();
  		$leftPhoto->setPhotoPath($this->photosVal['uploadPath']);
  		$leftPhoto->setPhotoName($this->photosVal['leftPhoto']);
  		
  		$rightPhoto = new Photo();
  		$rightPhoto->setPhotoPath($this->photosVal['uploadPath']);
  		$rightPhoto->setPhotoName($this->photosVal['rightPhoto']);
  		
  		$crPhoto = new Photo();
  		$crPhoto->setPhotoPath($this->photosVal['uploadPath']);
  		$crPhoto->setPhotoName($this->photosVal['crPhoto']);
  		
  		$createPhotoService = new CreatePhotoService($leftPhoto, $rightPhoto, $crPhoto);
  		$create = $createPhotoService->create();
  		
  		if($create){
  			echo 'Successful';
  		}else{
  			echo 'Failed!';
  		}
  	}
  }
  
  $photosVal = array(
  	'uploadPath' => 'uploads',
  	'leftPhoto' => 'mushrooms_l.jpg',
  	'rightPhoto' => 'mushrooms_r.jpg',
  	'crPhoto' => 'mushrooms_3d.jpg'
  );
  
  $client = new Client($photosVal);
  $client->create();
  
  ```

# Live Site
Please visit http://www.create3dphoto.com to see how it works
