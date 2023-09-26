<?php
    include_once "../../config/dbconnect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['reject'])){
            $rowid=$_POST['rejectId'];
            $sql1="UPDATE `track_donation` SET `status`='reject' WHERE `transaction id`='$rowid'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1){
                echo "<script>alert('Successfully rejected')</script>";
                header("location: ../index.php");
            }
        }
        else if(isset($_POST['approve'])){
            $rowid=$_POST['approveId'];
            $sql1="UPDATE `track_donation` SET `status`='approved' WHERE `transaction id`='$rowid'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1){
                echo "<script>alert('Successfully rejected')</script>";
                header("location: ../index.php");
            }
        }
    }
?>

<div class="track-donation">
    <div class="content">
        <div class="head">
            <h1>Donation Status</h1>
        </div>
        <table>
            <tr>
                <th>Transaction Id</th>
                <th>Charity Name</th>
                <th>Campaign Name</th>
                <th>Donor Name</th>
                <th>Payment Mode</th>
                <th>Donation Amount</th>
                <th>Paid On</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $sql="SELECT `transaction id`, `charity name`, `campaign name`, `payment mode`, `donation amount`, `paid on`, `status`, `spent for`, `spent on`, `donor name`, `donor id`, `charity id` FROM `track_donation`";
                $qry=mysqli_query($conn,$sql);
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><?=$row['transaction id']?></td>
                <td><?=$row['charity name']?></td>
                <td><?=$row['campaign name']?></td>
                <td><?=$row['donor name']?></td>  
                <td><?=$row['payment mode']?></td>
                <td><?=$row['donation amount']?></td>
                <td><?=$row['paid on']?></td>
                <td><?=$row['status']?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <input type="hidden" name="approveId" value="<?=$row['transaction id']?>">
                        <button type="submit" name="approve" id="approve">Approve</button>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <input type="hidden" name="rejectId" value="<?=$row['transaction id']?>">
                        <button type="submit" name="reject" id="reject">Reject</button>
                    </form>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
           

        </table>
    </div>
</div>