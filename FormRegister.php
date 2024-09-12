<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>    
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            /* display center */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* backgroud */
            /* background-color: #1dd1a1; */
            background: url(https://images.pexels.com/photos/269138/pexels-photo-269138.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1) no-repeat top center / cover;
        }

        .form-login  {
            background-color: #fff;
            padding: 40px 50px;
            width: 400px;
            border-radius: 3px;
            width: 900px;
        }

        .form-name {
            font-size: 40px;
            font-weight: bold;
        }

        .form-name::before {
            content: "";
            display: inline-block;
            background-color: #1dd1a1;
            width: 15px;
            height: 34px;
            margin-bottom: -3px;
            margin-right: 10px;
            border-radius: 1px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
        }

        .form-group {
            padding-top: 25px;
            width: 48%;
        }

        .label {
            font-weight: 500;
        }

        input {
            width: 100%;
            margin-top: 10px;
            line-height: 45px;
            padding: 0px 10px;
        }

        #submit {
            width: 100%;
            border: unset;
            padding: 18px;
            background-color: #1dd1a1;
            margin-top: 40px;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            border-radius: 2px;
        }

        #submit:hover {
            background-color: #34daad;
        }

        /* #loading-register {
            float: right;
            font-size: 16px;
            margin-top: 20px;
            font-weight: 500;
        }

        #loading-register:hover {
            text-decoration: underline;
            cursor: pointer;
        } */
    </style>
    <script>
        var i = document.querySelector('#message')
        i.innerHTML=""
    </script>
</head>
<body>
    <div class="main">
        <form action="register.php" method="post" class="form-login">
            <p class="form-name">Đăng ký</p>
            <?php
                if(isset($_GET['error'])){?>
                    <p style="color:red;font-weight:600;font-size:20px" id="message"><?php echo $_GET['error'];?></p>
               
            <?php }?>
           
            <div class="row">

                <div class="form-group">
                    <label for="username" class="label">Username :</label> <br>
                    <input type="text"  id="username" name="username"  placeholder="Username"> 
                </div>
        
                <div class="form-group">
                    <label for="password" class="label">Password :</label> <br>
                    <input type="password"  id="password" name="password"  placeholder="Password"> 
                </div>
    
                <div class="form-group">
                    <label for="fullname" class="label">Name :</label> <br>
                    <input type="text"  id="name" name="fullname"  placeholder="Your fullname"> 
                </div>
    
                <div class="form-group">
                    <label for="age" class="label">Age :</label> <br>
                    <input type="number"  id="age" name="age"  placeholder="Age"> 
                </div>
    
                <div class="form-group">
                    <label for="gioitinh" class="label">Gender :</label> <br>
                    <input type="text"  id="sex" name="gioitinh"  placeholder="Gender(nam/nữ)"> 
                </div>
    
                <div class="form-group">
                    <label for="diachi" class="label">Address :</label> <br>
                    <input type="text"  id="sex" name="diachi"  placeholder="Your Address"> 
                </div>
        
                <button type="submit" id="submit">Đăng ký</button>
        
            </div>
            
        </form>
    </div>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="POST">
        Đăng Ký <br>
        Username:
        <input name="username"> <br>
        Password:
        <input name="password">
        <br>
        FullName:
        <input name="fullname">
        <br>
        age:
        <input name="age">
        <br>
        giới tính:
        <input name="gioitinh">
        <br>
        Địa chỉ:
        <input name="diachi">
        <br>
        <button style="submit">Đăng Ký</button>
    </form>
</body>
</html> -->