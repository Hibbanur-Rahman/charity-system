<?php
include_once "../../config/dbconnect.php";

session_start();
$charityId=$_SESSION['charity id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['reject'])){
        $rowid=$_POST['rejectId'];
        $sql1="DELETE FROM `donation_request` WHERE Id='$rowid'";
        $qry1=mysqli_query($conn,$sql1);
        if($qry1){
            echo "<script>alert('Successfully rejected')</script>";
            header("location: ../index.php");
        }
    }
}
?>

<div class="campaigns">
    <div class="content">
        <div class="head">
            <h1>Campaign Details</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Campaign Name</th>
                <th>Campaign Description</th>
                <th>Campaign Pic</th>
                <th>Amount</th>
                <th>Amount Collected</th>
                <th>End Date</th>
                <th>Registered Date & Time</th>
                <th>Status</th>
            </tr>
            <?php
                $charityId=$_SESSION['charity id'];
                $sql="SELECT `id`, `charity id`, `charity name`, `campaign name`, `campaign description`, `campaign pic`, `amount`, `end date`, `registered date and time`, `status` FROM `campaigns` WHERE `charity id`='$charityId'";
                $qry=mysqli_query($conn,$sql);
                $count=1;
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><p><?=$row['id']?></p></td>
                <td><p><?=$row['campaign name']?></p></td>
                <td><p><?=$row['campaign description']?></p></td>
                <td><img src="../images/campaign image/<?=$row['campaign pic']?>"/></td>
                <td><p><?=$row['amount']?></p></td>
                <td><p>0</p></td>
                <td><p><?=$row['end date']?></p></td>
                <td><p><?=$row['registered date and time']?></p></td>  
                <td><p><?=$row['status']?></p></td>
            </tr>
            <?php
                    }
                }
            ?>
           

        </table>
    </div>
</div>