<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once(__DIR__ . '/../controllers/general_controller.php');

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize the POST data to prevent XSS or SQL Injection
    // $cat_name = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_STRING);


    //image upload


    $product_cat = $_POST["productCategory"];
    $product_brand = $_POST["productBrand"];
    $product_title = $_POST["productName"];
    $product_price = $_POST["productPrice"];
    $product_description = $_POST["productDescription"];
    
    $product_keywords = $_POST["productKeyWords"];
      
    if(isset($_POST["submit"])) {
        $target_dir = "../img/uploads";
        $file = $_FILES["image"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"][0];
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
        add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$NewImageName,$product_keywords);
       header('Location: ../index.php');
    } else {
        echo "Error Uploading the Image";
    }
}


}
?>
