<?php
include_once "../../config/dbconnect.php";
session_start();
?>
<div class="request-status">
    <div class="content">
        <div class="head">
            <h1>Request Status</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Charity Name</th>
                <th>Campaign Name</th>
                <th>Campaign Pic</th>
                <th>Amount Needed</th>
                <th>Donor Name</th>
                <th>Status</th>
                <th>Requested Date & Time</th>
            </tr>
            <?php
                $charityId = $_SESSION['charity id'];
                $sql="SELECT `id`,`donor name`,`charity name`,`campaign name`,`campaign pic`,`amount needed`, `status`,`requested date time` FROM `donation_request` WHERE `charity id`='$charityId'";
                $qry=mysqli_query($conn,$sql);
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['charity name']?></td>
                <td><?=$row['campaign name']?></td>
                <td><img src="../images/campaign image/<?=$row['campaign pic']?>" alt=""></td>
                <td><?=$row['amount needed']?></td>
                <td><?=$row['donor name']?></td>
                <td><?=$row['status']?></td>
                <td><?=$row['requested date time']?></td>
                    
            </tr>

            <?php
                    }
                }
            ?>
           

        </table>
    </div>
</div>