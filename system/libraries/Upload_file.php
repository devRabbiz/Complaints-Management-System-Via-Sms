<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class CI_Upload_file
		{

//If you face any errors, increase values of "post_max_size", "upload_max_filesize" and "memory_limit" as required in php.ini
function file_upload($image_name,$folder_name){
 //Some Settings
$ThumbSquareSize 		= 310; //Thumbnail will be 200x200
$BigImageMaxSize 		= 500; //Image Maximum height or width
$DestinationDirectoryThumb			= "./uploads/".$folder_name."/small/"; //Normal thumb Prefix
$DestinationDirectory	= './uploads/'.$folder_name.'/big/'; //Upload Directory ends with / (slash)
$Quality 				= 70;

	          
//ini_set('memory_limit', '-1'); // maximum memory!

foreach($_FILES as $key => $file)
{
// some information about image we need later.
$ImageName 		= $file['name'];
$ImageSize 		= $file['size'];
$TempSrc	 	= $file['tmp_name'];
$ImageType	 	= $file['type'];



if (is_array($ImageName)) 
{
	$c = count($ImageName);
	

	
	for ($i=0; $i < $c; $i++)
	{
		$processImage			= true;	

			//========= put image id from data base=====================
		 
		 // your image name is over there change rand
		$RandomNumber	=    $image_name[$i];// rand(0, 9999999999);  // We need same random name for both files.
		

		if(!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i]))
		{
			return '<div class="error">Error occurred while trying to process <strong>'.$ImageName[$i].'</strong>, may be file too big!</div>'; //output error
		}
		else
		{
			//Validate file + create image from uploaded file.
			switch(strtolower($ImageType[$i]))
			{
				case 'image/png':
					$CreatedImage = imagecreatefrompng($TempSrc[$i]);
					break;
				case 'image/gif':
					$CreatedImage = imagecreatefromgif($TempSrc[$i]);
					break;
				case 'image/jpeg':
				case 'image/pjpeg':
					$CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
					break;
				default:
					$processImage = false; //image format is not supported!
			}
			//get Image Size
			//===========Get height & width of orignal image size===============
			list($CurWidth,$CurHeight)=getimagesize($TempSrc[$i]);



			//Get file extension from Image name, this will be re-added after random name
			$ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
			$ImageExt = str_replace('.','',$ImageExt);
	
			//Construct a new image name (with random number added) for our new image.
			$NewImageName = $RandomNumber;//.'.'.$ImageExt; //"png";

			//Set the Destination Image path with Random Name
			$thumb_DestRandImageName 	= $DestinationDirectoryThumb.$NewImageName; //Thumb name
			$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image

			//Resize image to our Specified Size by calling resizeImage function.
			if($processImage && $this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType[$i]))
			{
				//Create a square Thumbnail right after, this time we are using cropImage() function
				if(!$this->resizeImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType[$i]))
					{
						echo 'Error Creating thumbnail';
					}
					/*
					At this point we have succesfully resized and created thumbnail image
					We can render image to user's browser or store information in the database
					For demo, we are going to output results on browser.
					*/
					// $objPhoto->setPhotoImage($NewImageName);
                //$objPhoto->setPhotoId("1");
               
                 
			//	echo "Record has been successfully updated";
				 $check= "1";
					//Get New Image Size
					list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
					
					
					//echo '<li width="200" height="200" align="center"><img src="upload/photos/thumbnail/'.$NewImageName.'" alt="Thumbnail" height="100" width="100"></li>';
					
					/*
					// Insert info into database table!
					mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
					VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
					*/

			}else{
				echo '<li class="error">Error occurred while trying to process <strong>'.$ImageName[$i].'</strong>! Please check if file is supported</li>'; //output error
			}
			
		}
		
	}
	//echo '</ul>';

	}
}
if($check >0){

	return $check;
	}

}



// This function will proportionally resize image 
function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//Construct a proportional size of new image
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	
	if($CurWidth < $NewWidth || $CurHeight < $NewHeight)
	{
		$NewWidth = $CurWidth;
		$NewHeight = $CurHeight;
	}
	$NewCanves 	= imagecreatetruecolor($NewWidth, $NewHeight);
	// Resize Image
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	if(is_resource($NewCanves)) { 
      imagedestroy($NewCanves); 
    } 
	return true;
	}

}

//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	if(is_resource($NewCanves)) { 
      imagedestroy($NewCanves); 
    } 
	return true;

	}
	  
}

}
?>