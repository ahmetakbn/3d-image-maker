<?php
//if Developer mode
error_reporting(E_ALL);
ini_set('display_errors', 1);
//endif

include_once('class.make3dimage.php');

$imageMaker = new Make3dImage();

$imageMaker->setUploadPath('uploads');
$imageMaker->setLeftImage('uploads/mushrooms_l.jpg');
$imageMaker->setRightImage('uploads/mushrooms_r.jpg');
$imageMaker->set3dImageName('mushrooms_3d.jpg');

$result = $imageMaker->make3dImage();


if($result){
	echo "Congrats! You have a 3D image..";
}else{
	echo "Failed!";
}


