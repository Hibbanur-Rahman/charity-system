<?php
session_start();
if (!isset($_SESSION['RecieverId'])) {
    header("location: ../register page/register.html");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: ../register page/register.html");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver panel</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive_style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div class="sidebar">

        <div class="profile">
            <img src="./images/profile.jpg" alt="">
        </div>
        <div class="profile-name">
            <p>
                <?php echo $_SESSION['RecieverId'] ?>
            </p>
            <p>Receiver/Charity</p>
        </div>
        <div class="listing">
            <div class="item">
                <i class="fa fa-house-chimney"></i>
                <p>Dashboard</p>
            </div>
            <div class="item" id="request-donation">
                <i class="fa fa-code-pull-request"></i>
                <p> Request Donation</p>
            </div>
            <div class="item" id="add-campaign">
                <i class="fa fa-hand-holding-heart"></i>
                <p>Add Campaigns</p>
            </div>
            <div class="item" id="request-status">
                <i class="fa fa-code-pull-request"></i>
                <p> Request Status</p>
            </div>
            <div class="item" id="donations">
                <i class="fa fa-money-check-dollar"></i>
                <p>Donations</p>
            </div>
            <div class="item" id="transaction">
                <i class="fa fa-network-wired"></i>
                <p>Transaction</p>
            </div>
            <div class="item" id="campaign">
                <i class="fa fa-hand-holding-heart"></i>
                <p>Campaigns</p>
            </div>
            <div class="item" id="edit-profile" id="edit-profile">
                <i class="fa fa-pen-to-square"></i>
                <p>Edit profile</p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="item">
                <button type="submit" name="logout">
                    <i class="fa fa-right-from-bracket"></i>
                    <p>Logout</p>
                </button>
            </form>
        </div>
    </div>

    <div class="main"></div>
    <script src="./js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>   
</body>

</html>