<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once(__DIR__ . '/../settings/core.php');

include_once(__DIR__ . '/../controllers/general_controller.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $full_Name = trim($_POST['full_Name']);
    $phone = trim($_POST['Customer_Contact']);
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);
    $country = trim($_POST['Customer_Country']);
    $city = trim($_POST['Customer_City']);
    $user_role = 1;

    
    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $target_dir = "../img/user_profile";
        $file = $_FILES["Customer_Image"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];
    	$RandomNum   = time();
        $ImageName      = str_replace(' ','-',strtolower($file['name'][0]));
        $ImageType      = $file['type'][0];
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt=str_replace('.','',$ImageExt);
        $ImageName=preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
	    $ret[$NewImageName]= $target_dir.$NewImageName;

            // Handle file upload for customer image
        $target_file = $target_dir ."/". $NewImageName;
        move_uploaded_file($fileTmpName[0],$target_dir."/".$NewImageName );

        if ($fileError === 0){
            add_user_ctr($full_Name, $email, $password, $country, $city, $phone, $target_file, $user_role);
            header('Location: ../index.php');
        } else {
            echo "Error Uploading the Image";
        }
    }


}
?>
