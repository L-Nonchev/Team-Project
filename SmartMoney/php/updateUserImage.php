<?php
function updateProfilImage ($user_id, $fileOnServer, $fileRealName){
	//get email form user
	require_once './db_connection.php';
	require_once './php/resizeImage.php';
	
	
	$mail = getEmail($user_id);

	$path = 'assets/users/'.$mail.'/image//'.$fileRealName;

	//MIME validation
	$mime =  mime_content_type($fileOnServer);
	$format = "image/jpeg";
	if ($mime === $format){
		// is uploadet all file ?
		if (is_uploaded_file($fileOnServer)){
			// is savet file in derictory
				
			if (move_uploaded_file($fileOnServer, $path)){

				// resize img

				//indicate which file to resize (can be any type jpg/png/gif/etc...)
				$file = $path;

				//indicate the path and name for the new resized file
				$resizedFile = $path;

				//call the function (when passing path to pic)
				smart_resize_image($file , null, 100 , 100 , false , $resizedFile , false , false ,100 );


				if (updateImage($user_id,$path)){
						
					return "File has been changed successfully ";
				}
			}else {
				return "The file is not successfully uploaded, please try again.";

			}
		}else {
			return "The file is not successfully uploaded, please try again.";
		}
	}else {
		return  "Please upload  image/jpeg format !";
	}
}

?>