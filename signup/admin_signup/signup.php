<?php
include_once "../../config/dbconnect.php";

function input_filter($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["signup"])) {

        //filtering user input
        $username=input_filter($_POST['username']);
        $password=input_filter($_POST['password']);
        $mobile=input_filter($_POST['mobile']);
        $email = input_filter($_POST['email']);
        $address = input_filter($_POST['address']);

        $min=10000;
        $max=99999;
        $adminid = mt_rand($min, $max);

        $sql = "INSERT INTO `admin_info_login` (`username`,`password`,`mobile`,`email`,`address`,`admin id`) VALUES ('$username','$password','$mobile','$email','$address','$adminid')";
        $qry = mysqli_query($conn, $sql);

        if ($qry) {
            //Successful registration,perform the redirect here.
            echo "<script>alert('successfull register')</script>";
        } else {
            echo mysqli_error($conn);
        }
    }
    if (isset($_POST["login"])) {

        //filtering user input
        $email = input_filter($_POST['email']);
        $password=input_filter($_POST['password']);

        //escaping special symbols used in SQL statements
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);


        
        if (empty($email) || empty($password)) {
            echo "invalid credentials";
        } else {
            //query template
            $sql = "SELECT `email`,`password`,`username`,`admin id` from `admin_info_login` where `email`=? and `password`=?";

            $sql1 = "SELECT `email`,`password`,`username`,`admin id` from `admin_info_login` where `email`='$email' and `password`='$password'";
            $qry = mysqli_query($conn, $sql1);


            //prepared statement
            if($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,"ss",$email,$password);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1){
                    session_start();
                    $row = $qry->fetch_assoc();
                    $_SESSION['AdminId'] = $row['username'];
                    $_SESSION['adminid']=$row['admin id'];
                    echo $_SESSION['DonarId'];
                    header("location: ../../admin_panel/index.php");
                    exit;
                }
                else{
                    echo "<script>alert('The password or email is wrong')</script>";
                }

                mysqli_stmt_close($stmt);
            }
            else{
                echo "<script>alert('THE QUERY IS WRONG')</script>";
            }
        }


    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup-donor</title>

    <link rel="stylesheet" href="../signup.css">
</head>

<body>

    <div class="container">
        <div class="signup">
            <h1>Admin Signup Form</h1>
            <div class="head-nav">
                <div class="head-login" id="login">
                    <p>Login</p>
                </div>
                <div class="head-signup" id="signup">
                    <p>signup</p>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="signup">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirmPassword" placeholder="Confirm password" required>
                <input type="number" name="mobile" placeholder="Mobile number" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="submit" name="signup" value="signup">
            </form>
        </div>
        <div class="login">
            <h1>Admin Login Form</h1>
            <div class="head-nav">
                <div class="head-login" id="login">
                    <p>Login</p>
                </div>
                <div class="head-signup" id="signup">
                    <p>signup</p>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
                <input type="email" placeholder="Email Address" required name="email">
                <input type="password" placeholder="Password" required name="password">
                <p>Forgot password?</p>
                <input type="submit" name="login" value="login">
            </form>
            <div class="not-member" id="signup">
                <p>Not a member? <a>Signup now</a></p>
            </div>

        </div>
    </div>

    <script src="../signup.js"></script>
</body>

</html>