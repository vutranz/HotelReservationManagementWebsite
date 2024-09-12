<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>

    <style>

    </style>
    <div class="container">
        <h2>Giỏ hàng</h2>
        <?php
        require_once 'connection.php';

        $id = $_GET['idroom'];

        $sql = "SELECT * FROM `phong` WHERE maphong='$id'";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $ex) {
            die;
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["maphong"];
            $name = $row["name"];
            $loaiphong = $row["loaiphong"];
            $price = $row["gia"];
            $price_update = number_format($price, 0, ",", ".");
            $mota = $row["mota"];
            $songuoi = $row["songuoi"];
            $image = $row["image"];
            $trangthai = $row["trangthai"];
        }


        ?>
        <form action="oderrom.php" method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td colspan="7">
                            <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <th>Loại Phòng</th>
                        <th>Số người</th>
                        <th>Mô tả</th>
                        <th>Tên phòng</th>
                        <th>Trạng thái</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input hidden name="id" value="<?php echo "$id"; ?>"></input></td>
                        <td><input hidden name="image" value="<?php echo "$image"; ?>">
                            <image src="<?php echo $image; ?>" style="max-height: 100px">
                        </td>
                        <td> <input hidden name="loaiphong" value="<?php echo "$loaiphong"; ?>"><?php echo $loaiphong; ?></input></td>
                        <td> <input hidden name="songuoi" value="<?php echo "$songuoi"; ?>"><?php echo $songuoi; ?></input></td>
                        <td><input hidden name="mota" value="<?php echo "$mota"; ?>"><?php echo $mota; ?></input></td>
                        <td><input hidden name="name" value="<?php echo "$name"; ?>"><?php echo $name; ?></input></td>
                        <td><input hidden name="trangthai" value="<?php echo "$trangthai"; ?>"><?php echo $trangthai; ?></input></td>
                        

                    </tr>

                </tbody>
            </table>

            <div class="infor-self">

                <div class="form-group">
                    <label for="fullname">Tên :</label>
                    <input name="fullname" id="fullname" placeholder="Tên">
                </div>
    
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input name="phone" type="tel" id="phone" placeholder="Số điện thoại">
                </div>
    
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input name="diachi" id="address" placeholder="Địa chỉ của bạn">
                </div>
                
                <div class="form-group">
                    <label for="checkin">Ngày đến :</label>
                    <input type="date" name="ngayden" id="checkin" placeholder="Ngày đến">
                </div>
    
                <div class="form-group">
                    <label for="checkout">Ngày đi :</label>
                    <input type= "date" name="ngaydi" id="checkout" placeholder="Ngày đi">
                </div>
        
            </div>

           

            <div class="form-group-total">
                <label class="label">Thành tiền : </label>
                <input  hidden name="price_update" value="<?php echo $price; ?>"><?php echo $price_update; ?> VND</input>
            </div>
            <?php
                if(isset($_GET['error'])){?>
                    <p style="color:red;font-weight:600;font-size:20px" id="message"><?php echo $_GET['error'];?></p>
               
            <?php }?>
            <button type="submit" name="order_click" class=" btn-success">Thanh toán</button>
        </form>

    </div>
</body>

</html>