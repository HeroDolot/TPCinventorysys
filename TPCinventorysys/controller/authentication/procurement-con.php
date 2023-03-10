<?php
// V = VENDOR BOBO LAGI MO KINAKALIMUTAN HAHAHAHAHA
    include '../../connection.php';
    $refId = $_POST['refId'];
    $vemail = $_POST['vemail'];
    $vname = $_POST['vname'];
    $vaddress = $_POST['vaddress'];
    $vcperson = $_POST['vcperson'];
    $vphone = $_POST['vphone'];
    $product_code  = $_POST['product_code'];
    $item1 = $_POST['item1'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];

    // var_dump($product_code);

    
    for($i=0;$i<count($product_code);$i++){
        $sql = "INSERT INTO supplier (refId, vemail, vname, vaddress, vcperson, vphone, product_code, item1, quantity, unit_price, total_price) 
        VALUES ('$refId', '$vemail', '$vname', '$vaddress', '$vcperson', '$vphone', '$product_code[$i]', '$item1[$i]', '$quantity[$i]', '$unit_price[$i]', '$total_price[$i]')";
        $result = mysqli_query($conn,$sql);
        header('location: ../../pages/dashboard.php');
    } 
?>
