<?php
    // SELECT * FROM `phong` WHERE maphong=20
    require_once 'connection.php';  
    $id=$_GET['room'];
    $sql = "SELECT * FROM `phong` WHERE maphong='$id'";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
    }catch(PDOException $ex){
        die;
    }

    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
       $id=$row["maphong"];
       $image = $row["image"];
       $price=$row["gia"];
       $price_update=number_format($price,0,",",".");
       $name=$row["name"];
       $trangthai=$row["trangthai"];
       $songuoi=$row["songuoi"];
       $loaiphong=$row["loaiphong"];
       $mota=$row["mota"];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/bootstrap.css">
    <link rel="stylesheet" href="detail_room.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/detail_room.css">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <form action="cart.php?idroom=<?php echo $id;?>" method="post">
                
                <image class="img" src="<?php echo $image;?>">
                <div class="text">
                
                    <div class="infor">
                    <div class="infor-item">
                            <p class="name">ID :</p>
                            <p><?php echo $id;?></p>
                        </div>
                        <div class="infor-item">
                            <p class="name">Name room :</p>
                            <p><?php echo $name;?></p>
                        </div>

                        <div class="infor-item">
                            <p class="price">Price :</p>
                            <p><?php echo $price_update;?>  VND</p>
                        </div>

                        <div class="infor-item">
                            <p class="status">Status :</p>
                            <p><?php echo $trangthai;?></p>
                        </div>

                        <div class="infor-item">
                            <p class="people">People :</p>
                            <p><?php echo $songuoi;?></p>
                        </div>

                        <div class="infor-item">
                            <p class="category-room">Category-room :</p>
                            <p><?php echo $loaiphong;?></p>
                        </div>
                    </div>

                    <p class="description"><?php echo $mota;?></p>
                </div>
            
        
                <input type="submit" name="datphong" class="button-add" value="Thêm vào giỏ hàng"></input>
            </form>
    </div>

</body>

</html>