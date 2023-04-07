<?php

include '../../connection.php';

$foldername = $_POST['foldername'];
$product_code = $_POST['product_code'];
$upload = $_FILES['upload']['name'];
$category = $_POST['category'];
$ptype = $_POST['ptype'];
$brand_id = $_POST['brand'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$label = $_POST['label'];
$descriptions = $_POST['descriptions'];
function get_size($size){
    $kb_size = $size / 1024;
    $format_size = number_format($kb_size, 2) . 'KB';
    return $format_size;
}

$path = '../../assets/images/' . $_POST['foldername'];
$size = get_size($_FILES['upload']['size']); 

// $sql = "SELECT * FROM lists WHERE names = '$upload'";

// if($size >= 5.00)

if(!file_exists($path)){
    mkdir($path, 0777, true);
}

$alert = "<script>alert('upload complete');";

$temp_file = $_FILES['upload']['tmp_name'];
$ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

if($temp_file != "") {
    $newfilepath = date("YmdHis") . "." . $ext;
    
    if(move_uploaded_file($temp_file, $path ."/". $newfilepath)){
        $sql = "INSERT INTO lists (foldername, product_code ,names, ext, category, ptype,brand_id, price, quantity,label, descriptions)
         VALUES ('$foldername', '$product_code','$newfilepath', '$ext'
        , '$category', '$ptype', '$brand_id', '$price','$quantity', '$label', '$descriptions')";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        if (mysqli_query($conn, $sql)) {
            echo $alert;
            echo "alert('New record created successfully')";
            header('location: ../../pages/fileupload-items.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
