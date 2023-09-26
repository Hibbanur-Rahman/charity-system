<?php
include_once "../../config/dbconnect.php";
?>

<div class="donor-details">
    <div class="content">
        <div class="head">
            <h1>Donor Details</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Registered Date & Time</th>
            </tr>
            <?php
                $sql="SELECT `username`, `password`, `email`, `mobile`, `address`, `registered date and time` FROM `donor_info_login`";
                $qry=mysqli_query($conn,$sql);
                $count=1;
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><p><?=$count++?></p></td>
                <td><p><?=$row['username']?></p></td>
                <td><p><?=$row['email']?></p></td>
                <td><p><?=$row['mobile']?></p></td>
                <td><p><?=$row['address']?></p></td>
                <td><p><?=$row['registered date and time']?></p></td>    
            </tr>

            <?php
                    }
                }
            ?>
           

        </table>
    </div>
</div>