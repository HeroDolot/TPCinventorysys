<?php

include '../../connection.php';

$foldername = $_POST['foldername'];
$upload = $_POST['upload'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$quantity = $_POST['quantity'];
$label = $_POST['label'];
$descriptions = $_POST['descriptions'];
function get_size($size){
    $kb_size = $size / 1024;
    $format_size = number_format($kb_size, 2) . 'KB';
    return $format_size;
}

$path = '../../assets/images/' . $_POST['foldername'];
$size = get_size($_FILES['upload']['size']); 
// $sql = "SELECT * FROM products WHERE upload = '$upload'";
// if($size >= 5.00)

if(!file_exists($path)){
    mkdir($path, 0777, true);
}
$alert = "<script>alert('upload complete');";
$temp_file = $_FILES['upload']['tmp_name'];
$ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

if($temp_file != "") {
    // $newfilepath = $path ."/". $_FILES['upload']['name'];
    $newfilepath = date("YmdHis") . "." . $ext;
    
    if(move_uploaded_file($temp_file, $path ."/". $newfilepath)){
        $sql = "INSERT INTO carousel (foldername, names, ext, category, brand, quantity, label, descriptions) VALUES ('$foldername', '$newfilepath', 
        '$ext', '$category', '$brand', '$quantity', '$label', '$descriptions')";
        if (mysqli_query($conn, $sql)) {
            header('location: ../../pages/fileupload.php');
            echo $alert;
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    } else {
        echo "Upload error encountered: " . $_FILES['upload']['error'];
    }
}

mysqli_close($conn);
?>
