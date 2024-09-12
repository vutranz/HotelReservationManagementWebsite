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
    <link rel="stylesheet" href="./report.css">
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
                        
                        <p><?php echo $_SESSION['username'];?></p>
                    </p>
                    <a href="../logout.php" class="logout">Đăng xuất</a>
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
            <a href="index.php" class="manager-room">Quản lý phòng</a>
            <a href="manager-account.php" class="manager-account">Quản lý tài khoản</a>
            <a href="report.php" class="statistical">Thống kê</a>
            <a href="manager-history.php" class="history-booking">Lịch sử đặt phòng</a>
        </div>
        <!-- End: Caterogy -->

        <!-- Add item -->
        <!-- <a href="" class="add">Thêm phòng</a> -->

        <!-- title web -->
        <h2>Báo cáo doanh thu</h2>

        <!-- Begin: render -->
        <div class="render">
            <table>
                <tr>
                    <th class="l-stt">STT</th>
                    <th class="l-id">Tên tài khoản</th>
                    <th class="l-name">Tên phòng</th>
                    <th class="l-option">Loại phòng</th>
                    <th class="l-price">Giá tiền(bao gồm dịch vụ)</th>
                    
                    
                    
                </tr>

                <!-- data -->
            <?php
                require_once '../connection.php';
                $sql1 = "SELECT SUM(price) FROM `oder_room`";
                $sql = "SELECT * FROM `oder_room`";
                    
                try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                } catch (PDOException $ex) {
                    die;
                }
                $i=0;
                $total=0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $i++;
                    $id = $row["id"];
                    $name=$row['name'];
                    $taikhoan = $row["taikhoan"];
                    $loaiphong = $row["loaiphong"];
                    $price = $row["price"];
                    $ngayden = $row["ngayden"];
                    $ngaydi = $row["ngaydi"];
                    $total=$total+$price;
                    $price_update=number_format($price,0,",",".");
                    echo "<tr>";
                    echo "<td class=\"stt\">$i</td>";
                    echo "<td class=\"id\">";
                    echo "<p>$taikhoan</p>"; 
                    echo "</td>";
                    echo "<td class=\"name\">";
                    echo "<p>$name</p>";
                    echo "</td>";
                    echo "<td class=\"option\">";
                    echo "<p>$loaiphong</p>";
                    echo "</td>";
                    
                    echo "<td class=\"price\">";
                    echo "<p>$price_update</p>";
                    echo "</td>";

                    echo "</tr>";
                }
            ?>
                

                <!-- <tr>
                    <td class="stt">1</td>
                    <td class="id">
                        <p>1</p> 
                    </td>
                    <td class="name">
                        <p>l</p>
                    </td>
                    <td class="option">
                        <p>Nguyen Minh Nghia</p>
                    </td>
                    
                    <td class="price">
                        <p>20/08/2002</p>
                    </td>

                </tr> -->
            </table>
        </div>
        <!-- End: render -->
        
        <!-- Begin: total -->
        <div class="total">
            <p class="label">Total  : </p>
            <p class="cost"><?php $price_update=number_format($total,0,",","."); echo$price_update;?>VND</p> 
        </div>
        <!-- End: total -->
    </div>

    <script>
        var icon = document.querySelector(".icon-menu")
        var menu = document.querySelector(".category")
        var noneLeft = document.querySelector(".icon-left")

        //event category
        icon.onclick = function() {
            menu.style.transform = "translateX(0)" 
        }

        noneLeft.onclick = function (e) {
            menu.style.transform = "translateX(-100%)"
        }

        

    </script>
</body>

</html>