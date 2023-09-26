<?php
    include_once "../../config/dbconnect.php";
    session_start();
    $adminid=$_SESSION['adminid'];
    $sql="SELECT `username`, `password`, `email`, `mobile`, `address`, `admin id`, `profile image` FROM `admin_info_login` WHERE `admin id`='$adminid'";
    $qry=mysqli_query($conn,$sql);
    if($qry){
        $row=mysqli_fetch_assoc($qry);
        $username=$row['username'];
        $password=$row['password'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=$row['address'];
        $profileImage=$row['profile image'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['update'])){
           $newUserName=$_POST['username'];
           $newEmail=$_POST['email'];
           $newPassword=$_POST['password'];
           $newMobile=$_POST['mobile'];
           $newAddress=$_POST['address'];
           $profileImage=$_POST['profile image'];
            if(empty($newUserName)){
                $newUserName=$username;
            }
            if(empty($newEmail)){
                $newEmail=$email;
            }
            if(empty($newPassword)){
                $newPassword=$password;
            }
            if(empty($newMobile)){
                $newMobile=$mobile;
            }
            if(empty($newAddress)){
                $newAddress=$address;
            }

            $sql1="UPDATE `admin_info_login` SET `username`='$newUserName',`password`='$newPassword',`email`='$newEmail',`mobile`='$newMobile',`address`='$newAddress',`profile image`='$profileImage' WHERE `admin id`='$adminid'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1){
                $_SESSION['AdminId']=$newUserName;
                echo "<script>alert('The Information is Updated');
                    window.href='../index.php';
                </script>";

            }
            else{
                echo "<script>alert('The information is not updated');</script>";
            }
        }
    }

?>
<div class="edit-profile">
    <div class="head">
        <h1>Edit Profile</h1>
    </div>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="editProfile"
            enctype="multipart/form-data">
            <div class="edit-img">
                <div class="profile-img" id="profile-img">
                    <img src="./images/aese hi.jpg" alt="" id="profileImage">
                </div>
                <label for="">Change Picture</label>
                <input type="file" name="profile image" placeholder="Change Picture" id="newPhoto">
            </div>
            <div class="input-feild">
                <label for="">User Name</label>
                <input type="text" placeholder="<?=$username?>" name="username">
            </div>
            <div class="input-feild">
                <label for="">Email</label>
                <input type="text" placeholder="<?=$email?>" name="email">
            </div>
            <div class="input-feild">
                <label for="">Address</label>
                <input type="text" placeholder="<?=$address?>" name="address">
            </div>
            <div class="input-feild">
                <label for="">Contact Number</label>
                <input type="text" placeholder="<?=$mobile?>" name="mobile">
            </div>
            <div class="input-feild">
                <label for="">Password</label>
                <input type="text" placeholder="<?=$password?>" name="password">
            </div>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</div>
<script>
    //change profile image
    var profileImage = document.querySelector('#profileImage');
    var newPhoto = document.querySelector('#newPhoto');

    newPhoto.addEventListener('change', (event) => {
        var selectedFile = event.target.files[0];
        console.log(event.target.files[0].name);

        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = (e) => {
                profileImage.src = e.target.result;
            }
            reader.readAsDataURL(selectedFile);
        }
    })  
</script>