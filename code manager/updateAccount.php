<?php
 require_once '../connection.php';


if (!isset($_POST['id']) || !isset($_POST['username']) 
|| !isset($_POST['password']) || !isset($_POST['hoten']) 
|| !isset($_POST['sex']) || !isset($_POST['age']) 
|| !isset($_POST['diachi'])) {
    die;
}

    $account_id = $_POST['id'];
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hoten = $_POST['hoten'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $diachi = $_POST['diachi'];

    $sql = "UPDATE `user` SET `username`='$username',`password`='$password',`name`='$hoten',
    `age`='$age',`sex`='$sex',`diachi`='$diachi' WHERE id='$account_id'";
   
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count ==1) {
            
            header("location:./manager-account.php");
        }else {
            echo "lỗi";
            die;
        }

    }
    catch(PDOException $ex){
        die ;
    }



?>