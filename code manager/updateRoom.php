<?php
    require_once '../connection.php';
    $id=$_POST['idroom'];
    $tenphong = $_POST['tenphong'];
    $songuoi = $_POST['songuoi'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $trangthai = $_POST['trangthai'];
    $loaiphong = $_POST['loaiphong'];
    $mota = $_POST['mota'];
    
    $sql="UPDATE `phong` SET `loaiphong`='$loaiphong',`gia`='$price',`mota`='$mota',
    `songuoi`='$songuoi',`image`='$image',`trangthai`='$trangthai',`name`='$tenphong' WHERE maphong='$id'";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count ==1) {
            
            header("location:./index.php");
        }else {
            echo "lỗi";
            die;
        }
        }
        

    
    catch(PDOException $ex){
        die ;
    }


?>