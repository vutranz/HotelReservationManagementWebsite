<?php
  session_start();
  require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart (4 items)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FormLogin.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">


        <div class="col-lg-12">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active w-100">
                <img class="d-block img-fluid w-100" src="https://d2ile4x3f22snf.cloudfront.net/wp-content/uploads/sites/174/2017/08/10060013/Deluxe-3091.jpg" alt="First slide">
              </div>
              <div class="carousel-item w-100">
                <img class="d-block img-fluid w-100" src="https://dyf.vn/wp-content/uploads/2021/11/thiet-ke-noi-that-phong-khach-san-hien-dai.jpg" alt="Second slide">
              </div>
              <div class="carousel-item w-100">
                <img class="d-block img-fluid w-100" src="https://www.hotelgrandsaigon.com/wp-content/uploads/sites/227/2017/12/GRAND_PDLK_01.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="w-100">
          <h1 class="my-4">Room Category</h1>
          <div class="list-group">
            <a href="roomthuong.php" class="list-group-item a">Phòng bình thường</a>
            <a href="roomvip.php" class="list-group-item a">Phòng VIP</a>
            <a href="roomdacbiet.php" class="list-group-item a">Phòng đặc biệt</a>
          </div>
        </div>

        <!-- Begin: Search -->
        <form action="" method="POST">
                  <div class="input-search">

          <div class="form-group">
            <label for="checkin">Check In</label>
            <input type="date" name="checkin" id="">
          </div>

          <div class="form-group">
            <label for="checkout">Check Out</label>
            <input type="date" name="checkout" id="">
          </div>
            
          <div class="form-group">
            <label for="people">People</label>
            <input type="number" name="people" id="">
          </div>

          <input type="submit" value="Search">
          </div>

        </form>
       

        <!-- End: Search -->

          <div class="row">
          <?php
              
             $sql = "SELECT * FROM phong where loaiphong='VIP' and loaiphong='VIP'";

             try{
                 $stmt = $conn->prepare($sql);
                 $stmt->execute(); 
             }catch(PDOException $ex){
                 die;
             }
     
             while($row=$stmt->fetch(PDO::FETCH_ASSOC))
             {
                $id = $row["maphong"];
                $name = $row["name"];
                $loaiphong = $row["loaiphong"];
                $price = $row["gia"];
                $price_update=number_format($price,0,",",".");
                $mota = $row["mota"];
                $songuoi = $row["songuoi"];
                $image = $row["image"];
                $trangthai=$row["trangthai"];

                echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
                echo "<div class=\"card h-100\">";
                echo "<a href=\"#\"><img class=\"card-img-top img-hand\" src=\"$image\" ></a>";
                echo "<div class=\"card-body\">";
                echo "<h4 class=\"card-title\">";
                echo "<a href=\"#\"> $name</a>";
                echo "</h4>";
                echo "<h5 style=\"color: #f47442\">Giá: $price_update VND</h5>";
                echo "<p class=\"card-text\">$mota</p>";
                echo "<p class=\"card-text\">Loại phòng: $loaiphong</p>";
                echo "<p class=\"card-text\">Số người: $songuoi</p>";
                echo "<p class=\"card-text\">Trạng Thái: $trangthai</p>";
                echo "<small class=\"text-muted\">&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
                echo "</div>";
                echo "<div class=\"card-footer\">";
                echo "<a href=\"detail_room.php?room=$id\" class=\"btn btn-primary\">Add to cart</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
             }
          ?>
           
            
           

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
