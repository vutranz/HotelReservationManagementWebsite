<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./mannager-history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary-color: #27c7df;
    --primary-color2: #0074a2;
    --background-blue: #d9edf7;
    --background-black: #262729;
}

.clear::after {
    content: "";
    display: block;
    clear: both;
}

h2 {
    text-align: center;
    margin-top: 30px;
    font-size: 40px;
    text-transform: uppercase;
}

a {
    text-decoration: none;
}

/* Begin: header */
header {
    background-color: var(--background-black) ;
    width: 100%;
    height: 80px;
    display: flex;
}

.headerBox {
    width: 1200px;
    margin: auto;
    display: flex;
    color: #fff;
}

.headerBox__logo{
    display: flex;
    margin-right: auto;
    align-items: center;
    
}

.logo {
    width: 60px;
    background-color: #fff;
    border-radius: 50%;
    
}

.nameHotel {
    margin-left: 10px;
    font-weight: 600; 
}

.nameHotel span {
    color: var(--primary-color); 
}

.headerCtrl {
    display: flex;
    align-items: center;
    position: relative;
}

.headerCtrl > a{
    margin-left:20px;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    margin-right: 5px;
}

.headerCtrl > a:hover {
    color: var(--primary-color);
}

.logout {
    margin-left: 50px;
}

.logout:hover {
    color: var(--primary-color);
    cursor: pointer;
}

/* End: header */

/* Begin: Category */
.icon-menu {
    align-self: center;
    margin-right: 30px;
    font-size: 25px;
}

.icon-menu:hover {
    color: #ddd;
    cursor: pointer;
}

.category {
    position: fixed;
    background-color: var(--background-black);
    color: #fff;
    left: 0;
    padding: 10px 20px 20px 20px;
    transform: translateX(-100%);
    transition: 0.2s;
}

.icon-left {
    display: inline-block;
    margin-left: 30px;
    font-size: 40px;
}

.icon-left:hover {
    color: #ccc;
}

.admin-status {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    padding: 10px 20px;
}

.icon-person {
    color: var(--background-black);
    background-color: #fff;
    padding: 20px;
    border-radius: 50%;
    font-size: 25px;
}

.status {
    margin-left: 20px;
    margin-top:5px;
    margin-right: auto;
}

.icon-status {
    color: green;
    margin-top: 10px;
    font-size: 13px;
}

.icon-status span {
    font-family: Arial, Helvetica, sans-serif;
    color: #fff;
    margin-left: 10px;
    font-size: 15px;
}

.category > a {
    display: block;
    color: #fff;
    padding: 10px 20px;
    border-left: 4px solid var(--background-black);
    transition: 0.15s;
}

.category > a:hover {
    color: var(--primary-color);
    border-left: 4px solid var(--primary-color);
}

/* Add item */
.add {
    display: inline-block;
    margin-top: 30px;
    padding: 10px 20px;
    background-color: rgb(3, 155, 3);    
    color: #fff;
    margin-left: 50px;
    border-radius: 3px;
}


.add:hover {
    background-color: rgb(7, 126, 7);
}
/* Begin: render */

.render {
    margin: 50px;
}

table, th, td {
    border: 1px solid #ccc;
    border-collapse: collapse;
    text-align: center;
}
.render table {
    width: 100%;
}



th, td,tr {
    word-wrap:break-word;
}

th {
    font-size: 18px;
    line-height: 30px;
}

td { 
    font-size: 16px;
}

.id, .name-acc, .last-name, .first-name , .birth-day , .sex, .age, .hand {
    height: 100px;
}


.hand {
    
    text-align: center;

}

.edit > i {
    display: inline-block;
    font-size: 20px;
    color: #999;
    position: relative;
    
    padding: 0px 5px;
}

.delete > i {
    display: inline-block;
    font-size: 20px;
    color: #999;
    padding: 0px 5px;
}

.edit, .delete {
    color: var(--primary-color);
    padding: 0px 5px;
    font-weight: 500;
}

.edit:hover i, .edit:hover {
    color: green
}

.delete:hover , .delete:hover i {
    color: rgb(182, 11, 11);
}

/* End: render */

/* End: Category */
    </style>
</head>

<body>
    <div class="main">

        <!-- Begin: Header -->
        <header>
            <div class="headerBox">
                <i class="fa-solid fa-bars icon-menu"></i>
                <div class="headerBox__logo">
                    <a href="index.php"><img
                            src="https://images.squarespace-cdn.com/content/v1/5a297d3dfe54eff9efa967c0/1513717270167-MOBLZQOP1MY8Z6M77L33/Logo_blue.png?format=300w"
                            class="logo"></img></a>
                    <p class="nameHotel">Hotel <span>BlueSky</span></p>
                </div>

                <div class="headerCtrl">
                    <p class="userLogin">
                        <i class="fa-regular fa-user" style="margin-right: 5px"></i>
                        <?php echo $_SESSION['username'];?>
                    </p>
                    <a href="logout.php " class="logout">Đăng xuất</a>
                </div>
            </div>
        </header>
        <!-- End: Header -->

        <!-- Begin: Caterogy -->
        <div class="category">
            
            <div class="admin-status">
                <i class="fa-solid fa-user-large icon-person"></i>
                <div class="status">
                    <div class="status__name"><?php echo $_SESSION['username'];?></div>
                    <i class="fa-sharp fa-solid fa-circle icon-status">                          
                        <span class="">Online</span></i>
                </div>
                <i class="fa-solid fa-arrow-left icon-left"></i>
            </div>
            <!-- main category -->
            
        </div>
        <!-- End: Caterogy -->

        <!-- Add item -->
        <!-- <a href="" class="add">Thêm phòng</a> -->

        <!-- title web -->
        <h2>quản lý lịch sử đặt phòng</h2>

        <!-- Begin: render -->
        <div class="render">
            <table>
                <tr>
                    <th class="l-id">STT</th>
                    <th class="l-name-acc">Tên tài khoản đặt phòng</th>
                    <th class="l-option">Loại phòng</th>
                    <th class="l-people">Số người</th>
                    <th class="l-price">Giá tiền(VNĐ)</th>
                    <th class="l-checkIn">Ngày nhận phòng</th>
                    <th class="l-checkOut">Ngày trả phòng</th>
                    <!-- <th class="l-hand">tùy chỉnh</th> -->
                </tr>
                <?php
                
                    $account=$_SESSION['username'];
                    require_once 'connection.php';
                    //SELECT * FROM `oder_room` WHERE taikhoan='vu'
                     $sql = "SELECT * FROM `oder_room` WHERE taikhoan='$account'";
                    
                     try {
                     $stmt = $conn->prepare($sql);
                     $stmt->execute();
                     } catch (PDOException $ex) {
                         die;
                     }
                     $i=0;
                     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $i++;
                        $id = $row["id"];
                         $taikhoan = $row["taikhoan"];
                         $loaiphong = $row["loaiphong"];
                         $price = $row["price"];
                         $price_update=number_format($price,0,",",".");
                         $ngayden = $row["ngayden"];
                         $ngaydi = $row["ngaydi"];

                        echo "<tr>";
                        echo "<td class=\"id\">";
                        echo "<p>$i</p>"; 
                        echo "</td>";
                        echo "<td class=\"name-acc\">";
                        echo "<p>$taikhoan</p>";
                        echo "</td>";
                        echo "<td class=\"option\">";
                        echo "<p>$loaiphong</p>";
                        echo "</td>";
                        echo "<td class=\"people\">";
                        echo "<p>2</p>";
                        echo "</td>";
                        echo "<td class=\"price\">";
                        echo "<p>$price_update VND</p>";
                        echo "</td>";
                    
                        echo "<td class=\"checkIn\">";
                        echo "<p>$ngayden</p>";
                        echo "</td>";
                        echo "<td class=\"checkOut\">";
                        echo "<p>$ngaydi</p>";
                        echo "</td>";

                //     <td class="hand">
                //         <a href="" class="edit">
                //             <i class="fa-solid fa-pen-to-square"></i>
                //             Sửa
                //         </a>
                //         <a href="" class="delete">
                //             <i class="fa-solid fa-trash"></i>
                //             Xóa
                //         </a>
                //     </td>
                    echo "</tr>";
                     }
                ?>
                <!-- data -->

                <!-- <tr>
                    <td class="id">
                        <p>1</p> 
                    </td>
                    <td class="name-acc">
                        <p>username</p>
                    </td>
                    <td class="option">
                        <p>Vip</p>
                    </td>
                    <td class="people">
                        <p>2</p>
                    </td>
                    <td class="price">
                        <p>99999</p>
                    </td>
                    
                    <td class="checkIn">
                        <p>20/12/2022</p>
                    </td>
                    <td class="checkOut">
                        <p>24/12/2022</p>
                    </td>

                    <td class="hand">
                        <a href="" class="edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Sửa
                        </a>
                        <a href="" class="delete">
                            <i class="fa-solid fa-trash"></i>
                            Xóa
                        </a>
                    </td>
                </tr> -->
            </table>
        </div>
        <!-- End: render -->
    </div>

    <script>
        var icon = document.querySelector(".icon-menu")
        var menu = document.querySelector(".category")
        var noneLeft = document.querySelector(".icon-left")

        icon.onclick = function() {
            menu.style.transform = "translateX(0)" 
        }

        noneLeft.onclick = function (e) {
            menu.style.transform = "translateX(-100%)"
        }
    </script>
</body>

</html>