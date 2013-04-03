<?php

class scaptcha {

	public static function create_image() 
	{ 
		//Let's generate a totally random string using md5 
		//$md5_hash = rand(0,99999);
		//We don't need a 32 character long string so we trim it down to 5 
		$security_code = rand(11111,99999);

		//Set the session to store the security code
		//$_SESSION["security_code"] = $security_code;
		Session::put('security_code', $security_code);

		//Set the image width and height 
		$im = imagecreate(60, 25);
		
		//white background and blue text
		$bg = imagecolorallocate($im, 248, 230, 230);
		$textcolor = imagecolorallocate($im, 128, 0, 0);
	   
		//Add randomly generated string in white to the image
		ImageString($im, 5, 10, 4, $security_code, $textcolor);
	   
		//Tell the browser what kind of file is come in 
		header("Content-Type: image/jpeg"); 

		//Output the newly created image in jpeg format 
		ImageJpeg($im); 
		
		//Free up resources
		ImageDestroy($im); 
	}
}