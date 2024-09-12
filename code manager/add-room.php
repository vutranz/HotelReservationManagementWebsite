<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./add-room.css">
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
            <a href="index.php" class="manager-room">Quản lý phòng</a>
            <a href="manager-account" class="manager-account">Quản lý tài khoản</a>
            <a href="" class="statistical">Thống kê</a>
            <a href="" class="history-booking">Lịch sử đặt phòng</a>
        </div>
        <!-- End: Caterogy -->

        <!-- Begin: add item -->
        <div class="container">
            
            <form action="addRoom.php" method="POST">
                <h3>Thêm phòng mới</h3>
                <?php
                if(isset($_GET['error'])){?>
                    <p style="color:red;font-weight:600;font-size:20px" id="message"><?php echo $_GET['error'];?></p>
               
            <?php }?>
                <div class="row">
                    
                      
                        <input hidden type="text" id="id" placeholder="ID phòng">
                 
                    <!-- <div class="form-group col-lg-6">
                        <label for="name">Loại Phòng : </label> <br>
                        <input type="text" id="name" placeholder="Tên phòng">
                    </div> -->

                    <div class="form-group col-lg-6">
                        <label for="name">Tên phòng : </label> <br>
                        <input type="text" id="name" name="tenphong" placeholder="Tên phòng">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="people">Số người : </label> <br>
                        <input type="number" id="people" name="songuoi" placeholder="Số người">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="price">Giá : </label> <br>
                        <input type="text" id="price" name="price" placeholder="Giá">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="img">Ảnh : </label> <br>
                        <input type="text" id="img" name="image" placeholder="Link Ảnh">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="status">Trạng thái : </label>
                        <select id="status"  name="trangthai">
                            <option value="">--------</option>
                            <option value="available"  >available</option>
                            <option value="unvailable">unvailable</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="option">Loại phòng : </label> 
                        <select id="option" name="loaiphong">
                            <option value="">-----------</option>
                            <option value="VIP" >Vip</option>
                            <option value="THUONG" >Thường</option>
                            <option value="DACBIET">Đặc biệt</option>
                        </select>
                    </div>
                    <!-- <div class="form-group col-lg-6">
                        <label for="img">Ảnh : </label> <br>
                        <input type="text" id="img" placeholder="Link Ảnh">
                    </div> -->
                    <div class="form-group col-lg-12">
                        <label for="description">Mô tả phòng : </label> <br>
                        <textarea  id="description" name="mota" placeholder="Mô tả phòng"></textarea>
                    </div>
                        
                    </div>

                    

                    <input type="submit" value="Submit" class="button-submit col-lg-2">
                </div>
            </form>
        </div>

        <!-- End: add item -->
    </div>
    <!-- Begin: Script -->
    <script type="text/javascript">
        CKEDITOR.replace('description');
    </script>

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