<?php

require_once '../connection.php';
$id= $_GET['iddelete'];
$sql ="DELETE FROM `phong` WHERE maphong='$id'";
try{
    $stmt = $conn->prepare($sql);
    $stmt->execute(array());
    
    $count = $stmt->rowCount();
    
    if ($count == 1) {
        echo  'Xóa thành công';
        header("location:./index.php");
    }else{
        die;
    }
    
    }
    catch(PDOException $ex){
        die ;
    }
?>