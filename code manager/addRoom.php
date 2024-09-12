<?php
     require_once '../connection.php';
    // if (!isset($_POST['tenphong']) || !isset($_POST['songuoi']) 
    // || !isset($_POST['price']) || !isset($_POST['image'])
    // || !isset($_POST['trangthai']) || !isset($_POST['loaiphong']) || !isset($_POST['mota']))  
    // {
    //     die;
    // }
    
    $tenphong = $_POST['tenphong'];
    $songuoi = $_POST['songuoi'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $trangthai = $_POST['trangthai'];
    $loaiphong = $_POST['loaiphong'];
    $mota = $_POST['mota'];
//     echo $tenphong;
//     echo $songuoi;
//     echo $price;
//     echo $image;
//     echo $loaiphong;
//     echo $mota;
//    echo $trangthai;
   
    $sql="INSERT INTO `phong`(`loaiphong`, `gia`, `mota`, `songuoi`, `image`, `trangthai`, `name`) VALUES ('$loaiphong',
    '$price','$mota','$songuoi','$image','$trangthai','$tenphong')";
    

    try{
    
        if(empty($loaiphong) || empty($price) || empty($mota) 
        || empty($songuoi) || empty($image) || empty($trangthai) || empty($tenphong))
        {
            header("location:add-room.php?error=Không được để trống thông tin"); 
            exit(); 
        }
        else{
            
            $stmt = $conn->prepare($sql);
            $stmt->execute(array());
            header("location:./index.php"); 
            die();
        }
        
    }
    
    catch(PDOException $ex){
        echo $ex;
        die();
    }
?>