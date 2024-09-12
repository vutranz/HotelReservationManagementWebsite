<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./edit-room.css">
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="main">
        <!-- Begin: Header -->
        <header>
            <div class="headerBox">
                <i class="fa-solid fa-bars icon-menu"></i>
                <div class="headerBox__logo">
                    <a href="../index.php"><img
                            src="https://images.squarespace-cdn.com/content/v1/5a297d3dfe54eff9efa967c0/1513717270167-MOBLZQOP1MY8Z6M77L33/Logo_blue.png?format=300w"
                            class="logo"></img></a>
                    <p class="nameHotel">Hotel <span>BlueSky</span></p>
                </div>

                <div class="headerCtrl">
                    <p class="userLogin">
                        <i class="fa-regular fa-user" style="margin-right: 5px"></i>
                        Nguyen Minh Nghia
                        <p>(admin)</p>
                    </p>
                    <div class="logout">Đăng xuất</div>
                </div>
            </div>
        </header>
        <!-- End: Header -->

        <!-- Begin: Caterogy -->
        <div class="category">

            <div class="admin-status">
                <i class="fa-solid fa-user-large icon-person"></i>
                <div class="status">
                    <div class="status__name">Nguyen Minh Nghia</div>
                    <i class="fa-sharp fa-solid fa-circle icon-status">
                        <span class="">Online</span></i>
                </div>
                <i class="fa-solid fa-arrow-left icon-left"></i>
            </div>
            <!-- main category -->
            <a href="" class="manager-room">Quản lý phòng</a>
            <a href="" class="manager-account">Quản lý tài khoản</a>
            <a href="" class="statistical">Thống kê</a>
            <a href="" class="history-booking">Lịch sử đặt phòng</a>
        </div>
        <!-- End: Caterogy -->

        <!-- Begin: add item -->
        <div class="container">
        <?php
            require_once '../connection.php';
            $id = $_GET['idaccount'];
            $sql = "SELECT * FROM user where id='$id'";

                     try {
                     $stmt = $conn->prepare($sql);
                     $stmt->execute();
                     } catch (PDOException $ex) {
                         die;
                     }
 
                     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $iduser = $row["id"];
                        $username = $row["username"];
                        $password = $row["password"];
                        $name = $row["name"];
                        $age = $row["age"];
                        $sex = $row["sex"];
                        $diachi = $row["diachi"];
                         
                       
                     }
        ?>
            <form action="updateAccount.php" method="POST">
                <h3>Sửa thông tin tài khoản</h3>
                <div class="row">
                    
                    <input hidden type="text" id="id" name="id" value="<?php echo $iduser;?>" placeholder="ID tài khoản">
                  

                    <div class="form-group col-lg-6">
                        <label for="username">Tên tài khoản : </label> <br>
                        <input type="text" id="username" name ="username" value="<?php echo $username ;?>" placeholder="Tên tài khoản ">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="people">Mật khẩu: </label> <br>
                        <input type="text" id="people" name="password" value="<?php echo $password;?>" placeholder="Mật khẩu">
                    </div>



                    <div class="form-group col-lg-6">
                        <label for="img">Họ và Tên : </label> <br>
                        <input type="" id="img" name="hoten" value="<?php echo $name;?>" placeholder="Họ và Tên">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="status">Giới tính : </label><br>
                        
                        <input type="" id="img" name="sex" value="<?php echo $sex;?>" placeholder="Họ và Tên">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="img">Tuổi: </label> <br>
                        <input type="text" id="img" name="age" value="<?php echo $age;?>" placeholder="Tuổi">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="img">Địa chỉ: </label> <br>
                        <input type="" id="img" name="diachi"value="<?php echo $diachi;?>" placeholder="Địa chỉ">
                    </div>

                   

                    <input type="submit" value="Lưu" class="button-submit col-lg-2">
                </div>
            </form>
        </div>

        <!-- End: add item -->
    </div>
    <!-- Begin: Script -->
    <script>
        var icon = document.querySelector(".icon-menu")
        var menu = document.querySelector(".category")
        var noneLeft = document.querySelector(".icon-left")

        icon.onclick = function () {
            menu.style.transform = "translateX(0)"
        }

        noneLeft.onclick = function (e) {
            menu.style.transform = "translateX(-100%)"
        }
    </script>
    <!-- End: Script -->
</body>

</html>