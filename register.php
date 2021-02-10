<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, fullname, email, address, password, userlevel)
                        VALUE ('$username', '$fullname', '$email', '$address', '$passwordenc', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: signin.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: signin.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> สมัครสมาชิก </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="regisfrom/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="regisfrom/css/style.css">

</head>
<body>
    
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-add material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="fullname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullname" placeholder="Enter your fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="address" placeholder="Enter your address" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Enter your password" required>
                            </div>
                                <input type="submit" name="submit" class="form-submit" value="Submit">
    
                            </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="regisfrom/images/pic-register.png" alt="sing up image"></figure>
                        <a href="signin.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="regisfrom/vendor/jquery/jquery-ui.min.js"></script>
    <script src="regisfrom/js/main.js"></script>
    <!-- This templates was made by Colorlib (https://colorlib.com) -->
    
</body>
</html>