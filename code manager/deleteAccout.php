<?php
 require_once '../connection.php';
    $id = $_GET['deleteid'];
    $sql ="DELETE FROM `user` WHERE id='$id'";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array());
    
        $count = $stmt->rowCount();
    
        if ($count == 1) {
            echo  'Xóa thành công';
            header("location:./manager-account.php");
        }else {
            die;
        }
    
    
    }
    catch(PDOException $ex){
        die ;
    }
?>